<?php  
	require_once("form_function.php");
	$dlc_name 	= $_POST["dlc_name"];
	//$dlc_name 	= "Premium Starter Pack 1";
	$dlc_detail 				= json_encode(Get_dlc_list_detail($dlc_name));
	echo $dlc_detail
?>
