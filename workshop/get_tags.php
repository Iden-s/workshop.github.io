<?php  
	require_once("function.php");
	$myJSON = json_encode(GetColumn_tags());
	echo $myJSON;

?>