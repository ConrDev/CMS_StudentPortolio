<?php 
session_start();
require "../config/config.php";
// $email = $_SESSION['email'];

$date = date("Y-m-d");

$uploaddir = '../../assets/cv/';

$filename = $_FILES["file"]["name"]; // gdgfsg
$file_ext = substr($filename, strripos($filename, '.')); // get file name

$filesize = $_FILES["file"]["size"];

$allowed_file_types = array('.pdf');	

if (in_array($file_ext, $allowed_file_types) && ($filesize < 2000000)) {


		foreach ($allowed_file_types as $fileType) {
			
			$tmpName = $uploaddir.$filename;

			if (file_exists($tmpName)) {
				unlink($tmpName);
				echo 'file '.$tmpName.' was removed';
				header("location: ../../index.php");
			}
			header("location: ../../index.php");
		}
		
		move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir . $filename);
		// $link->query("UPDATE cv (ID, DateCreated ,Name) VALUES (1,'$date', '$filename')");
		$stmt = $link->prepare("UPDATE `cv` SET `name` = ?, `DateCreated` = ? WHERE `id` = 1 ");
        $stmt->bind_param("ss", $filename, $date);
        $stmt->execute();
        $stmt->close();
		// $query = "SELECT ID FROM projecten WHERE Name = '$title'";
		// $result = mysqli_query($link, $query);

		exit;
    }
?>
