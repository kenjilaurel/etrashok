<?php
require '../connection/dbconnect.php';

$violationID = $_GET['violationID'];


if (mysqli_query($mysqli, "DELETE FROM `segregation_remarks` WHERE id = '$violationID'")) {
	$data = [ 'status'=>true, 'msg'=>'Record deleted successfully' ];
} else {
	$data = [ 'status'=>true, 'msg'=>'Error deleting record' ];
}


echo json_encode($data);
?>