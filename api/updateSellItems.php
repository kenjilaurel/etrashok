<?php
require '../connection/dbconnect.php';

$upId = $_GET['upId'];
$upValue = $_GET['upValue'];
$sql = "UPDATE `junkitemsell` SET `confirm`= '$upValue' WHERE id  = $upId";

if (mysqli_query($mysqli, $sql)) {
   	$data = [ 'status'=>true, 'msg'=>'Record updated successfully' ];
} else {
	$data = [ 'status'=>false, 'msg'=>"Error updating record: " . mysqli_error($mysqli)];
}

echo json_encode($data);
?>