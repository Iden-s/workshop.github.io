<?php  
	require_once("game_site_function.php");
	$game_name 								=  $_POST['current_game_name'];
	$myJSON = json_encode(GetColumn_recommend_requirment_specific_game($game_name));
	echo $myJSON;
?>