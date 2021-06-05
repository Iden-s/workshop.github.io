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
	function Send_data_non_confirm_users($email,$birthdate,$sex,$country)
	{
		$conn = createMysqlConnection();		
		$sql = "INSERT INTO non_confirm_users (id_user,email,birthdate,sex,country) VALUES (0,'$email','$birthdate','$sex','$country')";

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