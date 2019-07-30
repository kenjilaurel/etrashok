<?php
require '../connection/dbconnect.php';
include 'functions.php';

session_start();

$collector_id	= $_SESSION['login_id'];
$remarks 		= $_POST['remarks'];
$violation 		= $_POST['r_violation'];
$date_collected = date('Y-m-d');
$category_id	= $_POST['category_id'];
$resident_id 	= $_POST['resident_id'];

echo 'collcetor id: '.$collector_id.'<br>';
echo 'remarks: '.$remarks.'<br>';
echo 'violation id: '.$violation.'<br>';
echo 'date_collected: '.$date_collected.'<br>';
echo 'Category id: '.$category_id.'<br>';
echo 'Resident id: '.$resident_id.'<br>';

if(isset($_POST['collected'])){
	$sql = "INSERT INTO segregation_remarks 
					(collector_id,
					remarks,
					violation_id,
					date_collected)
					VALUES ('$collector_id',
					'$remarks',
					'$violation',
					'$date_collected')";

	if (mysqli_query($mysqli,$sql)) {
		$remarks_id = maxId($mysqli,'segregation_remarks');
		$collected  = 1;

		$sqlseg = "UPDATE resident_segragation SET 
												collected = '$collected',
												segregation_remarks_id = '$remarks_id'
												WHERE category_id = '$category_id'
												AND resident_id = '$resident_id'";
		if (mysqli_query($mysqli,$sqlseg)) {
				
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			printf("Error: %s\n", $mysqli->error);exit;
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
		}	
	}else{
		printf("Error: %s\n", $mysqli->error);exit;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}
}else if(isset($_POST['update_collected'])){

	$remarks_id = $_POST['remarks_id'];
	$sql = "UPDATE segregation_remarks SET 
										remarks = '$remarks',
										violation_id = '$violation'
										WHERE id = '$remarks_id' ";
	if (mysqli_query($mysqli,$sql)) {
				
			header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		printf("Error: %s\n", $mysqli->error);exit;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}

}else{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>