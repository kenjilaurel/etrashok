<?php 
require '../connection/dbconnect.php';

$wclass = $_POST['class_name'];
$category = $_POST['category'];


if(isset($_POST['save_class'])){

	$sql = "INSERT INTO waste_class (waste_category_id,name) VALUES('$category','$wclass')";
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else if(isset($_POST['edit_class'])){
	$id = $_POST['class_id'];

	$sql = "UPDATE waste_class SET waste_category_id = '$category',
						name = '$wclass'							
						WHERE id = '$id'";
	
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else if(isset($_POST['delete_class'])){
	$id = $_POST['class_id'];
	// echo $id.' Delete';
	$sql = "UPDATE waste_class SET deleted = 1 WHERE id = '$id'";
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