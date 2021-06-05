<?php
	$game_name 			= $_POST["game_list"];
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
</head>
<body>
	<h1>CHOOSE DLC (OPTIONAL)</h1>
		<form method="POST" id="form" action="update_game_form_3.php">
			<label for="dlc_list">game :</label>
  			<select name="dlc_list" id="dlc_list">
  				<option value=""></option>
  			</select>
		<input type="button" value="submit" onclick="select_dlc()" />
		</form>
</body>
<script>
	var game_name 	= "<?php echo $game_name; ?>";
	console.log(game_name);
	
	//////Start dlc name//////
	$.post("get_dlc_name.php",
    {
    	game_name:game_name
    })
    .done(function(data)
    {
        try
			{
				var dlc_name = JSON.parse(data);
			}
			catch
			{
				var dlc_name = "";
			}
			console.log(dlc_name[0]["dlc_names"]);
			var template_dlc_name = "";
			for (var i = 0; i < dlc_name.length; i++) 
			{
				template_dlc_name = "<option value=\"" + dlc_name[i]["dlc_names"] + "\">" + dlc_name[i]["dlc_names"] + "</option>";

				$("#dlc_list").append(template_dlc_name);
			}

    });
	//////End dlc name//////
	function select_dlc()
	{
		var dlc_name = document.getElementById('dlc_list').value;
		/*console.log(dlc_name);
		console.log(game_name);*/
		if (dlc_name == "") 
		{
			//console.log("good");
			window.location.href='update_game_form_3.php?game_name='+game_name;
		}
		else
		{
			window.location.href='update_game_form_3.php?dlc_name='+dlc_name;
		}
		
	}
</script>
</html>