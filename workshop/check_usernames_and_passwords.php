<?php  
	require_once("function.php");
	$myJSON = json_encode(GetColumn_usernames_and_passwords());
	echo $myJSON;
?>