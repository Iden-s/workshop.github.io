<?php  
	require_once("dlc_site_function.php");
	$game_name 								=  $_POST['current_game_name'];
	$myJSON = json_encode(GetColumn_minimum_requirment_specific_game($game_name));
	echo $myJSON;
?>