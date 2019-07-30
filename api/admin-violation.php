<?php
require '../connection/dbconnect.php';

$desc = $_POST['description'];
$penalty = $_POST['penalty'];

if(isset($_POST['save_violation'])){
	$sql = "INSERT INTO violation (description,penalty) VALUES('$desc','$penalty')";
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else if(isset($_POST['edit_violation'])){
	$id = $_POST['violation_id'];
	// echo $id.' Edit';
	$sql = "UPDATE violation SET description = '$desc',
							penalty = '$penalty'
							WHERE id = '$id'";
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else if(isset($_POST['delete_violation'])){
	$id = $_POST['violation_id'];
	// echo $id.' Delete';
	$sql = "UPDATE violation SET deleted = 1 WHERE id = '$id'";
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else{
	echo 'Something went wrong';exit;
}
?>