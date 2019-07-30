<?php

require '../connection/dbconnect.php';
include 'functions.php';

$application_no 	= $_POST['application_no'];
$precinct_no 		= $_POST['precinct_no'];
$lastname 			= $_POST['lastname'];
$firstname 			= $_POST['firstname'];
$middlename 		= $_POST['middlename'];

// checkbox category
$user_category = '9';
if(isset($_POST['user_cat1'])){
	$user_cat1 		= $_POST['user_cat1'];
}else{
	$user_cat1 		= 0;
}if(isset($_POST['user_cat2'])){
	$user_cat2 		= $_POST['user_cat2'];
}else{
	$user_cat2 		= 0;
}if(isset($_POST['user_cat3'])){
	$user_cat3 		= $_POST['user_cat3'];
}else{
	$user_cat3 		= 0;
}

$user_category		.= $user_cat1.$user_cat2.$user_cat3;

$assisted_by		= $_POST['assisted_by'];
$province 			= $_POST['province'];
$city 				= $_POST['city'];
$barangay 			= $_POST['barangay'];
$street 			= $_POST['street'];
$citizenship 		= $_POST['citizenship'];
$citizenship_acquired = $_POST['citizenship_acquired'];
$natural_reacquire_date = $_POST['natural_reacquire_date'];
$certificate_no 	= $_POST['certificate_no'];
$period_city_yr		= $_POST['period_city_yr'];
$period_city_mos 	= $_POST['period_city_mos'];
$period_phil_yr	 	= $_POST['period_phil_yr'];
$profession 		= $_POST['profession'];
$tin 				= $_POST['tin'];
$sex 				= $_POST['sex'];
$birthday 			= $_POST['birthday'];
$placebirth_city 	= $_POST['placebirth_city'];
$placebirth_province = $_POST['placebirth_province'];
$civil				= $_POST['civil'];
$spouse 			= $_POST['spouse'];
$account_id			= 0;
$email 				= $_POST['email'];
$password 			= $_POST['password'];
$sitio				= $_POST['sitio'];

echo '<br/> application no: '.$application_no;
echo '<br/> precinct no: '.$precinct_no;
echo '<br/> lastname: '.$lastname;
echo '<br/> firstname: '.$firstname;
echo '<br/> middlename: '.$middlename;
echo '<br/> user cat 1: '.$user_cat1;
echo '<br/> user cat 2: '.$user_cat2;
echo '<br/> user cat 3: '.$user_cat3;
echo '<br/> user category: '.$user_category;
echo '<br/> assisted by: '.$assisted_by;
echo '<br/> province: '.$province;
echo '<br/> city: '.$city;
echo '<br/> barangay'.$barangay;
echo '<br/> street: '.$street;
echo '<br/> citizenship: '.$citizenship;
echo '<br/> citizenship acquired: '.$citizenship_acquired;
echo '<br/> natural  reacquired date: '.$natural_reacquire_date;
echo '<br/> certificate_no: '.$certificate_no;
echo '<br/> period_city_yr: '.$period_city_yr;
echo '<br/>period_city_mos'.$period_city_mos;
echo '<br/> period_phil_yr'.$period_city_yr;
echo '<br/> profession: '.$profession;
echo '<br/> tin: '.$tin;
echo '<br/> sex: '.$sex;
echo '<br/> birthday: '.$birthday;
echo '<br/> placebirth_city: '.$placebirth_city;
echo '<br/> placebirth_province'.$placebirth_province;
echo '<br/> civil: '.$civil;
echo '<br/> spouse: '.$spouse;
echo '<br/> spouse: '.$email;
echo '<br/> spouse: '.$password;


if(isset($_POST['register'])){


	$result = $mysqli->query("SELECT id FROM user_account WHERE email = '$email'");
	if($result->num_rows == 0) {
	    
			//save accounts
	$sql = "INSERT INTO user_account (email,password) VALUES ('$email','$password')";
	if (mysqli_query($mysqli,$sql)) {
		$account_id = maxId($mysqli,'user_account');
		//save user
		$sql = "INSERT INTO user 
							(application_no,
							precinct_no,
							firstname,
							middlename,
							lastname,
							category,
							assisted_by,
							address_province,
							address_city,
							address_brgy,
							address_street_house,
							citizenship,
							citizenship_acquired,
							natural_reacquire_date,
							certificate_no,
							period_residence_city_yr,
							period_residence_city_month,
							period_residence_phil_yr,
							profession,
							tin,
							sex,
							date_birth,
							place_birth_city,
							place_birth_province,
							civil_status,
							spouse,
							account_id,
							sitio)
							VALUES
							(
							'$application_no',
							'$precinct_no',
							'$firstname',
							'$middlename',
							'$lastname',						
							'$user_category',												
							'$assisted_by',
							'$province',
							'$city',
							'$barangay',
							'$street',
							'$citizenship',
							'$citizenship_acquired',
							'$natural_reacquire_date',
							'$certificate_no',
							'$period_city_yr',
							'$period_city_mos',
							'$period_phil_yr',
							'$profession',
							'$tin',
							'$sex',
							'$birthday',
							'$placebirth_city',
							'$placebirth_province',
							'$civil',
							'$spouse',
							'$account_id',
							'$sitio')";

		if (mysqli_query($mysqli,$sql)) {
			
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			// printf("Error: %s\n", $mysqli->error);
			echo 'Something Went Wrong!';exit;
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

	}else{
		// printf("Error: %s\n", $mysqli->error);
		echo 'Something Went Wrong!';exit;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}	

	    
	} else {
	   echo 'Email already exist!';exit;
	}

}

?>