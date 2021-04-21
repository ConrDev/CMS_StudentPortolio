<?php

require '../backend/config/config.php';

$errors = [];
// $remember       = isset($_POST['remember']); 
  
if (isset($_POST['login'])) {

    // POST's
    $email          = $_POST['email'];
    $password       = $_POST['password'];

    if(isset($_POST['remember'])){
        $remember   = $_POST['remember'];
    } else{
        $remember   = false;
    }

    // Check if they're not empty
    if (strlen($email) > 0 &&
        strlen($password) > 0) {

        // Getting the hashed password from the databse
        $user = $link->prepare('SELECT `password` FROM `user` WHERE `email` = ?');
        $user->bind_param('s', $email);
        $user->execute();
        $result = mysqli_fetch_array($user->get_result());

        // $hashPassword = $result[0];

        if(isset($result[0])){
            $hashPassword = $result[0];
        } else{
            $hashPassword = NULL;
        }
        
        // Checking if the passwords matchup
        if (password_verify($password, $hashPassword)) {

            $token = bin2hex(openssl_random_pseudo_bytes(32));

            $level = $link->prepare("SELECT `level` FROM `user` WHERE `email` = ?");
            $level->bind_param('s', $email);
            $level->execute();
            $resultLevel = mysqli_fetch_array($level->get_result());

            // Checking if the user wanted to be remembered
            if ($remember) {
                session_start();
                
                setcookie('token', $token, time() + (86400 * 7), "/");

                $_SESSION["email"] = $email;
                $_SESSION["level"] = $resultLevel[0];

                header('Location: ../index.php');
                exit;
            } else {
                session_start();

                $_SESSION["token"] = $token;
                $_SESSION["email"] = $email;
                $_SESSION["level"] = $resultLevel[0];

                header('Location: ../index.php');
            }
        } else {
            $errors['password'] = "Wachtwoord is verkeerd";
            // header("location: ../../pages/login.php");
        }
    } else {
        $errors['email'] = "email mag niet leeg zijn";
        $errors['password'] = "wachtwoord mag niet leeg zijn";
    }

}

if (isset($_POST['register'])) {

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
                    $errors['toevoegmis'] = "Er ging wat mis met het toevoegen!";
                    // echo 'Er ging wat mis met het toevoegen!';
                }
            } else {
                // echo 'Een van de ingevulde data was ongeldig!';
                $errors['ingevuld'] = "een van de ingevulde data was ongeldig!";

            }
        } else {
            // echo 'E-mailaddres bestaat al!';
            $errors['repeatedEmail'] = "E-mailaddres wordt al gebruikt";
        }
    } else {
        $errors['repeatedPassword'] = "bevestig wachtwoord komt niet overheen met wachtwoord!";
    }

}
