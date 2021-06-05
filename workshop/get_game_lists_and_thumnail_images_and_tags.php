<?php  
	require_once("function.php");
	if (isset($_POST['tags_selected'])) 
	{
		$game_name 								=  trim($_POST['game_name_searched']);
	}
	else
	{
		$game_name 								=  "";
	}
	if (isset($_POST['tags_selected'])) 
	{
		$tags_selected 							=  $_POST['tags_selected'];
		$tags_selected_array    				=  explode(",", $tags_selected)	;
	}
	else
	{
		$tags_selected 							= "";
		$tags_selected_array  					=  [];
	}
	if (isset($_POST['price_selected'])) 
	{
		$price_selected 						=  $_POST['price_selected'];
	}
	else
	{
		$price_selected 						=  "";
	}
	if ($game_name == "" && $tags_selected == "" && $price_selected == "") 
	{
		$myJSON = json_encode(Getgame_listsANDthumnail_imagesANDtags());
		print_r($myJSON);
		exit;	
	}
	if ($game_name != "" && $tags_selected == "" && $price_selected == "") 
	{
		$game_name = strtolower($game_name);
		$game_name = $game_name."%";
		$myJSON = json_encode(Getgame_listsANDthumnail_imagesANDtags_by_game_name($game_name));
		print_r($myJSON);
		exit;
	}
	$game_searched_by_tags_and_price = Getgame_listsANDthumnail_imagesANDtags_by_tags_and_price($tags_selected_array,$price_selected);
	//print_r($game_searched_by_tags_and_price);
	//echo $game_searched_by_tags_and_price[0]['game_names'];
	$count_game_searched_by_tags_and_price = count($game_searched_by_tags_and_price);
	//echo $count_game_searched_by_tags_and_price;
	$game_searched_by_tags_and_price_array = array();
	for ($i=0; $i < $count_game_searched_by_tags_and_price; $i++) 
	{ 
		$game_searched_by_tags_and_price_array[$i] = $game_searched_by_tags_and_price[$i]['game_names'];
	}
	//print_r($game_searched_by_tags_and_price_array);
	$myJSON = json_encode(Getgame_listsANDthumnail_imagesANDtags_by_array_game_name($game_searched_by_tags_and_price_array));
	print_r($myJSON);

?>