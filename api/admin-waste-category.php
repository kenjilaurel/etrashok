<?php
require '../connection/dbconnect.php';
define("UPLOAD_DIR", "../images/");

$desc = $_POST['description'];
$category = $_POST['category'];

//upload image
if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
	if(isset($_POST['save_category'])){
		echo 'Something went wrong, file is too large or is not an image.';exit;
	}else{
		$image_file = 'not_set';
	}
	
}else{			

	$myFile = $_FILES["image"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
     //   exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);

   $image_file = $name;

}

if(isset($_POST['save_category'])){

	$sql = "INSERT INTO waste_category (category,description,image_path) VALUES('$category','$desc','$image_file')";
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else if(isset($_POST['edit_category'])){
	$id = $_POST['category_id'];
	
	if($image_file == 'not_set'){
		$sql = "UPDATE waste_category SET description = '$desc',
							category = '$category'							
							WHERE id = '$id'";
	}else{
		$sql = "UPDATE waste_category SET description = '$desc',
							category = '$category',
							image_path = '$image_file'
							WHERE id = '$id'";
	}
	
	if (mysqli_query($mysqli,$sql)) {
			
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// printf("Error: %s\n", $mysqli->error);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else if(isset($_POST['delete_category'])){
	$id = $_POST['category_id'];
	// echo $id.' Delete';
	$sql = "UPDATE waste_category SET deleted = 1 WHERE id = '$id'";
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