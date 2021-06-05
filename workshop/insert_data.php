<?php  
	require_once("function.php");
	$user_detail  = json_decode($_POST['user_detail'],true);
	$user  = json_decode($_POST['user'],true);
	$email 		 		= $user_detail['email'];
	$birthdate  		= $user_detail['birthdate'];
	$sex  				= $user_detail['sex'];
	$country  			= $user_detail['country'];

	$username 		 	= $user['username'];
	$password  			= $user['password'];

	Send_data_users_detail($email,$birthdate,$sex,$country);
	Send_data_users($username,$password);
?>