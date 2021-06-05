<?php
	require_once("form_function.php");
	$game_name 	= $_POST["game_name"];
	$game_detail 				=  json_encode(Get_game_list_detail($game_name));
	echo $game_detail;
?>