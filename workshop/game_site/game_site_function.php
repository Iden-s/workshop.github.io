<?php  
	function createMysqlConnection()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "game_store";

			// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) 
		{
		die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	function GetColumn_image_specific_game($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
					  	minor_images.id_games,
					  	minor_images.minor_images_name
					  	FROM
				   		game_lists 
						INNER JOIN minor_images ON game_lists.id_games    =  minor_images.id_games WHERE `game_names`='$game_name';";
		$result = $conn->query($sql);
	    $all_data=array();
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("id_games"=>$row["id_games"],
	            					"minor_images_name"=>$row["minor_images_name"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function GetColumn_thumbnail_image_specific_game($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
						thumnail_images.id_games,
						thumnail_images.image_name
						FROM
						game_lists 
						INNER JOIN thumnail_images ON game_lists.id_games    =  thumnail_images.id_games WHERE `game_names`='$game_name';";
		$result = $conn->query($sql);
	    $all_data=array();
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("id_games"=>$row["id_games"],
	            					"image_name"=>$row["image_name"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function GetColumn_game_detail_specific_game($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
					  	game_lists.id_games,
						game_lists.game_names,
						game_lists.release_date,
						game_lists.developers,
						game_lists.publishers,
                        match_game_tags.id_tags,
                        tags.tag_name
				FROM
				  ((game_lists 
 				INNER JOIN match_game_tags ON game_lists.id_games = match_game_tags.id_games)
                INNER JOIN tags 		   ON match_game_tags.id_tags = tags.id_tags) WHERE `game_names`='$game_name' ;";
		$result = $conn->query($sql);
	    $all_data=array();
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("id_games"=>$row["id_games"],
	            					"game_names"=>$row["game_names"],
	            					"release_date"=>$row["release_date"],
	            					"developers"=>$row["developers"],
	            					"publishers"=>$row["publishers"],
	            					"id_tags"=>$row["id_tags"],
	        						"tag_name"=>$row["tag_name"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function GetColumn_game_price_specific_game($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
					  	game_lists.price
				FROM
				  game_lists  WHERE `game_names`='$game_name' ;";
		$result = $conn->query($sql);
	    $all_data=array();
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("price"=>$row["price"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function GetColumn_dlc_specific_game($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
						game_lists.game_names,
                        dlc.dlc_names,
                        dlc.dlc_price
				FROM
				  game_lists 
                INNER JOIN dlc ON game_lists.id_games = dlc.id_games WHERE `game_names`='$game_name' ;";
		$result = $conn->query($sql);
	    $all_data=array();
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("game_names"=>$row["game_names"],
	        						"dlc_names"=>$row["dlc_names"],
	    							"dlc_price"=>$row["dlc_price"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function GetColumn_description_specific_game($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
					  	game_lists.game_names,
					  	description.description_name
					  	FROM
				   		description 
						INNER JOIN game_lists ON description.id_games = game_lists.id_games WHERE `game_names`='$game_name';";
		$result = $conn->query($sql);
	    $all_data=array();
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("game_names"=>$row["game_names"],
	    							"description_name"=>$row["description_name"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function GetColumn_minimum_requirment_specific_game($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
						game_lists.game_names,
                        minimum_requirment.os,
                        minimum_requirment.processor,
                        minimum_requirment.memory,
                        minimum_requirment.grapics,
                        minimum_requirment.storage,
                        minimum_requirment.addition_note
				FROM
				  game_lists 
                INNER JOIN minimum_requirment ON game_lists.id_games = minimum_requirment.id_games WHERE `game_names`='$game_name' ;";
		$result = $conn->query($sql);
	    $all_data=array();
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("game_names"=>$row["game_names"],
	        						"os"=>$row["os"],
	        						"processor"=>$row["processor"],
	        						"memory"=>$row["memory"],
	        						"grapics"=>$row["grapics"],
	    							"storage"=>$row["storage"],
	    							"addition_note"=>$row["addition_note"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function GetColumn_recommend_requirment_specific_game($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
						game_lists.game_names,
                        recommend_requirment.os,
                        recommend_requirment.processor,
                        recommend_requirment.memory,
                        recommend_requirment.grapics,
                        recommend_requirment.storage,
                        recommend_requirment.addition_note
				FROM
				  game_lists 
                INNER JOIN recommend_requirment ON game_lists.id_games = recommend_requirment.id_games WHERE `game_names`='$game_name' ;";
		$result = $conn->query($sql);
	    $all_data=array();
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("game_names"=>$row["game_names"],
	        						"os"=>$row["os"],
	        						"processor"=>$row["processor"],
	        						"memory"=>$row["memory"],
	        						"grapics"=>$row["grapics"],
	    							"storage"=>$row["storage"],
	    							"addition_note"=>$row["addition_note"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
?>