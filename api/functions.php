<?php
require '../connection/dbconnect.php';


function isAccountExist($id,$mysqli){
	
	$sql = "SELECT account_id FROM user WHERE id = '$id'";
	$result = mysqli_query($mysqli,$sql);
    
	$row = mysqli_fetch_assoc($result);	
	return $row['account_id'];
}


function maxIdAccount($mysqli){
	
	$sql = "SELECT max(id) id FROM user_account";
	$result = mysqli_query($mysqli,$sql);
    
	$row = mysqli_fetch_assoc($result);	
	return $row['id'];
}

function maxId($mysqli,$table){
	
	$sql = "SELECT max(id) id FROM ".$table;
	$result = mysqli_query($mysqli,$sql);
    
	$row = mysqli_fetch_assoc($result);	
	return $row['id'];
}

function getUserRole($idl){
	$myrole = "";
	$id = $idl;
	if($id == 0){
		$myrole = "Role Not Set";
	}else if($id == 1){
		$myrole = "Administrator";
	}else if($id == 2){
		$myrole = "Collector";
	}else if($id == 3){
		$myrole = "Resident";
	}else if ($id == 4){
		$myrole = "Facilitator";
	}else{
		$myrole = "Out of Bound";
	}
	return $myrole;
}

function getSitioName($mysqli,$id){
	$sql = "SELECT sitio_name FROM sitio WHERE id = '$id'";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_assoc($result);	
	return $row['sitio_name'];
}

function getUserName($mysqli,$id){
	$sql = "SELECT firstname,middlename,lastname FROM user WHERE id = '$id'";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_assoc($result);	
	$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
	return $name;
}

function isResidentSegregationIdExist($mysqli,$id){
	$sql = "SELECT resident_segregation_id FROM classified_waste WHERE resident_segregation_id = '$id'";
	$result = mysqli_query($mysqli,$sql);
    $exist = 0;
	$row = mysqli_fetch_assoc($result);	
	if($row > 0){
		$exist = 1;
	}else{
		$exist = 0;
	}
	return $exist;
}
?>