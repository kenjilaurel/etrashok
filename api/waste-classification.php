<?php
require '../connection/dbconnect.php';
session_start();

$weight = $_POST['weight'];
$classid = $_POST['cid'];
$date_classified = date('Y-m-d');
$resident_segregation_id = $_POST['r_segregation_id'];
$unit	= 'kg';
$facilitator = $_SESSION['login_id'];

if(isset($_POST['save'])){
	foreach( $classid as $key => $n ) {
	  print "weight ".$weight[$key].'<br>';
	  print "class id ".$classid[$key].'<br>';
	  print "Date ".$date_classified.'<br>';
	  print "resident_segragation_id ".$resident_segregation_id.'<br>';
	  print "unit ".$unit.'<br>';
	  print "facilitator ".$facilitator.'<br>';

	  $sql = "INSERT INTO classified_waste 
	  									(date_classified,
	  									resident_segregation_id,
	  									waste_class_id,
	  									weight,
	  									unit,
	  									facilitator_id)
	  									VALUES 
	  									('$date_classified',
	  									'$resident_segregation_id',
	  									'$classid[$key]',
	  									'$weight[$key]',
	  									'$unit',
	  									'$facilitator')";
	  	if (mysqli_query($mysqli,$sql)) {
			
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			// printf("Error: %s\n", $mysqli->error);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
		}
	}
}else if(isset($_POST['edit'])){

	$cwid = $_POST['cwid'];
	foreach( $cwid as $key => $n ) {	  

	  $sql = "UPDATE classified_waste SET weight = '$weight[$key]' WHERE id = '$cwid[$key]' ";

	  	if (mysqli_query($mysqli,$sql)) {
			
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			// printf("Error: %s\n", $mysqli->error);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
		}
	}
}


?>