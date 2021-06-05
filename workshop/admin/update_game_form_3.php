<?php
	if (isset($_GET["game_name"])) 
	{
		$game_name 	= $_GET["game_name"];
		$dlc_name 	= null;
		echo $game_name ;
	}
	else
	{
		$dlc_name 	= $_GET["dlc_name"];
		$game_name 	= null ;
		echo $dlc_name ;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
</head>
<body>
	<div id="detail">
		
	</div>
</body>
<script>
	var game_name 	= "<?php echo $game_name; ?>";
	var dlc_name 	= "<?php echo $dlc_name; ?>";
	console.log(game_name);
	console.log(dlc_name);

	//////Start dlc name//////
	if (game_name != "") 
	{
		$.post("get_game_detail_for_update.php",
    	{
    		game_name:game_name 
    	})
    	.done(function(data)
    	{
        try
		{
			var detail = JSON.parse(data);
		}
		catch
		{
			var detail = "";
		}
		console.log(detail);
    	});
	}
	else
	{
		$.post("get_dlc_detail_for_update.php",
    	{
    		dlc_name:dlc_name
    	})
    	.done(function(data)
    	{
	        try
			{
				var detail = JSON.parse(data);
			}
			catch
			{
				var detail = "";
			}
			console.log(detail);
			console.log(detail.length);
			var template_dlc_detail_final = "" ;
			var template_dlc_detail = '<h1>UPDATE DLC</h1>\
			<label for="dlc_name">dlc name : </label><input type="text" id="dlc_name" name="dlc_name" value=\"'+detail[0]["dlc_names"]+'\"><br><br>\
			<label for="release_date_dlc">release date(D / M / Y)  : </label><input type="text" id="release_date_dlc" name="release_date_dlc" value=\"'+detail[0]["dlc_release_date"]+'\"><br><br>\
			<label for="dlc_price">price : </label><input type="text" id="dlc_price" name="dlc_price" value=\"'+detail[0]["dlc_price"]+'\"><br><br>\
			';

			var template_dlc_detail_error			= '<span id="error" style="visibility:hidden;color:red"> *** SOMETHING WRONG *** </span><br><br>';
			var template_dlc_detail_end			= '<button onclick = "confirm_dlc_update()">confirm</button> <button onclick = "back_to_menu()">back to menu</button>';
			
			template_dlc_detail_final = template_dlc_detail + template_dlc_detail_error + template_dlc_detail_end ;
			$("#detail").append(template_dlc_detail_final);
    	});
	}
	//////End dlc name//////

	function confirm_dlc_update()
	{
		var dlc_name_old 	= "<?php echo $dlc_name; ?>";
		console.log(dlc_name_old);
		var	dlc_name 				=  document.getElementById('dlc_name').value;
		console.log(dlc_name);
		var	release_date_dlc 		=  document.getElementById('release_date_dlc').value;
		console.log(release_date_dlc);
		var	dlc_price 				=  document.getElementById('dlc_price').value;
		console.log(dlc_price);
		var dlc_image 				= document.getElementById("dlc_image");
		var dlc_image_filename=[];
		if (dlc_name == "" || release_date_dlc == "" || dlc_price == "" )
		{ 
			document.getElementById("error").style.visibility = "visible";
			return;
		}
		else
		{
			document.getElementById("error").style.visibility= "hidden";
		}

		var dlc 											= {};
		dlc.dlc_name_old									= dlc_name_old;
		dlc.dlc_name 										= dlc_name;
		dlc.release_date_dlc		 						= release_date_dlc;
		dlc.dlc_price 										= dlc_price;
		dlc.dlc_image_filename 								= dlc_image_filename;

		$.ajax({
		url:"update_dlc.php",
		method : "post",
		data : {dlc : JSON.stringify(dlc)},
			success: function(res)
		{
			console.log(res+"<br/>");
		}
		})
		window.location.href='index.php';
	}
	function back_to_menu()
	{
		window.location.href='index.php';
	}
</script>
</html>