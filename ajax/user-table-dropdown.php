<?php
require '../connection/dbconnect.php';
$id = $_GET['id'];
$role = $_GET['role'];
$status = $_GET['status'];

$sql = "UPDATE user SET approved = '$status', user_role = '$role' WHERE id = '$id'";
if (mysqli_query($mysqli,$sql)) {
			
	$response = true;
}else{
	
	$response = false;
	
}


echo json_encode($response);
?>