<?php

require '../connection/dbconnect.php';

if(isset($_POST['login'])){
	session_start();
// login_user
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT id FROM user_account WHERE email='$email' AND password = '$password'";
	$result = mysqli_query($mysqli,$sql);
    if (mysqli_num_rows($result) > 0) {    
    	$row = mysqli_fetch_assoc($result);	

    	$account_id = $row['id'];
    	$sql_user = "SELECT firstname,id,user_role,image_path,sitio FROM user WHERE account_id = '$account_id'";
    	$result_user = mysqli_query($mysqli,$sql_user);
		$row_user = mysqli_fetch_assoc($result_user);	    	

		$_SESSION['login_user'] 	= $row_user['firstname'];
		$_SESSION['login_id'] 		= $row_user['id'];
		$_SESSION['login_role'] 	= $row_user['user_role'];
		$_SESSION['login_email'] 	= $email;
		$_SESSION['avatar'] 		= $row_user['image_path'];
		$_SESSION['user_sitio']		= $row_user['sitio'];

			
			if($row_user['user_role'] == 1){
				header('Location: ../admin-pages/dashboard.php');
			}else if ($row_user['user_role'] == 2){//collector
				header('Location: ../user-pages/dashboard.php');
			}else if($row_user['user_role'] == 3){//resident
				header('Location: ../user-pages/dashboard.php');
			}else if($row_user['user_role'] == 5){//resident
				header('Location: ../junkShop/dashboard.php');
			}else{// 4 facilitator
				header('Location: ../user-pages/dashboard.php');
			}
    }else{
?>
		<div class="card">								
			<div class="card-body">																						
				<div class="alert alert-warning" role="alert">
					Login Failed, please try again!
				</div>
				
			</div>
		</div>	
<?php 
    }
	
	// echo 'check '.$row['id'];



}
?>