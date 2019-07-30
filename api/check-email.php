<?php
require '../connection/dbconnect.php';

$userEmail = $_GET['email'];

$checkEmail = mysqli_query($mysqli, "SELECT email FROM user_account WHERE email = '$userEmail'");

if (mysqli_num_rows($checkEmail) == 1) {
  $response = true;
} else {
  $response = false;
}

echo json_encode($response);
?>