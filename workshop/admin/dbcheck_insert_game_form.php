<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
	<title></title>
</head>
<body>
	<?php  
		$game_name 		 						= $_POST["game_name"];
		$game_release_date  					= $_POST["game_release_date"];
		$game_developer  						= $_POST["game_developer"];
		$game_publisher  						= $_POST["game_publisher"];
		$game_price 		 					= $_POST["game_price"];
		$tags  									= $_POST["tags"];

		$minimum_os								= $_POST["minimum_os"];
		$minimum_processor 						= $_POST["minimum_processor"];
		$minimum_memory 						= $_POST["minimum_memory"];		
		$minimum_grapics 						= $_POST["minimum_grapics"];			
		$minimum_storage 						= $_POST["minimum_storage"];		
		$minimum_addition_note 					= $_POST["minimum_addition_note"];	

		$recommended_os							= $_POST["recommended_os"];
		$recommended_processor 					= $_POST["recommended_processor"];
		$recommended_memory 					= $_POST["recommended_memory"];		
		$recommended_grapics 					= $_POST["recommended_grapics"];			
		$recommended_storage 					= $_POST["recommended_storage"];		
		$recommended_addition_note 				= $_POST["recommended_addition_note"];

		$game_thumbnail_image 					= $_POST["game_thumbnail_image"];		
		$game_minor_image 						= $_POST["game_minor_image"];

		$dlc_name  								= $_POST["dlc_name"];
		$dlc_release_date  						= $_POST["dlc_release_date"];
		$dlc_price  							= $_POST["dlc_price"];
		$dlc_image  							= $_POST["dlc_image"];

		echo "game name         				:".$game_name."<br/>";	
		echo "game release date 				:".$game_release_date."<br/>";	
		echo "game developer    				:".$game_developer."<br/>";	
		echo "game publisher    				:".$game_publisher."<br/>";	
		echo "game price        				:".$game_price."<br/>";	
		echo "tags        						:";print_r($tags); echo "<br/><br/>";

		echo "game thumbnail image       		:".$game_thumbnail_image."<br/>";		
		echo "game minor image 					:";print_r($game_minor_image); echo "<br/><br/>";

		echo "minimum storage        			:".$minimum_storage."<br/>";	
		echo "minimum processor 				:".$minimum_processor."<br/>";	
		echo "minimum memory    				:".$minimum_memory."<br/>";	
		echo "minimum grapics   				:".$minimum_grapics."<br/>";	
		echo "minimum storage        			:".$minimum_storage."<br/>";	
		echo "minimum addition note       		:".$minimum_addition_note."<br/><br/>";

		echo "recommended storage        		:".$recommended_storage."<br/>";	
		echo "recommended processor 			:".$recommended_processor."<br/>";	
		echo "recommended memory    			:".$recommended_memory."<br/>";	
		echo "recommended grapics   			:".$recommended_grapics."<br/>";	
		echo "recommended storage        		:".$recommended_storage."<br/>";	
		echo "recommended addition note       	:".$recommended_addition_note."<br/><br/>";

		echo "dlc name        					:";print_r($dlc_name); echo "<br/>";	
		echo "dlc release date					:";print_r($dlc_release_date); echo "<br/>";	
		echo "dlc price   						:";print_r($dlc_price); echo "<br/>";
		echo "dlc image   						:";print_r($dlc_image); echo "<br/><br/>";
	?>
	<button type="button" onclick="confirm_data()">confirm</button>

</body>
<script >
	var game_name 								= '<?php  echo $game_name 	?>';
	var game_release_date						= '<?php  echo $game_release_date 	?>';
	var game_developer							= '<?php  echo $game_developer 	?>';
	var game_price								= '<?php  echo $game_price 	?>';
	var game_publisher							= '<?php  echo $game_publisher 	?>';
	var tags 									= JSON.parse('<?php  echo json_encode($tags); ?>');

	var game_thumbnail_image 					= '<?php  echo $game_thumbnail_image 	?>';
	var game_minor_image						= JSON.parse('<?php  echo json_encode($game_minor_image) 	?>');

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

	var dlc_name 								= JSON.parse('<?php  echo json_encode($dlc_name); ?>');
	var dlc_release_date						= JSON.parse('<?php  echo json_encode($dlc_release_date); ?>');
	var dlc_price								= JSON.parse('<?php  echo json_encode($dlc_price); ?>');
	var dlc_image								= JSON.parse('<?php  echo json_encode($dlc_image); ?>');
	console.log(game_minor_image);
	console.log(game_price);
	console.log(tags);
	console.log(dlc_name);
	console.log(dlc_release_date);
	console.log(dlc_price);
	console.log(dlc_image);
	function confirm_data() 
	{
		var main_game 										= {};
		main_game.game_name 								= game_name;
		main_game.game_release_date		 					= game_release_date;
		main_game.game_developer 							= game_developer;
		main_game.game_publisher 							= game_publisher;
		main_game.game_price 								= game_price;
		main_game.tags 										= tags;
		main_game.game_thumbnail_image 						= game_thumbnail_image;
		main_game.game_minor_image 							= game_minor_image;

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

		var dlc 											= {};
		dlc.dlc_name 										= dlc_name;
		dlc.dlc_release_date								= dlc_release_date;
		dlc.dlc_price 										= dlc_price;
		dlc.dlc_image 										= dlc_image;

		$.ajax({
		url:"insert_game.php",
		method : "post",
		data : {main_game : JSON.stringify(main_game),minimum_requirment : JSON.stringify(minimum_requirment),recommended_requirment : JSON.stringify(recommended_requirment),dlc : JSON.stringify(dlc)},
			success: function(res)
		{
			console.log(res+"<br/>");
		}
		})
	}
</script>
</html>