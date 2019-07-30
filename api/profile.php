<?php
require '../connection/dbconnect.php';
include 'functions.php';
define("UPLOAD_DIR", "../images/");


$application_no 	= $_POST['application_no'];
$precinct_no 		= $_POST['precinct_no'];
$lastname 			= $_POST['lastname'];
$firstname 			= $_POST['firstname'];
$middlename 		= $_POST['middlename'];

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
$account_id			= $_POST['account_id'];
$email 				= $_POST['email'];
$password 			= $_POST['password'];
$sitio				= $_POST['sitio'];
$user_id			= $_POST['user_id'];

echo '<br/> application no: '.$application_no;
echo '<br/> precinct no: '.$precinct_no;
echo '<br/> lastname: '.$lastname;
echo '<br/> firstname: '.$firstname;
echo '<br/> middlename: '.$middlename;
// echo '<br/> user cat 1: '.$user_cat1;
// echo '<br/> user cat 2: '.$user_cat2;
// echo '<br/> user cat 3: '.$user_cat3;
// echo '<br/> user category: '.$user_category;
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
echo '<br/> email: '.$email;
echo '<br/> pass: '.$password;


if(isset($_POST['save'])){
		
		//upload image
     	if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
			
			// echo 'Something went wrong, file is too large or is not an image.';exit;
			$image_file = 'not_set';
		}else{			

			$myFile = $_FILES["image"];

		    if ($myFile["error"] !== UPLOAD_ERR_OK) {
		        echo "<p>An error occurred.</p>";
		        exit;
		    }

		    // ensure a safe filename
		    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

		    // don't overwrite an existing file
		    $i = 0;
		    $parts = pathinfo($name);
		    while (file_exists(UPLOAD_DIR . $name)) {
		        $i++;
		        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
		    }

		    // preserve file from temporary directory
		    $success = move_uploaded_file($myFile["tmp_name"],
		        UPLOAD_DIR . $name);
		    if (!$success) { 
		        echo "<p>Unable to save file.</p>";
		     //   exit;
		    }

		    // set proper permissions on the new file
		    chmod(UPLOAD_DIR . $name, 0644);

           $image_file = $name;

        }
		//updatee user
		$sql = "UPDATE user SET
							application_no 	 = '$application_no',
							precinct_no 	 = '$precinct_no',
							firstname 		 = '$firstname',
							middlename 		 = '$middlename',
							lastname 		 = '$lastname',																						
							assisted_by 	 = '$assisted_by',
							address_province = '$province',
							address_city 	 = '$city',
							address_brgy 	 = '$barangay',
							address_street_house = '$street',
							citizenship 	 	 = '$citizenship',
							citizenship_acquired ='$citizenship_acquired',
							natural_reacquire_date 	 = '$natural_reacquire_date',
							certificate_no 			 = '$certificate_no',
							period_residence_city_yr = '$period_city_yr',
							period_residence_city_month = '$period_city_mos',
							period_residence_phil_yr 	='$period_phil_yr',
							profession 					= '$profession',
							tin 						= '$tin',
							sex 						= '$sex',
							date_birth 					= '$birthday',
							place_birth_city 			= '$placebirth_city',
							place_birth_province 		= '$placebirth_province',
							civil_status 				= '$civil',
							spouse 						= '$spouse',							
							sitio 						= '$sitio'";
							
		if($image_file != 'not_set'){
			$sql .= ",image_path = '$image_file'";
		}					

		$sql .= " WHERE id = '$user_id'"; 					
		if (mysqli_query($mysqli,$sql)) {
			$sqlaccount = '';
			if($email != "" && $password == ""){
				//save email without pass
				$sqlaccount = "UPDATE user_account SET email = '$email' WHERE id = '$account_id'";

			}else if($email != "" && $password != ""){
				//save email with pass
				$sqlaccount = "UPDATE user_account SET email = '$email', password = '$password' WHERE id = '$account_id'";
			}

			if (mysqli_query($mysqli,$sqlaccount)) {
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				echo "Something went wrong.saving user account";exit;
			}
			
		}else{
			printf("Error: %s\n", $mysqli->error);
			echo '<br><br>'.$sql;
			echo 'Something Went Wrong!';exit;
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}	

}
?>