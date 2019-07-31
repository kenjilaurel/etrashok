<?php
require '../connection/dbconnect.php';


$subCategory = $_GET['subCategory'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];



$sql = "INSERT INTO `junkItemSell` (`subcategoryID`,`quantity`, `price`) VALUES ( '$subCategory', '$quantity', '$price')";

if (mysqli_query($mysqli, $sql)) {
	$data = [ 'status'=>true, 'msg'=>'Record added successfully' ];
} else {
	$data = [ 'status'=>true, 'msg'=>'Error inserting record' ];
}


echo json_encode($data);
?>