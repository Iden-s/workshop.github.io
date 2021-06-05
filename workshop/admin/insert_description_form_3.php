<?php
	if (isset($_POST["game_name"])&&isset($_POST["dlc_list"])) 
	{
		$game_name = $_POST["game_name"];
		$dlc = $_POST["dlc_list"];
		if ($dlc !== "") 
		{
			$file_dir = "../game_list/".$game_name."/dlc_list/".$dlc."/";
			$file_list = scandir($file_dir);
			$file_list_number = count($file_list);
			$dir_exist_path = $file_dir."description";	
			if (file_exists($dir_exist_path)) 
			{
		    	$file_description_exist = "true";
			} 
			else 
			{
		   	 	$file_description_exist = "false";
			}
		}
		else
		{
			$file_dir = "../game_list/".$game_name."/";
			$file_list = scandir($file_dir);
			$file_list_number = count($file_list);	
			$dir_exist_path = $file_dir."description";	
			if (file_exists($dir_exist_path)) 
			{
		    	$file_description_exist = "true";
		    	echo $file_description_exist;
			} 
			else 
			{
		   	 	$file_description_exist = "false";
		   	 	echo $file_description_exist;
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="ckeditor/ckeditor.js"></script>
		<script src="ckeditor/config.js"></script>
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
	</head>
	<body>
		<h1>DESCRIPTION</h1>
		<h3 id="file_path">File path : </h3>
		<form method="POST" action="insert_description_form_4.php" id="form">
			<textarea class="ckeditor" name="editor"></textarea>
			<input type="submit" value="SAVE" id="SAVE" name="SAVE" />
			<p id="error" style="color : red;visibility: hidden;">FILE PATH DOES'T RIGHT!!!</p>
		</form>
	</body>
<script>
	var dlc_name = "<?php echo $dlc; ?>";
	var game_name = "<?php echo $game_name; ?>";
	console.log(dlc_name);
	console.log(game_name);
	CKEDITOR.on('instanceReady', function(e) 
	{
    // First time
   		e.editor.document.getBody().setStyle('background-color', 'black');
    // in case the user switches to source and back
	    e.editor.on('contentDom', function() 
	    {
	        e.editor.document.getBody().setStyle('background-color', 'black');
	    });
	});
	CKEDITOR.editorConfig = function( config ) 
	{
		// Define changes to default configuration here. For example:
		// config.language = 'fr';
		// config.uiColor = '#AADC6E';
		config.width = 820;
	};
	CKEDITOR.replace( 'editor', {
    customConfig: '/custom/ckeditor_config.js'
});
	if (dlc_name == "") 
	{
		template_file_path = "game_list/"+game_name+"/description";
	}
	else
	{
		template_file_path = "game_list/"+game_name+"/"+dlc_name+"/description";
	}
	$("#file_path").append(template_file_path);

	var template_game_name = '<input type="hidden" name="game_name" value=\"'+game_name+'\" readonly>';
	var template_dlc_name 	   = '<input type="hidden" name="dlc_name" value=\"'+dlc_name+'\" readonly>';
	$("#form").append(template_game_name);
	$("#form").append(template_dlc_name);

	var file_exists = "<?php echo $file_description_exist; ?>";
	if (file_exists == "true") 
	{
		document.getElementById("SAVE").disabled = false;
		document.getElementById("error").style.visibility = "hidden";
		
	}
	else
	{
		document.getElementById("SAVE").disabled = true;
		document.getElementById("error").style.visibility = "visible";
	}

</script>
</html>