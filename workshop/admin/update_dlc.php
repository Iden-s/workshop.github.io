<?php  
	require_once("form_function.php");
	$dlc					= json_decode($_POST['dlc'],true);

	$dlc_name_old							= $dlc['dlc_name_old'];
	$dlc_name 		 						= $dlc['dlc_name'];
	$dlc_release_date  						= $dlc['release_date_dlc'];
	$dlc_price  							= $dlc['dlc_price'];
	$dlc_image_filename  					= $dlc['dlc_image_filename'];

	Update_dlc_list_detail($dlc_name_old,$dlc_name,$dlc_release_date,$dlc_price)
?>