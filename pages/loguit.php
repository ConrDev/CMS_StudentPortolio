<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["level"]);
if (isset($_SESSION['token'])) {
    unset($_SESSION['token']); 
} else if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach ($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
} else {
    return;
}

header("Location: login.php");
?>