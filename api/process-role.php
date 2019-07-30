<?php
require '../connection/dbconnect.php';

$roleName = $_POST['roleName'];
$roleDescription = $_POST['roleDescription'];



if(isset($_POST['save_role'])){
	if(isset($_POST['roleName'])){

		$str = strtolower($roleName);
		if ($str == "admin") {
			echo 'Something went wrong';exit;
		} 
		else {
			$sql = "INSERT INTO user_role (name,description) VALUES('$roleName','$roleDescription')";
			if (mysqli_query($mysqli,$sql)) {
			
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
			// printf("Error: %s\n", $mysqli->error);
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			
			}
		}
		
	}
	else {
		echo 'Something went wrong';exit;
	}
}
else {
	echo 'Something went wrong';exit;
}


?>