<?php
	if (isset($_POST["game_list"])) 
	{
		$game_name = $_POST["game_list"];
		echo $game_name;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
</head>
<body>
		<h1 style="text-decoration: underline;">Main game part</h1>
		game name : 				<input type="text" id="game_name" name="game_name" value="<?php  echo $game_name; ?>" readonly/><span id="game_name_error" style="visibility:hidden;color:red"> *</span><br/><br/>
		release date(D / M / Y) : 	<input type="text" id="game_release_date" name="game_release_date" ><span id="release_date_main_game_error" style="visibility:hidden;color:red"> *</span><br/><br/>
		developer : 				<input type="text" id="game_developer" name="game_developer" ><span id="game_developer_error" style="visibility:hidden;color:red"> *</span><br/><br/>
		publisher : 				<input type="text" id="game_publisher" name="game_publisher" ><span id="publisher_error" style="visibility:hidden;color:red"> *</span><br/><br/>
		price : 					<input type="text" id="game_price"name="game_price" ><span id="price_error" style="visibility:hidden;color:red"> *</span><br/><br/>
		tag : <br/>
		SELECTING NOT MORE THAN 20 !!
		<table style="width:100%"  id="tags">
		</table>
		<span id="tags_error" style="visibility:hidden;color:red"> *</span>
		<br/><br/>
		<h2>Minimum requirment</h2>
		os : 		    <input type="text" id="minimum_os" name="minimum_os"><br/><br/>
		processor :		<input type="text" id="minimum_processor"   name="minimum_processor"><br/><br/>
		memory : 		<input type="text" id="minimum_memory"  name="minimum_memory"><br/><br/>	
		grapics : 		<input type="text" id="minimum_grapics" style="width:400px" name="minimum_grapics"><br/><br/>	
		storage : 		<input type="text" id="minimum_storage"   name="minimum_storage"><br/><br/>
		addition note :	<textarea id="minimum_addition_note" rows="4" cols="50" name="minimum_addition_note"></textarea>
		<br/><br/>
		<h2>Recommended requirment</h2>
		os : 			<input type="text" id="recommended_os" name="recommended_os"><br/><br/>
		processor :		<input type="text" id="recommended_processor" name="recommended_processor"><br/><br/>
		memory : 		<input type="text" id="recommended_memory"  name="recommended_memory"><br/><br/>	
		grapics : 		<input type="text" id="recommended_grapics"  style="width:400px" name="recommended_grapics"><br/><br/>	
		storage : 		<input type="text" id="recommended_storage"name="recommended_storage"><br/><br/>
		addition note :	<textarea id="recommended_addition_note" rows="4" cols="50" name="recommended_addition_note"></textarea>
		<br/><br/>
		<h2>Thumbnail img</h2>	
		<input type="file" id="thumbnail_image" accept="image/*" name="game_thumbnail_image" ><span id="thumbnail_image_error" style="visibility:hidden;color:red"> *</span><br/><br/>
		<h2>Minor img</h2>
		CAN CHOOSE MORE THAN ONE FILE !!<br/>
  		<input type="file" id="minor_image" accept="image/*" name="game_minor_image" multiple><span id="minor_image_error" style="visibility:hidden;color:red"> *</span><br/><br/>
  		<h2>Description</h2>
  		<input type="file" id="description" accept=".htm" name="description" ><span id="description_error" style="visibility:hidden;color:red"> *</span><br/><br/>
		<button onclick="sendToform3()">Next</button>
</body>
<script type="text/javascript">
	//////Start tags//////
	$.post("get_tags.php",
    {
    })
    .done(function(data)
    {
        try
			{
				var tags = JSON.parse(data);
			}
			catch
			{
				var tags = "";
			}
			console.log(tags);
			var formentted_tags=[];
			for (var i = 0; i < tags.length; i++) 
			{
				formentted_tags[i]=tags[i].tag_name;
			}
			for (var i = 0; i < formentted_tags.length; i++) 
			{
				var res = formentted_tags[i].slice(0,1);
				if (res=res.toLowerCase()) 
				{
					var upper = res.toUpperCase();
					var cap = formentted_tags[i].charAt(0);
					formentted_tags[i] = formentted_tags[i].replace(cap, upper);
				}
			}
			formentted_tags.sort();

			var template_start_table_tags="<tr>";
			var template_end_table_tags="</tr>";
			var template="";	
			for (var i = 0; i < formentted_tags.length; i++) 
			{
				if(i==0)
				{
					template =template+'<tr><td><input type="checkbox" onclick=\"check_checkbox(\''+formentted_tags[i]+'\')\" name="tags" id=\"'+formentted_tags[i]+'\" value=\"'+formentted_tags[i]+'\">\
					<label for=\"'+formentted_tags[i]+'\">'+formentted_tags[i]+'</label></td>';
				}
				else
				{
					template =template+'<td><input type="checkbox" name="tags"  onclick=\"check_checkbox(\''+formentted_tags[i]+'\')\" id=\"'+formentted_tags[i]+'\" value=\"'+formentted_tags[i]+'\">\
					<label for=\"'+formentted_tags[i]+'\">'+formentted_tags[i]+'</label></td>';
				}
				if ((i+1)%6==0) 
				{
					template=template+"</tr>"+"<tr>";
				}
				if (i==formentted_tags.length-1) 
				{
					template=template+"</tr>";
				}
			}
			$("#tags").append(template);
       
    });
	//////End tags//////
	var count_tags_checked=0;
	function check_checkbox(ID)
	{
		var checked = document.getElementById(ID).checked;
		console.log(ID);
		if (checked) 
		{
			count_tags_checked++;
		}
		else
		{
			count_tags_checked--;
		}
		if (count_tags_checked>=20) 
		{
			var tags_length = document.getElementsByName('tags').length;
			for (var i = 0; i < tags_length; i++) 
			{
				var tags_checked = document.getElementsByName('tags')[i].checked;
				if (!tags_checked) 
				{
					var tags_checked_disabled = document.getElementsByName('tags')[i].id;
					document.getElementById(tags_checked_disabled).disabled = true;
				}
			}
		}
		else
		{
			var tags_length = document.getElementsByName('tags').length;
			for (var i = 0; i < tags_length; i++) 
			{
				var tags_checked = document.getElementsByName('tags')[i].checked;
				if (!tags_checked) 
				{
					var tags_checked_disabled = document.getElementsByName('tags')[i].id;
					document.getElementById(tags_checked_disabled).disabled = false;
				}
			}
		}
	}
	function sendToform3()
	{
		var game_name = document.getElementById("game_name").value;
		var game_release_date = document.getElementById("game_release_date").value;
		var game_developer = document.getElementById("game_developer").value;
		var game_publisher = document.getElementById("game_publisher").value;
		var game_price = document.getElementById("game_price").value;
		if (game_name=="") 
		{
			document.getElementById("game_name_error").style.visibility = "visible";
			return;
		}
		else
		{
			document.getElementById("game_name_error").style.visibility = "hidden";
		}
		if (game_release_date==""||!(/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/.test(game_release_date))) 
		{
			document.getElementById("game_release_date").style.visibility = "visible";
			return;
		}
		else
		{
			document.getElementById("game_release_date").style.visibility = "hidden";
		}
		if (game_developer=="") 
		{
			document.getElementById("game_developer_error").style.visibility = "visible";
			return;
		}
		else
		{
			document.getElementById("game_developer_error").style.visibility = "hidden";
		}
		if (game_publisher=="") 
		{
			document.getElementById("publisher_error").style.visibility = "visible";
			return;
		}
		else
		{
			document.getElementById("publisher_error").style.visibility = "hidden";
		}
		if (game_price==""||!(/^[0-9]{1,}\.{0,1}[0-9]{1,}$/.test(game_price))) 
		{
			document.getElementById("price_error").style.visibility = "visible";
			return;
		}
		else
		{
			document.getElementById("price_error").style.visibility = "hidden";
		}
		var tags = document.getElementsByName('tags');
		var tags_name = [];
		for (var i = 0; i < tags.length; i++) 
		{
			if (tags[i].checked) 
			{
				tags_name.push(document.getElementsByName('tags')[i].id);
			}
		}
		if (tags_name.length === 0) 
		{
			document.getElementById("tags_error").style.visibility = "visible";
			return;
		}
		else
		{
			document.getElementById("tags_error").style.visibility = "hidden";
		}
		var minimum_os = document.getElementById("minimum_os").value;
		var minimum_processor = document.getElementById("minimum_processor").value;
		var minimum_memory = document.getElementById("minimum_memory").value;
		var minimum_grapics = document.getElementById("minimum_grapics").value;
		var minimum_storage = document.getElementById("minimum_storage").value;
		var minimum_addition_note = document.getElementById("minimum_addition_note").value;

		var recommended_os = document.getElementById("recommended_os").value;
		var recommended_processor = document.getElementById("recommended_processor").value;
		var recommended_memory = document.getElementById("recommended_memory").value;
		var recommended_grapics = document.getElementById("recommended_grapics").value;
		var recommended_storage = document.getElementById("recommended_storage").value;
		var recommended_addition_note = document.getElementById("recommended_addition_note").value;

		var thumbnail_img = document.getElementById("thumbnail_image").value;
		var startIndex = "";
		var thumbnail_filename = "";
		console.log(thumbnail_img);
		if (thumbnail_img) 
		{
			document.getElementById("thumbnail_image_error").style.visibility = "hidden";
		    startIndex = (thumbnail_img.indexOf('\\') >= 0 ? thumbnail_img.lastIndexOf('\\') : thumbnail_img.lastIndexOf('/'));
		    thumbnail_filename = thumbnail_img.substring(startIndex);
		    if (thumbnail_filename.indexOf('\\') === 0 || thumbnail_filename.indexOf('/') === 0) 
		    {
		        thumbnail_filename = thumbnail_filename.substring(1);
		    }

		}
		else
		{
			document.getElementById("thumbnail_image_error").style.visibility = "visible";
			return;
		}
		var minor_image = document.getElementById("minor_image");
		var minor_image_filename=[];
		if (minor_image.files.length > 0) 
		{
			document.getElementById("minor_image_error").style.visibility = "hidden";
			for (var i = 0; i < minor_image.files.length ; i++) 
			{

            	minor_image_filename[i] = minor_image.files.item(i).name;      
            }
		}
		else
		{
			document.getElementById("minor_image_error").style.visibility = "visible";
			return;
		}
		var description = document.getElementById("description").value;
		var startIndex = "";
		var description_filename = "";
		console.log(description);
		if (description) 
		{
			document.getElementById("description_error").style.visibility = "hidden";
		    startIndex = (description.indexOf('\\') >= 0 ? description.lastIndexOf('\\') : description.lastIndexOf('/'));
		    description_filename = description.substring(startIndex);
		    if (description_filename.indexOf('\\') === 0 || description_filename.indexOf('/') === 0) 
		    {
		        description_filename = description_filename.substring(1);
		    }

		}
		else
		{
			document.getElementById("description_error").style.visibility = "visible";
			return;
		}
		var obj = {game_name: game_name, game_release_date:game_release_date, game_developer: game_developer, game_publisher:game_publisher, game_price:game_price, 
			tags_name:tags_name, 
			minimum_os:minimum_os, 
			minimum_processor:minimum_processor, 
			minimum_memory:minimum_memory, 
			minimum_grapics:minimum_grapics, 
			minimum_storage:minimum_storage,
			minimum_addition_note:minimum_addition_note,
			recommended_os:recommended_os, 
			recommended_processor:recommended_processor, 
			recommended_memory:recommended_memory, 
			recommended_grapics:recommended_grapics, 
			recommended_storage:recommended_storage,
			recommended_addition_note:recommended_addition_note,
			thumbnail_filename:thumbnail_filename,
			minor_image_filename:minor_image_filename,
			description_filename:description_filename};
			var detail = encodeURIComponent(JSON.stringify(obj));
		window.location.href='insert_game_form_3.php?detail='+detail;
		
		
	}
	
	
</script>
</html>