<?php
	$dir = "../game_list/";

	$dir_list = scandir($dir);
	echo json_encode($dir_list);
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
	</head>
	<body>
		<h1>CHOOSE GAME</h1>
		<form method="POST" id="form" action="insert_description_form_2.php">
			<label for="game_list">game :</label>
  			<select name="game_list" id="game_list">
  				<option value=""></option>
  			</select>
		<input type="button" value="submit" onclick="select_game_name()" />
		<p id="error" style="visibility: hidden;color: red">PLEASE SELECT GAME!!</p>
		</form>
	</body>
<script>
	var dir_length  = <?php echo count($dir_list); ?>;
	var game_list  = <?php echo json_encode($dir_list); ?>;
	console.log(game_list);
	console.log(dir_length);
	var template_game_list = "";
	for (var i = 2; i < dir_length; i++) 
	{
	  	template_game_list = template_game_list + '<option value=\"'+game_list[i]+'\">'+game_list[i]+'</option>';
	}
	$("#game_list").append(template_game_list);
	function select_game_name()
	{
		var game_name = document.getElementById('game_list').value;
		if (game_name=="") 
		{
			document.getElementById('error').style.visibility = "visible";
		}
		else
		{
			document.getElementById('form').submit();
		}
	}
</script>
</html>