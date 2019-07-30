<?php
require '../connection/dbconnect.php';
$sitio = $_POST['sitio'];
$sitio_leader = $_POST['sitio_leader'];

// echo $sitio.'<br>'.
// 	$sitio_leader;

if(isset($_POST['save_sitio'])){
	$sql = "INSERT INTO sitio (sitio_name,leader) VALUES('$sitio','$sitio_leader')";
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else if(isset($_POST['edit_sitio'])){
	$id = $_POST['sitio_id'];
	// echo $id.' Edit';
	$sql = "UPDATE sitio SET sitio_name = '$sitio',
							leader = '$sitio_leader'
							WHERE id = '$id'";
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else if(isset($_POST['delete_sitio'])){
	$id = $_POST['sitio_id'];
	// echo $id.' Delete';
	$sql = "UPDATE sitio SET deleted = 1 WHERE id = '$id'";
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