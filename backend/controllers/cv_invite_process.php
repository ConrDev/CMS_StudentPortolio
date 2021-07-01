<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

require "../config/config.php";


session_start();
$user_Email = $_SESSION["email"];
$to_Email = $_POST['email'];

$mail = new PHPMailer(true);

function generateRandomString($length = 20) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
$unique_link = generateRandomString();
    mysqli_query($link, "INSERT INTO invites (ID, email, link) VALUES ('','$to_Email', '$unique_link')");

            if(isset($to_Email)) {
             $data =  mysqli_query($link, "SELECT * FROM invites WHERE email = '$to_Email'");
                $row = $data->fetch_array();
                try {
                    //Server settings
                    $mail->isSMTP();                                              // Set mailer to use SMTP
                    $mail->Host = 'smtp.mailtrap.io';                             // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                                       // Enable SMTP authentication
                    $mail->Username = 'c11479dbeef6ca';                           // SMTP username
                    $mail->Password = '6a857885fbaba8';                           // SMTP password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 2525;

                    $mail->setFrom('noreply@example.com', 'Admin');
                    $mail->addAddress($to_Email, 'User');

                    $mail->isHTML(true);
                    $mail->Subject = 'uitnodiging CV bekijken';
                    $mail->Body    = 'uitnodiging code:' . $row['link'];

                    $mail->send();
                    $_SESSION['unique_code'] = $unique_link;    
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            } else {
                echo "email already exist";
            }
?>