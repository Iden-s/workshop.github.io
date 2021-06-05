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

	//Insert part
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
	function Insert_game_list($game_name,$release_date,$developers,$publishers,$price)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO game_lists (id_games,game_names,release_date,developers,publishers,price) VALUES (0,'$game_name','$release_date','$developers','$publishers','$price')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	function Get_id_games()
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT MAX(id_games) FROM game_lists;";
		$result = $conn->query($sql);
	    $all_data=array();		
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("id_games"=>$row["MAX(id_games)"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function Insert_description($description_filename,$id_games)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO description (id_description,description_name,id_games) VALUES (0,'$description_filename','$id_games')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	function Insert_thumnail_images($image_name,$id_games)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO thumnail_images (id_thumbnail_images,image_name,id_games) VALUES (0,'$image_name','$id_games')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	function Insert_minor_images($id_games,$minor_images_name)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO minor_images (id_games,minor_images_name) VALUES ('$id_games','$minor_images_name')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}	
	function Insert_match_game_tags($id_games,$id_tags)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO match_game_tags (id_games,id_tags) VALUES ('$id_games','$id_tags')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}	
	function Insert_minimum_requirment($id_games,$minimum_os,$minimum_processor,$minimum_memory,$minimum_grapics,$minimum_storage,$minimum_addition_note)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO minimum_requirment (id_games,min_os,min_processor,min_memory,min_grapics,min_storage,min_addition_note) VALUES ('$id_games','$minimum_os','$minimum_processor','$minimum_memory','$minimum_grapics','$minimum_storage','$minimum_addition_note')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	function Insert_recommend_requirment($id_games,$recommended_os,$recommended_processor,$recommended_memory,$recommended_grapics,$recommended_storage,$recommended_addition_note)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO recommend_requirment (id_games,rec_os,rec_processor,rec_memory,rec_grapics,rec_storage,rec_addition_note) VALUES ('$id_games','$recommended_os','$recommended_processor','$recommended_memory','$recommended_grapics','$recommended_storage','$recommended_addition_note')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	function Insert_dlc($dlc_name,$dlc_price,$dlc_release_date,$id_games)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO dlc (id_dlc,dlc_names,dlc_price,dlc_release_date,id_games) VALUES (0,'$dlc_name','$dlc_price','$dlc_release_date','$id_games')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	function Get_id_dlc()
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT MAX(id_dlc) FROM dlc;";
		$result = $conn->query($sql);
	    $all_data=array();		
	    if ($result->num_rows > 0) 

		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("id_dlc"=>$row["MAX(id_dlc)"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function Insert_dlc_images($id_dlc,$dlc_image)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO dlc_images (id_dlc,dlc_image_name) VALUES ('$id_dlc','$dlc_image')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	function Insert_dlc_description($description_filename,$id_dlc)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO dlc_description (id_dlc_description,description_name,id_dlc) VALUES (0,'$description_filename','$id_dlc')";

		if ($conn->query($sql) === TRUE) 
		{
	  		echo "New record created successfully";
		} else 
		{
	  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}

	//Update part
	function Get_game_list()
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT * FROM game_lists";
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
	         		"insert_time_game"=>$row["insert_time_game"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function Get_id_game_name($game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT game_lists.id_games FROM game_lists WHERE game_names = '$game_name' ";
		$result = $conn->query($sql);
	    $all_data=array();		
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("id_games"=>$row["id_games"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function Get_dlc($id_game_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT dlc.dlc_names FROM dlc WHERE id_games = $id_game_name ";
		$result = $conn->query($sql);
	    $all_data=array();		
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("dlc_names"=>$row["dlc_names"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function Get_game_list_detail($game_name)
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
					  	thumnail_images.image_name,
						minor_images.minor_images_name
				FROM
				   ((((game_lists
				INNER JOIN match_game_tags ON game_lists.id_games = match_game_tags.id_games)
               	INNER JOIN thumnail_images ON game_lists.id_games = thumnail_images.id_games)
 				INNER JOIN tags ON match_game_tags.id_tags = tags.id_tags) 
                INNER JOIN minor_images ON game_lists.id_games = minor_images.id_games) WHERE game_names = '$game_name' ;";
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
	         		"tag_name"=>$row["tag_name"],
	         		"thumbnail_image_name"=>$row["image_name"],
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
	function Get_dlc_list_detail($dlc_name)
	{
		$conn = createMysqlConnection();		
		$sql = "SELECT
					  	dlc.id_dlc,
						dlc.dlc_names,
						dlc.dlc_price,
						dlc.dlc_release_date,
						dlc.id_games,
						dlc_description.id_dlc_description,
                       	dlc_description.description_name,
					  	dlc_images.dlc_image_name
				FROM
				   ((dlc
				INNER JOIN dlc_description ON dlc_description.id_dlc = dlc.id_dlc)
               	INNER JOIN dlc_images ON dlc_images.id_dlc = dlc.id_dlc) WHERE dlc_names = '$dlc_name' ;";
		$result = $conn->query($sql);
	    $all_data=array();		
	    if ($result->num_rows > 0) 
		{
			  // output data of each row
			  while($row = $result->fetch_assoc()) 
			  {
	            $all_data_row= array("id_dlc"=>$row["id_dlc"],
	         		"dlc_names"=>$row["dlc_names"],
	         		"dlc_price"=>$row["dlc_price"],
	         		"dlc_release_date"=>$row["dlc_release_date"],
	         		"id_games"=>$row["id_games"],
	         		"id_dlc_description"=>$row["id_dlc_description"],
	         		"description_name"=>$row["description_name"],
	         		"dlc_image_name"=>$row["dlc_image_name"]);
			  	array_push($all_data, $all_data_row);
			  }
			 
		} else 
		{
			  echo "0 results";
		}
		$conn->close();
		return $all_data;
	}
	function Update_dlc_list_detail($dlc_name_old,$dlc_name,$dlc_release_date,$dlc_price)
	{
		$conn = createMysqlConnection();		
		$sql = "UPDATE dlc
				SET dlc_names = '$dlc_name', dlc_release_date = '$dlc_release_date', dlc_price= '$dlc_price'
				WHERE dlc_names = '$dlc_name_old';";
		if ($conn->query($sql) === TRUE) 
		{
		 	echo "New record created successfully";
		} else 
		{
		 	echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

?>