<?php
require '../connection/dbconnect.php';

$sql = "";
if(isset($_POST['save_description'])){
	$desc = mysqli_real_escape_string($mysqli,$_POST['description']);
	$sql = "UPDATE laws_policies SET description = '$desc' WHERE id = 1 ";

}else if(isset($_POST['save_title'])){
	$title  = $_POST['title'];
	$sql = "UPDATE laws_policies SET title = '$title' WHERE id = 1 ";
}else{
	echo 'Not save  back to Page.'; exit;
}

if (mysqli_query($mysqli,$sql)) {			
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
	printf("Error: %s\n", $mysqli->error);exit;
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
}

?>