<?php
require_once '../config/config.php';
// obtain the POST
$editor = $_POST['editor'];
$title = $_POST['title'];
$published = false;

if(isset($title, $editor2)){
    $stmt = $link->prepare("INSERT INTO `pages` (`title`, `content`, `published`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $uuid, $email, $hashPassword, $companyName);
    $link->query("INSERT INTO pages (title, about) VALUES (NULL, '$title', '$editor2')");
} else{
    header("location: ../../dashboard/page_editor.php");
}

?>