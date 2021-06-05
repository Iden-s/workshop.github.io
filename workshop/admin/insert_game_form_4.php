<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
</head>
<body>
	<?php  
		$detail 	= $_GET["detail"];
		$detail 	= json_decode($detail, true);
		if (isset($_GET["dlc"])) 
		{
			$dlc 		= $_GET["dlc"];
			$dlc 		= json_decode($dlc, true);
		}
		else
		{
			$dlc 		= null;
		}

		$game_name 					= $detail["game_name"];
		$game_release_date 			= $detail["game_release_date"];
		$game_developer 			= $detail["game_developer"];
		$game_publisher 			= $detail["game_publisher"];
		$game_price 				= $detail["game_price"];
		$tags_name 					= $detail["tags_name"];
		$minimum_os 				= $detail["minimum_os"];
		$minimum_processor 			= $detail["minimum_processor"];
		$minimum_memory 			= $detail["minimum_memory"];
		$minimum_grapics 			= $detail["minimum_grapics"];
		$minimum_storage 			= $detail["minimum_storage"];
		$minimum_addition_note 		= $detail["minimum_addition_note"];
		$recommended_os 			= $detail["recommended_os"];
		$recommended_processor 		= $detail["recommended_processor"];
		$recommended_memory 		= $detail["recommended_memory"];
		$recommended_grapics 		= $detail["recommended_grapics"];
		$recommended_storage 		= $detail["recommended_storage"];
		$recommended_addition_note 	= $detail["recommended_addition_note"];
		$thumbnail_filename 		= $detail["thumbnail_filename"];
		$minor_image_filename 		= $detail["minor_image_filename"];
		$description_filename 		= $detail["description_filename"];

		echo "game name         				:".$game_name."<br/>";	
		echo "game release date       			:".$game_release_date."<br/>";
		echo "game_developer       				:".$game_developer."<br/>";
		echo "game_publisher         			:".$game_publisher."<br/>";
		echo "game_price         				:".$game_price."<br/>";
		echo "tags name         				:";print_r($tags_name); echo "<br/>";
		echo "minimum_os         				:".$minimum_os."<br/>";
		echo "minimum_processor         		:".$minimum_processor."<br/>";
		echo "minimum_memory          			:".$minimum_memory."<br/>";
		echo "minimum_grapics          			:".$minimum_grapics."<br/>";
		echo "minimum_storage          			:".$minimum_storage."<br/>";
		echo "minimum_addition_note          	:".$minimum_addition_note."<br/>";
		echo "recommended_os          			:".$recommended_os."<br/>";
		echo "recommended_processor          	:".$recommended_processor."<br/>";
		echo "recommended_memory          		:".$recommended_memory."<br/>";
		echo "recommended_grapics          		:".$recommended_grapics."<br/>";
		echo "recommended_storage          		:".$recommended_storage."<br/>";
		echo "recommended_addition_note         :".$recommended_addition_note."<br/>";
		echo "thumbnail_filename          		:".$thumbnail_filename."<br/>";
		echo "minor_image_filename        		:";print_r($minor_image_filename); echo "<br/>";
		echo "description_filename          	:".$description_filename."<br/>";

		if ($dlc != null) 
		{
			$dlc_name_all 				= $dlc["dlc_name_all"];
			$dlc_release_date_all 		= $dlc["dlc_release_date_all"];
			$dlc_price_all 				= $dlc["dlc_price_all"];
			$dlc_image_all 				= $dlc["dlc_image_all"];
			$dlc_description_all 		= $dlc["dlc_description_all"];
			echo "dlc_name_all        				:";print_r($dlc_name_all); echo "<br/>";
			echo "dlc_release_date_all        		:";print_r($dlc_release_date_all); echo "<br/>";
			echo "dlc_price_all        				:";print_r($dlc_price_all); echo "<br/>";
			echo "dlc_image_all        				:";print_r($dlc_image_all); echo "<br/>";
			echo "dlc_description_all        		:";print_r($dlc_description_all); echo "<br/>";	
		}
		else
		{
			$dlc_name_all 				= "";
			$dlc_release_date_all 		= "";
			$dlc_price_all 				= "";
			$dlc_image_all 				= "";
			$dlc_description_all 		= "";
		}

	?>
	<button type="button" onclick="confirm_data()">confirm</button>
</body>
<script>
	var game_name 								= '<?php  echo $game_name 	?>';
	var game_release_date						= '<?php  echo $game_release_date 	?>';
	var game_developer							= '<?php  echo $game_developer 	?>';
	var game_publisher							= '<?php  echo $game_publisher 	?>';
	var game_price								= '<?php  echo $game_price 	?>';
	var tags_name 								= JSON.parse('<?php echo json_encode($tags_name); ?>');

	var minimum_os 								= '<?php  echo $minimum_os 	?>';
	var minimum_processor						= '<?php  echo $minimum_processor 	?>';
	var minimum_memory							= '<?php  echo $minimum_memory 	?>';
	var minimum_grapics							= '<?php  echo $minimum_grapics 	?>';
	var minimum_storage							= '<?php  echo $minimum_storage 	?>';
	var minimum_addition_note 					= '<?php  echo $minimum_addition_note; ?>';

	var recommended_os 							= '<?php  echo $recommended_os 	?>';
	var recommended_processor					= '<?php  echo $recommended_processor 	?>';
	var recommended_memory						= '<?php  echo $recommended_memory 	?>';
	var recommended_grapics						= '<?php  echo $recommended_grapics 	?>';
	var recommended_storage						= '<?php  echo $recommended_storage 	?>';
	var recommended_addition_note 				= '<?php  echo $recommended_addition_note; ?>';


	var thumbnail_filename 						= '<?php  echo $thumbnail_filename 	?>';
	var minor_image_filename					= JSON.parse('<?php  echo json_encode($minor_image_filename) 	?>');
	var description_filename 					= '<?php  echo $description_filename 	?>';

	var check_dlc_name_all 							='<?php  echo empty($dlc); ?>';
	if (check_dlc_name_all != 1) 
	{
		console.log("check_dlc_name_all*");
		var dlc_name_all 						= JSON.parse('<?php  echo json_encode($dlc_name_all); ?>');
		var dlc_release_date_all				= JSON.parse('<?php  echo json_encode($dlc_release_date_all); ?>');
		var dlc_price_all						= JSON.parse('<?php  echo json_encode($dlc_price_all); ?>');
		var dlc_image_all						= JSON.parse('<?php  echo json_encode($dlc_image_all); ?>');
		var dlc_description_all					= JSON.parse('<?php  echo json_encode($dlc_description_all); ?>');
	}
	function confirm_data() 
	{
		var main_game 										= {};
		main_game.game_name 								= game_name;
		main_game.game_release_date		 					= game_release_date;
		main_game.game_developer 							= game_developer;
		main_game.game_publisher 							= game_publisher;
		main_game.game_price 								= game_price;
		main_game.tags_name 								= tags_name;
		main_game.thumbnail_filename 						= thumbnail_filename;
		main_game.minor_image_filename 						= minor_image_filename;
		main_game.description_filename 						= description_filename;

		var minimum_requirment								= {};
		minimum_requirment.minimum_os 						= minimum_os;
		minimum_requirment.minimum_processor				= minimum_processor;
		minimum_requirment.minimum_memory 					= minimum_memory;
		minimum_requirment.minimum_grapics 					= minimum_grapics;
		minimum_requirment.minimum_storage 					= minimum_storage;
		minimum_requirment.minimum_addition_note 			= minimum_addition_note;

		var recommended_requirment							= {};
		recommended_requirment.recommended_os 				= recommended_os;
		recommended_requirment.recommended_processor		= recommended_processor;
		recommended_requirment.recommended_memory 			= recommended_memory;
		recommended_requirment.recommended_grapics 			= recommended_grapics;
		recommended_requirment.recommended_storage 			= recommended_storage;
		recommended_requirment.recommended_addition_note 	= recommended_addition_note;
		if (check_dlc_name_all != 1) 
		{
			console.log("check_dlc_name_all**");
			var dlc 											= {};
			dlc.dlc_name_all 									= dlc_name_all;
			dlc.dlc_release_date_all							= dlc_release_date_all;
			dlc.dlc_price_all 									= dlc_price_all;
			dlc.dlc_image_all 									= dlc_image_all;
			dlc.dlc_description_all 							= dlc_description_all;
		}
		else
		{
			var dlc 											= {};
		}
		$.ajax({
		url:"insert_game.php",
		method : "post",
		data : {main_game : JSON.stringify(main_game),minimum_requirment : JSON.stringify(minimum_requirment),recommended_requirment : JSON.stringify(recommended_requirment),dlc : JSON.stringify(dlc)},
			success: function(res)
		{
			console.log(res+"<br/>");
		}
		})
		alert("Your game is successfully recorded!!");
		window.location.href='http://localhost/i/homework/workshop/admin/';
	}
</script>
</html>