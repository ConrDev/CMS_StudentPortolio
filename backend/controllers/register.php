<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../config/config.php';

// UUID generator
function uuid() {
    $data = openssl_random_pseudo_bytes(16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

// POST's
$email              =   strtolower($_POST['email']);
$companyName        =   $_POST['companyName'];
$password           =   $_POST['password'];
$confirmPassword    =   $_POST['confirmPassword']; 

// Check if they're not empty
if (strlen($email) > 0 &&
    strlen($password) >= 8 &&
    strlen($confirmPassword) >= 8) {
    
    // Check if email exists
    $emailCheck = $link->prepare("SELECT `email` FROM `user` WHERE `email` = ?");
    $emailCheck->bind_param("s", $email);
    $emailCheck->execute();

    if ($emailCheck->num_rows() == 0) {
        $emailCheck->close();

        // Password hash
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, [ 'cost' => 12 ]);

        // Check if the password and confirm password matchup
        if (password_verify($confirmPassword, $hashPassword)) {
            $uuid = uuid();

            // Inserting the info into the database
            $stmt = $link->prepare("INSERT INTO `user` (`UUID`, `Email`, `Password`, `CompanyName`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $uuid, $email, $hashPassword, $companyName);

    
            if ($stmt->execute()) {
                header('Location: ../../index.php');
                exit;
            } else {
                echo 'Er ging wat mis met het toevoegen!';
            }
        } else {
            echo 'Een van de ingevulde data was ongeldig!';
        }
    } else {
        echo 'E-mailaddres bestaat al!';
    }
} else {
    echo 'Niet alle velden waren ingevuld!';
}

?>