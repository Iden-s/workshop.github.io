<?php  
	require_once("dlc_site_function.php");
	$game_name 								=  $_POST['current_game_name'];
	$dlc_name 								=  $_POST['current_dlc_name'];
	$myJSON = json_encode(GetColumn_dlc_price_specific_game($game_name,$dlc_name));
	echo $myJSON;
?>