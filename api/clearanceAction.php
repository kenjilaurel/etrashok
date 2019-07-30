<?php
require '../connection/dbconnect.php';

$clearanceID = $_GET['clearanceID'];


if (mysqli_query($mysqli, "DELETE FROM `clearance` WHERE id = '$clearanceID'")) {
	$data = [ 'status'=>true, 'msg'=>'Record deleted successfully' ];
} else {
	$data = [ 'status'=>true, 'msg'=>'Error deleting record' ];
}


echo json_encode($data);
?>