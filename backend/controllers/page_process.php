<?php
require_once '../config/config.php';
// obtain the POST
$pageID     = $_GET['pageID'];
$editor     = $_POST['editor'];
$title      = $_POST['title'];
// $published  = $_POST['published'];

if ($_POST['published'] == "on") {
    $published = 1;
} else {
    $published = 0;
}

if(isset($title, $editor)){
    $stmt = $link->prepare("UPDATE `pages` SET `title` = ?, `content` = ?, `published` =? WHERE `page_ID` = ? ");
    $stmt->bind_param("ssii", $title, $editor, $published, $pageID);
    $stmt->execute();
    // $link->query("INSERT INTO pages (title, about) VALUES (NULL, '$title', '$editor2')");
    header("location: ../../dashboard/pages.php");
} else{
    header("location: ../../dashboard/pages.php");
}

?>