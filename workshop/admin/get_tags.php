<?php  
	require_once("form_function.php");
	$myJSON = json_encode(GetColumn_tags());
	echo $myJSON;

?>