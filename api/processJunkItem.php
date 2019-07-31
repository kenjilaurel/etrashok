<?php
require '../connection/dbconnect.php';

$category = $_GET['category'];
$subCategory = $_GET['subCategory'];
$desc = $_GET['desc'];
$price = $_GET['price'];



$sql = "INSERT INTO `junkTable` (`category`,`subCategoryID`, `description`, `price`) VALUES ( '$category','$subCategory', '$desc', '$price')";

if (mysqli_query($mysqli, $sql)) {
	$data = [ 'status'=>true, 'msg'=>'Record added successfully' ];
} else {
	$data = [ 'status'=>true, 'msg'=>'Error inserting record' ];
}


echo json_encode($data);
?>