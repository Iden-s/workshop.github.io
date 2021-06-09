<?php  
	require_once("function.php");
	$username 		 		= $_POST['username'];
	$password  				= $_POST['password'];
	$password_encoded=md5($password);
	$myJSON 				= json_encode(GetColumn_usernames_and_passwords($username,$password_encoded));
	echo $myJSON;
?>