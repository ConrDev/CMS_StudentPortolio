<?php
$ID = $_GET['ID'];
 require_once '../config/config.php';
 mysqli_query($link, "DELETE FROM projecten WHERE ID = '$ID'");
?>