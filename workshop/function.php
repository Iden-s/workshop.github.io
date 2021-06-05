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
	function GetColumn_email()
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT users_detail.email FROM users_detail";
		$result = $conn->query($sql);
	    $all_data=array();
		if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("email"=>$row["email"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function GetColumn_username()
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT users.usernames FROM users";
		$result = $conn->query($sql);
	    $all_data=array();
		if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("usernames"=>$row["usernames"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function Send_data_users_detail($email,$birthdate,$sex,$country)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO users_detail (id_users,email,birthdate,sex,country) VALUES (0,'$email','$birthdate','$sex','$country')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	function Send_data_users($username,$password)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO users (id_users,usernames,passwords) VALUES (0,'$username','$password')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	function GetColumn_usernames_and_passwords()
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT users.usernames,users.passwords FROM users";
		$result = $conn->query($sql);
	    $all_data=array();
		if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("usernames"=>$row["usernames"],
	            	"passwords"=>$row["passwords"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	
	function GetColumn_tags()
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT * FROM tags";
		$result = $conn->query($sql);
	    $all_data=array();		if ($result->num_rows > 0) 

		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("id_tags"=>$row["id_tags"],
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

	function Getgame_listsANDthumnail_imagesANDtags()
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
					  	game_lists.id_games,
						game_lists.game_names,
						game_lists.release_date,
						game_lists.developers,
						game_lists.publishers,
						game_lists.price,
                        match_game_tags.id_tags,
                       	tags.tag_name,
					  	thumnail_images.image_name
				FROM
				   ((game_lists
				INNER JOIN match_game_tags ON game_lists.id_games = match_game_tags.id_games)
               	INNER JOIN thumnail_images ON game_lists.id_games = thumnail_images.id_games)
 				INNER JOIN tags ON match_game_tags.id_tags = tags.id_tags;
				";
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
	            					"price"=>$row["price"],
	            					"id_tags"=>$row["id_tags"],
	            					"tag_name"=>$row["tag_name"],
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
	function Getgame_listsANDthumnail_imagesANDtags_by_game_name($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
					  	game_lists.id_games,
						game_lists.game_names,
						game_lists.release_date,
						game_lists.developers,
						game_lists.publishers,
						game_lists.price,
                        match_game_tags.id_tags,
                       	tags.tag_name,
					  	thumnail_images.image_name
				FROM
				   (((game_lists
				INNER JOIN match_game_tags ON game_lists.id_games = match_game_tags.id_games)
               	INNER JOIN thumnail_images ON game_lists.id_games = thumnail_images.id_games)
 				INNER JOIN tags ON match_game_tags.id_tags = tags.id_tags) WHERE LOWER(`game_names`) LIKE '$game_name';
				";
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
	            					"price"=>$row["price"],
	            					"id_tags"=>$row["id_tags"],
	            					"tag_name"=>$row["tag_name"],
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
	function Getgame_listsANDthumnail_imagesANDtags_by_tags_and_price($tags,$price_range)
	{
		$conn = createMysqlConnection();
		$count_tags =  count($tags);
		$template_price_range_sql="";	
		if ($price_range == "lower100") 
		{
			$template_price_range_sql =  "AND game_lists.price < 100";
		}
		if ($price_range == "_100to300") 
		{
			$template_price_range_sql =  "AND 100 <= game_lists.price  AND game_lists.price < 300";
		}
		if ($price_range == "_300to500") 
		{
			$template_price_range_sql =  "AND 300 <= game_lists.price  AND game_lists.price < 500";
		}
		if ($price_range == "_500to1000") 
		{
			$template_price_range_sql =  "AND 500 <= game_lists.price  AND game_lists.price < 1000";
		}
		if ($price_range == "upper1000") 
		{
			$template_price_range_sql =  "AND 1000 <= game_lists.price";
		}	
		
		$template_start_tags_sql ="(";
		for ($i=0; $i < $count_tags; $i++) 
		{ 
			if ($i==$count_tags-1) 
			{
				$template_start_tags_sql = $template_start_tags_sql . '\''.$tags[$i].'\'';
			}
			else
			{
				$template_start_tags_sql = $template_start_tags_sql . '\'' . $tags[$i] . '\''.',';
			}
		}
		$template_end_tags_sql = ")";
		$template_final_tags_sql = $template_start_tags_sql . $template_end_tags_sql;
		$template_start_full_sql = "SELECT 
						game_lists.id_games,
						game_lists.game_names,
						game_lists.release_date,
						game_lists.developers,
						game_lists.publishers,
						game_lists.price,
                        match_game_tags.id_tags,
                       	tags.tag_name,
					  	thumnail_images.image_name
				FROM
				   (((game_lists
				INNER JOIN match_game_tags ON game_lists.id_games = match_game_tags.id_games)
               	INNER JOIN thumnail_images ON game_lists.id_games = thumnail_images.id_games)
 				INNER JOIN tags ON match_game_tags.id_tags = tags.id_tags) WHERE tags.tag_name  IN ";
 		$template_mid_full_sql = " GROUP BY game_lists.game_names HAVING COUNT(*)  = $count_tags ";
 		$template_final_full_sql = $template_start_full_sql . $template_final_tags_sql . $template_mid_full_sql . $template_price_range_sql;
 		/*echo $tags."</br>";
 		echo $tags[0]."</br>";
 		echo $count_tags."</br>";
 		echo $template_final_full_sql;
		/*$sql = "SELECT
					  	game_lists.id_games,
						game_lists.game_names,
						game_lists.release_date,
						game_lists.developers,
						game_lists.publishers,
						game_lists.price,
                        match_game_tags.id_tags,
                       	tags.tag_name,
					  	thumnail_images.image_name
				FROM
				   (((game_lists
				INNER JOIN match_game_tags ON game_lists.id_games = match_game_tags.id_games)
               	INNER JOIN thumnail_images ON game_lists.id_games = thumnail_images.id_games)
 				INNER JOIN tags ON match_game_tags.id_tags = tags.id_tags) WHERE tags.tag_name  IN ('action','multi-player','war') GROUP BY game_lists.game_names HAVING COUNT(tags.tag_name)  = 3 AND game_lists.price > 1000";*/
		$sql = $template_final_full_sql;
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
	            					"price"=>$row["price"],
	            					"id_tags"=>$row["id_tags"],
	            					"tag_name"=>$row["tag_name"],
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
	function Getgame_listsANDthumnail_imagesANDtags_by_array_game_name($game_name)
	{
		$conn = createMysqlConnection();
		$count_game_name =  count($game_name);	
		$template_start_game_name_sql ="(";
		for ($i=0; $i < $count_game_name; $i++) 
		{ 
			if ($i==$count_game_name-1) 
			{
				$template_start_game_name_sql = $template_start_game_name_sql . '\''.$game_name[$i].'\'';
			}
			else
			{
				$template_start_game_name_sql = $template_start_game_name_sql . '\'' . $game_name[$i] . '\''.',';
			}
		}
		$template_end_game_name_sql = ")";	
		$template_final_game_name_sql = $template_start_game_name_sql . $template_end_game_name_sql;
		$template_start_full_sql = "SELECT
					  	game_lists.id_games,
						game_lists.game_names,
						game_lists.release_date,
						game_lists.developers,
						game_lists.publishers,
						game_lists.price,
                        match_game_tags.id_tags,
                       	tags.tag_name,
					  	thumnail_images.image_name
				FROM
				   (((game_lists
				INNER JOIN match_game_tags ON game_lists.id_games = match_game_tags.id_games)
               	INNER JOIN thumnail_images ON game_lists.id_games = thumnail_images.id_games)
 				INNER JOIN tags ON match_game_tags.id_tags = tags.id_tags) WHERE  game_lists.game_names IN ";
		$template_final_full_sql = $template_start_full_sql.$template_final_game_name_sql;
		$sql = $template_final_full_sql;
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
	            					"price"=>$row["price"],
	            					"id_tags"=>$row["id_tags"],
	            					"tag_name"=>$row["tag_name"],
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
?>