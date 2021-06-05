<?php  
	require_once("function.php");
	$myJSON = json_encode(GetColumn_username());
	echo $myJSON;
?>