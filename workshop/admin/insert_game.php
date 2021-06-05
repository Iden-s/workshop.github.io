<?php  
	require_once("form_function.php");
	$main_game 						= json_decode($_POST['main_game'],true);
	$minimum_requirment  			= json_decode($_POST['minimum_requirment'],true);
	$recommended_requirment  		= json_decode($_POST['recommended_requirment'],true);
	$dlc 							= json_decode($_POST['dlc'],true);
	if ($dlc == "") 
	{
		$dlc 		= "";

	}
	$game_name 		 				= $main_game['game_name'];
	$game_release_date  			= $main_game['game_release_date'];
	$game_developer  				= $main_game['game_developer'];
	$game_publisher  				= $main_game['game_publisher'];
	$game_price  					= $main_game['game_price'];
	$tags_name 		 				= $main_game['tags_name'];
	$thumbnail_filename  			= $main_game['thumbnail_filename'];
	$minor_image_filename  			= $main_game['minor_image_filename'];
	$description_filename  			= $main_game['description_filename'];

	$minimum_os 		 			= $minimum_requirment['minimum_os'];
	$minimum_processor  			= $minimum_requirment['minimum_processor'];
	$minimum_memory  				= $minimum_requirment['minimum_memory'];
	$minimum_grapics  				= $minimum_requirment['minimum_grapics'];
	$minimum_storage 		 		= $minimum_requirment['minimum_storage'];
	$minimum_addition_note  		= $minimum_requirment['minimum_addition_note'];

	$recommended_os 		 		= $recommended_requirment['recommended_os'];
	$recommended_processor  		= $recommended_requirment['recommended_processor'];
	$recommended_memory  			= $recommended_requirment['recommended_memory'];
	$recommended_grapics  			= $recommended_requirment['recommended_grapics'];
	$recommended_storage 		 	= $recommended_requirment['recommended_storage'];
	$recommended_addition_note  	= $recommended_requirment['recommended_addition_note'];

	$dlc_name_all 		 			= $dlc['dlc_name_all'] ?? "";
	$dlc_release_date_all  			= $dlc['dlc_release_date_all'] ?? "";
	$dlc_price_all  				= $dlc['dlc_price_all'] ?? "";
	$dlc_image_all  				= $dlc['dlc_image_all'] ?? "";
	$dlc_description_all			= $dlc['dlc_description_all'] ?? "";

	$get_tags 				        = GetColumn_tags();
	$get_tags_length 				= count($get_tags);
	$tags_length       	 			= count($tags_name);
	$get_tags_id_tags        		= array();

	$game_minor_image_length        = count($minor_image_filename);

	$get_id_dlc 				    = Get_id_dlc();
	if ($dlc_name_all == "") 
	{
		$get_dlc_length = 0;
	}
	else
	{
		$get_dlc_length 				= count($dlc_name_all);
	}
 
	$id_games						= Get_id_games();
	$id_games 				        = $id_games[0]["id_games"]+1;

	Insert_game_list($game_name,$game_release_date,$game_developer,$game_publisher,$game_price);
	Insert_thumnail_images($thumbnail_filename,$id_games);

	for ($i=0; $i < $get_tags_length ; $i++) 
	{ 
		for ($j=0; $j < $tags_length ; $j++) 
		{ 
			if (strcasecmp($get_tags[$i]["tag_name"],$tags_name[$j])==0) 
			{
				array_push($get_tags_id_tags,$get_tags[$i]["id_tags"]);
			}
		}
	}
	for ($i=0; $i < $tags_length ; $i++) 
	{ 
		Insert_match_game_tags($id_games,$get_tags_id_tags[$i]);
	}
	for ($i=0; $i < $game_minor_image_length ; $i++) 
	{ 
		Insert_minor_images($id_games ,$minor_image_filename[$i]);	
	}

	Insert_minimum_requirment($id_games,$minimum_os,$minimum_processor,$minimum_memory,$minimum_grapics,$minimum_storage,$minimum_addition_note);
	Insert_recommend_requirment($id_games,$recommended_os,$recommended_processor,$recommended_memory,$recommended_grapics,$recommended_storage,$recommended_addition_note);
	Insert_description($description_filename,$id_games);
  
  	if ($dlc != "") 
  	{
  		for ($i=0; $i < $get_dlc_length ; $i++) 
		{ 
			$get_dlc_image_length 			= count($dlc_image_all[$i]);
			$current_id_dlc 				    = $get_id_dlc[0]["id_dlc"]+$i+1;
			Insert_dlc_description($dlc_description_all[$i],$current_id_dlc);	
			if ($dlc_name_all[$i] != "" && $dlc_price_all[$i] != "" && $dlc_release_date_all[$i] != "") 
			{
				Insert_dlc($dlc_name_all[$i],$dlc_price_all[$i],$dlc_release_date_all[$i],$id_games);
				for ($j=0; $j < $get_dlc_image_length ; $j++) 
				{	 
					Insert_dlc_images($current_id_dlc,$dlc_image_all[$i][$j]);
				}		
			}
		}	
  	}

?>
