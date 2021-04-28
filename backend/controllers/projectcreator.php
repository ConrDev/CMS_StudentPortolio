<?php
require_once '../config/config.php';
// get the content
$title = $_POST['title'];
$content = $_POST['editor'];
$published = $_POST['published'];
$metatags = $_POST['metatags'];
$date = date("Y/m/d");

if ($content == true){
    $published = 1;
} else {
    $published = 0;
};

// create a database entry and return the id
$link->query("INSERT INTO projecten (ID, Name, DateCreated, DateEdited, Metatags, Published, Content) VALUES (NULL, '$title', '$date', '$date', '$metatags', '$published', '$content')");
$query = "SELECT ID FROM projecten WHERE Name = '$title'";
$result = mysqli_query($link, $query);

// give the id to the counter
foreach ($result as $result){
    print_r($result['ID']);
}
$id = $result['ID'];
$link->query("INSERT INTO visitors (ID, visits) VALUES ('$id', '$title')");
// print_r($id);
// require 'visitors.php';

// define the file path
// $path = "../../projects/$title/";

// create the directory
// mkdir("$path");

// grab the content of the files for the group
// $projectindex = file_get_contents("../templates/template1.php");

// create the project in the specified path
// $create_file = fopen($path . "$title.php", "w");
//     fwrite($create_file, $projectindex);
//     fclose($create_file);

// send the user to the new page
header("location: ../../pages/projecten.php");
?>