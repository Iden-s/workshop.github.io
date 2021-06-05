<?php
	if (isset($_POST["game_list"])) 
	{
		$game_name = $_POST["game_list"];
		$dlc_dir = "../game_list/".$game_name."/dlc_list/";
		$dlc_list = scandir($dlc_dir);
		echo json_encode($dlc_list);
		echo $game_name;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
	</head>
	<body>
		<h1>CHOOSE DLC (OPTIONAL)</h1>
		<h3>if you don't choose dlc path, it mean "main game description" !! </h3>
		<form action="insert_description_form_3.php" method="POST">
			<label for="game_name">game :</label>
			<span id="game_name"></span><br/><br/>
			<label for="dlc_list">dlc :</label>
			<select name="dlc_list" id="dlc_list">
  				<option value=""></option>
  			</select>
  		<br/><br/>
		<input type="submit" value="submit"/>
		</form>
	</body>
<script>
	var dir_length  = <?php echo count($dlc_list); ?>;
	var dlc_list  = <?php echo json_encode($dlc_list); ?>;
	var game_name  = "<?php echo $game_name; ?>";
	console.log(game_name);
	console.log(dlc_list);
	console.log(dir_length);
	var template_game_name = "";
	var template_dlc_list = "";

	template_game_name = '<input type="text" id="game_name" name="game_name" value=\"'+game_name+'\" readonly>';
	for (var i = 2; i < dir_length; i++) 
	{
	  	template_dlc_list = template_dlc_list + '<option value=\"'+dlc_list[i]+'\">'+dlc_list[i]+'</option>';
	}
	$("#game_name").append(template_game_name);
	$("#dlc_list").append(template_dlc_list);
</script>
</html>