<?php
require '../connection/dbconnect.php';
require 'functions.php';

/* create an account */
$email = $_POST['email'];
$pass = $_POST['password'];
$approved = $_POST['approved'];
$user_role = $_POST['user_role'];
$user_id = $_POST['user_id'];

$sql = "INSERT INTO user_account (email,password)VALUES('$email','$pass')";
if (mysqli_query($mysqli,$sql)) {

	/* Update approval user*/
	$acc_id = maxIdAccount($mysqli);
	$sql2 = "UPDATE user SET approved = '$approved', user_role = '$user_role', account_id = '$acc_id' WHERE id = '$user_id'";

	if (mysqli_query($mysqli,$sql2)) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);	
	}else{
		//erroor
		header('Location: ' . $_SERVER['HTTP_REFERER']);	
	}
	
}else{
	// printf("Error: %s\n", $mysqli->error);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
}



?>