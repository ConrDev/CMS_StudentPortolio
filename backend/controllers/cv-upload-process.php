<?php 
session_start();

$email = $_SESSION['email'];

$uploaddir = '../../assets/cv/';

$filename = $_FILES["file"]["name"];
$file_ext = substr($filename, strripos($filename, '.')); // get file name

$filesize = $_FILES["file"]["size"];

$allowed_file_types = array('.pdf');	

if (in_array($file_ext, $allowed_file_types) && ($filesize < 2000000)) {


		foreach ($allowed_file_types as $fileType) {
			
			$tmpName = $uploaddir.$profile_ID.$fileType;

			if (file_exists($tmpName)) {
				unlink($tmpName);
				echo 'file '.$tmpName.' was removed';
				header("location: ../../index.php");
			}
			header("location: ../../index.php");
		}
		
		move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir . $email . $file_ext);

		header("location: ../../index.php");
		exit;
    }
?>



