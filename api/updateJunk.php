<?php
require '../connection/dbconnect.php';

$upId = $_GET['upId'];
$category = $_GET['category'];
$subCategory = $_GET['subCategory'];
$desc = $_GET['desc'];
$price = $_GET['price'];


// $sql = "UPDATE `junktable` SET `category`= '$category',`description`= '$desc',`price`= '$price' WHERE id  = '$upId'"
// if (mysqli_query($mysqli, $sql)) {
// 	$data = [ 'status'=>true, 'msg'=>'Record updated successfully' ];
// } else {
// 	$data = [ 'status'=>true, 'msg'=>$sql ];
// }
$sql = "UPDATE `junktable` SET `category`= '$category',`subCategoryID`= '$subCategory',`description`= '$desc',`price`= '$price' WHERE id  = $upId";

if (mysqli_query($mysqli, $sql)) {
   	$data = [ 'status'=>true, 'msg'=>'Record updated successfully' ];
} else {
	$data = [ 'status'=>false, 'msg'=>"Error updating record: " . mysqli_error($mysqli)];
}

echo json_encode($data);
?>