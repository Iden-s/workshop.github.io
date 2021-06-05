<?php
	$detail 		= $_GET["detail"];
	$detail 		= json_decode($detail, true);
	$game_name 		= $detail["game_name"];
	$dlc_dir 		= "../game_list/".$game_name."/dlc_list/";
	$dlc_list 		= scandir($dlc_dir);
	print_r($dlc_list);
	echo $game_name;
	echo $detail["game_name"];
	print_r($detail["minor_image_filename"]);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
</head>
<body>
	<h1 style="text-decoration: underline;">DLC part</h1>
  		<ol id="dlc_list">
		</ol>
	<p id="error" style="color: red;visibility: hidden;">SOMETHING WRONG!!</p>
	<button onclick="sendToform4()">Next</button>
</body>
<script >
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const detail = urlParams.get('detail');
	console.log(detail);
	var dlc_list  = <?php echo json_encode($dlc_list); ?>;
	console.log(dlc_list);
	var dlc_number=1;
	var template_dlc_list = "";
	for (var i = 2 ; i < dlc_list.length ;i++) 
	{
		template_dlc_list = template_dlc_list +'<li>\
	 		dlc name : <input type="text" id=\"dlc_name_'+dlc_number+'\"  name="dlc_name" value =\"'+dlc_list[i]+'\" readonly><br/><br/>\
			release date(D / M / Y) : <input type="text"  id=\"release_date_dlc_'+dlc_number+'\"  name="dlc_release_date"><br/><br/>\
			price : <input type="text" id=\"price_dlc_'+dlc_number+'\" name="dlc_price" ><br/><br/>\
			img : <br/>\
			CAN CHOOSE MORE THAN ONR FILE !!<br/><br/>\
	  		<input type="file" id=\"dlc_image_'+dlc_number+'\" accept="image/*" name="dlc_image" multiple><br/><br/>\
	  		description : <br/>\
	  		<input type="file" id=\"description_dlc_'+dlc_number+'\" accept=".htm" name="dlc_description"><br/><br/>\
			</li>';
		dlc_number++;
	}
	$("#dlc_list").append(template_dlc_list);
	function sendToform4()
	{
		var dlc_name = document.getElementsByName("dlc_name");
		var dlc_release_date = document.getElementsByName("dlc_release_date");
		var dlc_price = document.getElementsByName("dlc_price");
		var dlc_image = document.getElementsByName("dlc_image");
		var description = document.getElementsByName("dlc_description");
		if (dlc_name.length == 0) 
		{
			window.location.href='insert_game_form_4.php?detail='+detail;
		}
		console.log(dlc_name);
		console.log(dlc_release_date);
		console.log(dlc_price);
		console.log(dlc_image);

		console.log(dlc_name.length);
		console.log(dlc_release_date.length);
		console.log(dlc_price.length);
		console.log(dlc_image.length);

		console.log(dlc_name[0].value);
		console.log(dlc_release_date[0].value);
		console.log(dlc_price[0].value);
		console.log(dlc_image[0].value);

		console.log(dlc_image[0].files.length);

		console.log(description);
		console.log(description.length);

		if (dlc_name.length!=dlc_release_date.length||
			dlc_name.length!=dlc_price.length||
			dlc_name.length!=dlc_image.length||
			dlc_name.length!=description.length||
			dlc_release_date.length!=dlc_price.length||
			dlc_release_date.length!=dlc_image.length||
			dlc_release_date.length!=description.length||
			dlc_price.length!=dlc_image.length||
			dlc_price.length!=description.length||
			description.length!=dlc_image.length) 
		{
			document.getElementById("error").style.visibility = "visible";
			return;
		}
		for (var i = 0; i < dlc_name.length; i++) 
		{
			if (!(/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/.test(dlc_release_date[i].value))) 
			{
				document.getElementById("error").style.visibility = "visible";
				return;
			}
			else
			{
				document.getElementById("error").style.visibility = "hidden";
			}
			if (!(/^[0-9]{1,}\.{0,1}[0-9]{1,}$/.test(dlc_price[i].value)))
			{
				document.getElementById("error").style.visibility = "visible";
				return;
			}
			else
			{
				document.getElementById("error").style.visibility = "hidden";
			}
		}
		var dlc_name_all = [];
		for (var i = 0; i < dlc_name.length; i++) 
		{
			dlc_name_all[i] = dlc_name[i].value;
		}
		var dlc_release_date_all = [];
		for (var i = 0; i < dlc_release_date.length; i++) 
		{
			dlc_release_date_all[i] = dlc_release_date[i].value;
		}
		var dlc_price_all = [];
		for (var i = 0; i < dlc_price.length; i++) 
		{
			dlc_price_all[i] = dlc_price[i].value;
		}
		var dlc_image_each_dlc = [];
		var dlc_image_all = [];
		for (var i = 0; i < dlc_image.length; i++) 
		{
			for (var j = 0; j <dlc_image[i].files.length; j++) 
			{
				dlc_image_each_dlc.push(dlc_image[i].files.item(j).name);
			}
			dlc_image_all[i] = dlc_image_each_dlc;
			console.log(dlc_image_all);
			dlc_image_each_dlc=[];
		}
		var dlc_description_all = [];
		for (var i = 0; i < description.length; i++) 
		{
			if (description[i].files.length == 0) 
			{
				document.getElementById("error").style.visibility = "visible";
				return;
			}
			for (var j = 0; j <description[i].files.length; j++) 
			{
				dlc_description_all[i] = description[i].files.item(j).name;
			}
		}
		var obj = {
			dlc_name_all:dlc_name_all, 
			dlc_release_date_all:dlc_release_date_all, 
			dlc_price_all:dlc_price_all, 
			dlc_image_all:dlc_image_all,
			dlc_description_all:dlc_description_all};
			console.log(dlc);
		var dlc = encodeURIComponent(JSON.stringify(obj));
		window.location.href='insert_game_form_4.php?detail='+detail+'&dlc='+dlc;
	}
</script>
</html>