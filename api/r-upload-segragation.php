<?php
require '../connection/dbconnect.php';
define("UPLOAD_DIR", "../images/upload/");
session_start();

if(!empty($_FILES)){
	
	$fileName 		= $_FILES['file']['name'];	
 	$category_id 	= $_POST['category_id'];
 	$resident_id 	= $_SESSION['login_id'];
 	$date_uploaded 	= date('Y-m-d');

	$uploaded_file = UPLOAD_DIR.$fileName;
	
		if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){
			
			$sql = "INSERT INTO resident_segragation (category_id,
													  resident_id,
													  date_uploaded,
													  image_path) VALUES (
													  '$category_id',
													  '$resident_id',
													  '$date_uploaded',
													  '$fileName')";
			mysqli_query($mysqli, $sql) or die("Upload error:". mysqli_error($mysqli));
		}
}
?>