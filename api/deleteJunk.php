<?php
require '../connection/dbconnect.php';

$junkID = $_GET['junkID'];


if (mysqli_query($mysqli, "DELETE FROM `junktable` WHERE id = '$junkID'")) {
	$data = [ 'status'=>true, 'msg'=>'Record deleted successfully' ];
} else {
	$data = [ 'status'=>true, 'msg'=>'Error deleting record' ];
}


echo json_encode($data);
?>