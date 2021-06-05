<?php  
	require_once("function.php");
	error_reporting(E_ALL & ~E_NOTICE);
	$current_game_name 		 					= json_decode($_POST['current_game_name'],true);
	$game_name 									=  $current_game_name['game_name'];
	$myJSON = json_encode(GetColumn_thumbnail_image_specific_game($game_name));
	print_r($myJSON);
?>