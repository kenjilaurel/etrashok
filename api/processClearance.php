<?php
require '../connection/dbconnect.php';

$userId = $_GET['userId'];

if ($result = mysqli_query($mysqli, "SELECT COUNT(*) FROM clearance WHERE userID= '$userId'")) {
    $row = $result->fetch_assoc();
    if ($row['COUNT(*)'] == 0) {


    			$sql = "INSERT INTO clearance 
							(userID)
							VALUES
							(
							'$userId')";

		if (mysqli_query($mysqli,$sql)) {
			$data = [ 'status'=>true, 'msg'=>'Successfully Requested' ];
			
		}else{
			$data = [ 'status'=>false, 'msg'=>'Something Went Wrong!' ];
		}

    }
    else {
    	 $data = [ 'status'=>false, 'msg'=>'You already have requested!' ];
    }
}
echo json_encode($data);
?>