<?php  
	require_once("form_function.php");
	$myJSON = json_encode(Get_game_list());
	echo $myJSON;
?>