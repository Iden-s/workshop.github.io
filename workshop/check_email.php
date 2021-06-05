<?php  
	require_once("function.php");
	$myJSON = json_encode(GetColumn_email());
	echo $myJSON;

?>