<?php

session_start();

// if (!isset($_SESSION['email']) || strlen($_SESSION['email']) == 0)  {
//     header("location: ../index.php");
//     exit;
// }

if(isset($_COOKIE['token'])) {
    // session_destroy();
    header("location: ../index.php");
}

?>