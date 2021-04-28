<?php 
session_start();
require "../config/config.php";
// $email = $_SESSION['email'];


$uploaddir = '../../assets/images/';
$logo = "logo";
$filename = $_FILES["file"]["name"]; // gdgfsg
$file_ext = substr($filename, strripos($filename, '.')); // get file name

$filesize = $_FILES["file"]["size"];

$allowed_file_types = array('.png','.jpg','.jpeg');	

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
        $link->query("INSERT INTO cv (ID, DateCreated ,Name) VALUES (NULL,'$date', '$filename')");
		// $query = "SELECT ID FROM projecten WHERE Name = '$title'";
		$result = mysqli_query($link, $query);
		header("location: ../../index.php");
		exit;
    }
?>





























// $email = $_SESSION['email'];



    // $filename = $_FILES["file"]["name"]; // gdgfsg
    // $file_ext = substr($filename, strripos($filename, '.')); // get file name

    // $filesize = $_FILES["file"]["size"];	
    // $allowed_file_types = array('.jpg, .png');	

    // if (in_array($file_ext, $allowed_file_types) && ($filesize < 2000000)) {

		// foreach ($allowed_file_types as $fileType) {
			
		// 	$tmpName = $uploaddir.$filename.$fileType;

		// 	if (file_exists($tmpName)) {
		// 		unlink($tmpName);
		// 		echo 'file '.$tmpName.' was removed';
		// 		header("location: ../../dashboard/header.php");
		// 	}
		// }
		// move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir . $name . $file_ext);
		
        // $stmt = $link->prepare("UPDATE `header` SET `content` = ? WHERE `name` = 'logo'");
        // $stmt->bind_param("s", $name.$file_ext);
		// // $query = "SELECT ID FROM projecten WHERE Name = '$title'";
		// $stmt->execute();
        // $stmt->close();
		// header("location: ../../dashboard/header.php");
		// exit;
    // }
/*else {
    $webname = $_POST['webname'];
    if(isset($webname)){
        $stmt = $link->prepare("UPDATE `header` SET `content` = ? WHERE `name` = 'website-name' ");
        $stmt->bind_param("s", $webname);
        $stmt->execute();
        $stmt->close();
        // $link->query("INSERT INTO pages (title, about) VALUES (NULL, '$title', '$editor2')");
        // header("location: ../../dashboard/header.php");
        exit;
    } else{
        // header("location: ../../dashboard/header.php");
    }
}*/





