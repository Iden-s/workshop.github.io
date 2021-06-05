<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
</head>
<body>
	<h1>CHOOSE GAME TO UPDATE</h1>
		<form method="POST" id="form" action="update_game_form_2.php">
			<label for="game_list">game :</label>
  			<select name="game_list" id="game_list">
  				<option value=""></option>
  			</select>
		<input type="button" value="submit" onclick="select_game_name()" />
		<p id="error" style="visibility: hidden;color: red">PLEASE SELECT GAME!!</p>
		</form>
</body>
<script>
	//////Start game name//////
	$.post("get_game_name.php",
    {
    })
    .done(function(data)
    {
        try
			{
				var game_name = JSON.parse(data);
			}
			catch
			{
				var game_name = "";
			}
			console.log(game_name[0]["game_names"]);
			var template_game_name = "";
			for (var i = 0; i < game_name.length; i++) 
			{
				template_game_name = "<option value=\"" + game_name[i]["game_names"] + "\">" + game_name[i]["game_names"] + "</option>";

				$("#game_list").append(template_game_name);
			}

    });
	//////End game name//////

	function select_game_name()
	{
		var game_name = document.getElementById('game_list').value;
		console.log(game_name);
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