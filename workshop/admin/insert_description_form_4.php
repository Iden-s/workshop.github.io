<?php  
if (isset($_POST["game_name"])&&isset($_POST["dlc_name"])&&isset($_POST["editor"])) 
{
	$game_name = $_POST["game_name"];
	$dlc_name = $_POST["dlc_name"];
	$text = $_POST["editor"];
	if ($dlc_name !== "") 
	{
		$file_path_to_create = "../game_list/".$game_name."/dlc_list/".$dlc_name."/description/";
		$myfile = fopen($file_path_to_create.$dlc_name."_description.htm", "w") or die("Unable to open file!");
		fwrite($myfile,$text);
	}
	else
	{
		$file_path_to_create = "../game_list/".$game_name."/description/";
		$myfile = fopen($file_path_to_create.$game_name."_description.htm", "w" ) or die("Unable to open file!");
		fwrite($myfile,$text);
	}
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
	<button id="back_to_manu_btn" onclick="back_to_manu()">Back to manu</button>
	<button id="add_another_description_btn" onclick="add_another_description()">Add another description</button>
</body>
<script>
	alert("File is create!!!");
	function back_to_manu()
	{
		window.open("index.php", "_self");	
	}
	function add_another_description()
	{
		window.open("insert_description_form_1.php", "_self");	
	}
</script>
</html>