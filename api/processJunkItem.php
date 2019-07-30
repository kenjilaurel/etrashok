<?php
require '../connection/dbconnect.php';

$category = $_GET['category'];
$desc = $_GET['desc'];
$price = $_GET['price'];



$sql = "INSERT INTO `junkTable` (`category`, `description`, `price`) VALUES ( '$category', '$desc', '$price')";

if (mysqli_query($mysqli, $sql)) {
	$data = [ 'status'=>true, 'msg'=>'Record added successfully' ];
} else {
	$data = [ 'status'=>true, 'msg'=>'Error inserting record' ];
}


echo json_encode($data);
?>