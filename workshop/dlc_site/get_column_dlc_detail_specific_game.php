<?php  
	require_once("dlc_site_function.php");
	$dlc_name 								=  $_POST['current_dlc_name'];
	$myJSON = json_encode(GetColumn_dlc_detail_specific_game($dlc_name));
	echo $myJSON;
?>