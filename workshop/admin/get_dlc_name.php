<?php
	require_once("form_function.php");
	$game_name 			= $_POST["game_name"];
	$id_game_name 		=  Get_id_game_name($game_name);
	$dlc 				=  json_encode(Get_dlc($id_game_name[0]["id_games"]));
	echo $dlc;
?>