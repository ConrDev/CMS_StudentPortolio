<?php
$title = $_POST['title'];
$editor = $_POST['editor1'];
$published = $_POST['published'];
$metatags = $_POST['metatags'];
$metadesc = $_POST['metadesc'];
$date = date("Y/m/d");

 $link->query("INSERT INTO projecten (Name, DateCreated, DateEdited,) VALUES ($title, $date, $date)");
 $query = "SELECT ID FROM projecten WHERE Name = $title";
 $result = mysqli_query($link, $query);

$id = $result;
require 'visitors.php';

?>