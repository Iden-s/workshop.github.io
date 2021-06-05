<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  href="style_game_site_gen.css">
	<link rel="stylesheet"  href="../bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="../jquery-3.5.1.js"></script>
	<link rel="icon"  href="..\icon\game.png" type="image" sizes="16x16">
	<title id="title"></title>
</head>
<body class="body">
	<div class="popupBackground" id="popupBackground">
		<div class="popup">
			<div style="text-align: right;">
				<button class="exit_popup_btn" onclick="close_popup_tags()">x</button>
			</div>
			<div>
				<div class="tag_list_container" id="tag_list_container">
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  	<a class="navbar-brand">
	  		<div class="Tab_header_logo white_text" id="Tab_header_logo"></div>
	  	</a>
	  	<div class="position_button" id="current_username"> 	
		    </div>
	</nav>
	<div class="game_site_container_detail">
		<div class="game_site_show_big_image" id="game_site_show_big_image">
			
		</div>
		<div class="game_site_show_small_image_container">
			<button class="game_site_show_small_image_slide_to_left_btn" onclick="to_left_small_image()">&#x025C2;</button>
			<div id="minor_images_container" class="minor_images_container">
			</div>
			<button class="game_site_show_small_image_slide_to_right_btn" onclick="to_right_small_image()">&#x025B8;</button>
		</div>
		<div id="game_site_show_thumbnail_image_container">	
		</div>
		<div id="game_site_show_game_detail_container" class="game_site_show_game_detail">
		</div>
	</div>
	<div class="add_cart_btn_container" id="add_cart_btn_container">
		<button class="add_cart_btn">Add to cart</button>
	</div>
	<div class="game_site_content_and_description_and_requirement_container">
		<div class="game_site_left_container">
			<p class="game_site_headline">CONTENT FOR THIS GAME</p> <hr style="background-color: white;width:60%;text-align:left;margin-left:0">
			<div class="game_site_content_container" id="game_site_content_container">			
			</div>
			<p class="game_site_headline">ABOUT THIS GAME</p> <hr style="background-color: white;width:60%;text-align:left;margin-left:0">
			<div class="game_site_description" id="game_site_description">
			</div>
		</div>
		<div class="game_site_right_container">
			<p class="game_site_headline" style="margin-left: 20px">MINIMUM REQUIRMENT</p> <hr style="background-color: white;width:70%;text-align:left;margin-left:0;margin-left: 20px">
			<div class="game_site_right_minimum_requirment" id="game_site_right_minimum_requirment">
			</div>
			<p class="game_site_headline" style="margin-left: 20px">RECOMMENED REQUIRMENT</p> <hr style="background-color: white;width:70%;text-align:left;margin-left:0;margin-left: 20px">
			<div class="game_site_right_recommended_requirment" id="game_site_right_recommended_requirment">

			</div>
		</div>

	</div>

</body>
<script type="text/javascript">
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const game_name = urlParams.get('game_name');
	console.log(game_name);
	document.getElementById("title").innerHTML=game_name;
	document.getElementById("Tab_header_logo").innerHTML=game_name;
	////Start about cookies////
	var name 		= "username" + "=";
	var username 	= "";
	var decodedCookie = decodeURIComponent(document.cookie);
	//console.log(decodedCookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i < ca.length; i++) 
	{
	 	var c = ca[i];
	    while (c.charAt(0) == ' ') 
	    {
	      c = c.substring(1);
	    }
	    if (c.indexOf(name) == 0) 
	    {
	      username=c.substring(name.length, c.length);
	      console.log(username);
	    }
	}
	////End about cookies////

	////Start username change////
	if (username=="") 
	{
		var template = '<button type="button" class="btn btn-primary" onclick="window.location.href=\'../register.php\';">Register</button><button type="button" class="btn btn-outline-light" onclick="window.location.href=\'../login.php\';">login</button>';
		$("#current_username").append(template);
	}
	else
	{
		
		var template = '<div class="dropdown_username">\
							<button type="button" class="btn btn-outline-light" id="username">'+username+"&dtrif;"+'</button>\
							<div class="dropdown-content_username">\
								<button  onclick="delete_cookie()">Logout</button>\
		  					</div>\
						</div>';
		$("#current_username").append(template);
	}
	////End username change////

	////Start minor image////
    $.post("get_column_image_specific_game.php",
    {
        current_game_name:game_name
    })
    .done(function(data)
    {
         try
				{
					var minor_image = JSON.parse(data);
				}
				catch
				{
					var minor_image = "";
				}
				
				var template_four_minor_image = "";
				var template_big_image = "";
				var highest_number_minor_images_show = 4;
				template_big_image = '<img src="../game_list\\'+game_name+'\\minor_images\\'+minor_image[0]['minor_images_name']+'"class="game_site_show_big_image"/ id="big_image">';
				$("#game_site_show_big_image").append(template_big_image);
				for (var i = 0; i < minor_image.length; i++) 
				{
					if (i < highest_number_minor_images_show) 
					{
						template_four_minor_image = template_four_minor_image +'<img src="../game_list\\'+game_name+'\\minor_images\\'+minor_image[i]['minor_images_name']+'" class="game_site_show_small_image" name="minor_image" id="minor_image_'+i+'"; onclick="show_small_image_to_big_image(\''+minor_image[i]['minor_images_name']+'\')"/>';
					}
					else
					{
						template_four_minor_image = template_four_minor_image +'<img src="../game_list\\'+game_name+'\\minor_images\\'+minor_image[i]['minor_images_name']+'"  class="game_site_show_small_image_hidden" name="minor_image" id="minor_image_'+i+'"; onclick="show_small_image_to_big_image(\''+minor_image[i]['minor_images_name']+'\')"/>';
					}
				}
				$("#minor_images_container").append(template_four_minor_image);         
    });
	////End minor image////

	////Start thumnail image////
    $.post("get_column_thumbnail_image_specific_game.php",
    {
        current_game_name:game_name
    })
    .done(function(data)
    {
         try
				{
					var thumnail_image = JSON.parse(data);
				}
				catch
				{
					var thumnail_image = "";
				}
				var show_thumnail_image = thumnail_image[0]['image_name'];
				var template_thumnail_image = "";
			
				template_thumnail_image = '<img src=\"../game_list\\'+game_name+'\\thumb_nail\\'+show_thumnail_image+'\"class=\"game_site_show_thumbnail_image\" \
				id=\"thumnail_image\">';
				$("#game_site_show_thumbnail_image_container").append(template_thumnail_image);      
    });
	////End thumnail image////

	////Start game detail////
    $.post("get_column_game_detail_specific_game.php",
    {
        current_game_name:game_name
    })
    .done(function(data)
    {
        try
			{
				var game_detail = JSON.parse(data);
			}
			catch
			{
				var game_detail = "";
			}
			//console.log(game_detail);
		var template_game_list = '<p style="color:white;"><span style="color:#3366ff">\
								Release date </span> : '+game_detail[0]['release_date']+'</p><br>\
								<p style="color:white;"><span style="color:#3366ff">Developers </span> : '+game_detail[0]['developers']+'</p>\
								<p style="color:white;"><span style="color:#3366ff">\
								Publishers </span> : '+game_detail[0]['publishers']+'</p><br>\
								<p style="color:white;"><span style="color:#3366ff">Tags </span> : </p>';
		var template_tags_container = '<div class="small_tags_detail_container" >'
		var template_show_tags = "";
		var template_div_end = '</div>';
		console.log(game_detail);
		console.log(game_detail.length);
		if (game_detail.length<5) 
		{
			var highest_number_of_tags_show = game_detail.length;
		}
		else
		{
			var highest_number_of_tags_show = 5;
		}
		for (var i = 0; i < highest_number_of_tags_show; i++) 
		{
			template_show_tags = template_show_tags+'<div class="small_tags_detail">'+game_detail[i]["tag_name"]+'</div>';
		}
		var all_tags_this_game = [];
		for (var i = 0; i < game_detail.length; i++) 
		{
			all_tags_this_game.push(game_detail[i]["tag_name"]);
		}
		var template_plus_btn ='<button class="show_all_tags_btn" onclick="show_popup_tags(\''+all_tags_this_game+'\')">+</button>';
		template_show_tags = template_show_tags+template_plus_btn;
		var template_formatted_tags = template_tags_container+template_show_tags+template_div_end;
		var all_game_detail =  template_game_list+template_formatted_tags;
		$("#game_site_show_game_detail_container").append(all_game_detail);
    });
	////End game detail////

	///Start game price////
    $.post("get_column_price_specific_game.php",
    {
        current_game_name:game_name
    })
    .done(function(data)
    {
        try
			{
				var price = JSON.parse(data);
			}
			catch
			{
				var price = "";
			}
			//console.log(price);
			var template_show_tags = '<div class="current_state_price">&#x0E3F '+price[0]['price']+'</div>'
			$("#add_cart_btn_container").append(template_show_tags);
    });
	////End game price////

	///Start dlc////
    $.post("get_column_dlc_specific_game.php",
    {
        current_game_name:game_name
    })
    .done(function(data)
    {
        try
			{
				var dlc = JSON.parse(data);
			}
			catch
			{
				var dlc = "";
			}
			//console.log(dlc);
			var template_content ="";
			for (var i = 0; i < dlc.length; i++) 
			{
				template_content = template_content+'<div class="game_site_content" onclick="go_to_dlc_site(\''+dlc[i]["game_names"]+'\',\''+dlc[i]["dlc_names"]+'\')"><div class="dlc_name">'+dlc[i]["game_names"]+" : "+dlc[i]["dlc_names"]+'</div><div class="dlc_price">&#x0E3F '+dlc[i]["dlc_price"]+'</div></div> ';
			}
			$("#game_site_content_container").append(template_content);
    });
	////End dlc////

	///Start description////
    $.post("get_column_description_specific_game.php",
    {
        current_game_name:game_name
    })
    .done(function(data)
    {
        try
			{
				var description = JSON.parse(data);
			}
			catch
			{
				var description = "";
			}
			/*console.log(description);
			console.log(description[0]["game_names"]);
			console.log(description[0]["description_name"]);*/
			template_description = '<iframe src=\"../game_list/'+description[0]["game_names"]+'/description/'+description[0]["description_name"]+'\" class="game_site_description"></iframe>';
			$("#game_site_description").append(template_description);
    });
	////End description////

	///Start minimum requirment////
    $.post("get_column_minimum_requirment_specific_game.php",
    {
        current_game_name:game_name
    })
    .done(function(data)
    {
        try
			{
				var minimum_requirment = JSON.parse(data);
			}
			catch
			{
				var minimum_requirment = "";
			}
			console.log(minimum_requirment);
			var template_minimum_requirment ="";
			for (var i = 0; i < minimum_requirment.length; i++) 
			{
				template_minimum_requirment = template_minimum_requirment+'\
				<p style="color: white"><span style="color: #3366ff">os</span> : '+minimum_requirment[i]["os"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">processor</span> : '+minimum_requirment[i]["processor"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">memory</span> : '+minimum_requirment[i]["memory"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">grapics</span> : '+minimum_requirment[i]["grapics"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">storage</span> : '+minimum_requirment[i]["storage"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">addition_note</span> : '+minimum_requirment[i]["addition_note"]+'</p>';
			}
			$("#game_site_right_minimum_requirment").append(template_minimum_requirment);
    });
	////End minimum requirment////

	///Start recommend requirment////
    $.post("get_column_recommend_requirment_specific_game.php",
    {
        current_game_name:game_name
    })
    .done(function(data)
    {
        try
			{
				var recommend_requirment = JSON.parse(data);
			}
			catch
			{
				var recommend_requirment = "";
			}
			console.log(recommend_requirment);
			var template_recommend_requirment ="";
			for (var i = 0; i < recommend_requirment.length; i++) 
			{
				template_recommend_requirment = template_recommend_requirment+'\
				<p style="color: white"><span style="color: #3366ff">os</span> : '+recommend_requirment[i]["os"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">processor</span> : '+recommend_requirment[i]["processor"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">memory</span> : '+recommend_requirment[i]["memory"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">grapics</span> : '+recommend_requirment[i]["grapics"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">storage</span> : '+recommend_requirment[i]["storage"]+'</p>\
				<p style="color: white"><span style="color: #3366ff">addition_note</span> : '+recommend_requirment[i]["addition_note"]+'</p>';
			}
			$("#game_site_right_recommended_requirment").append(template_recommend_requirment);
    });
	////End recommend requirment////

	function delete_cookie()
	{
		document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
		window.open("../index.html", "_self");	
	}
	function show_small_image_to_big_image(minor_image)
	{
		var current_big_image = document.getElementById("big_image");
  		current_big_image.remove();
  		template = '<img src="../game_list\\'+game_name+'\\minor_images\\'+minor_image+'" class="game_site_show_big_image"/ id="big_image">'
  		$("#game_site_show_big_image").append(template);
	}
	function to_right_small_image()
	{
		var class_minor_image =[];
		var first_minor_image_show="";
		var minor_image = document.getElementsByName("minor_image");
		for (var i = 0; i < minor_image.length; i++) 
		{
			class_minor_image[i] = document.getElementsByName("minor_image")[i].className;
			if (class_minor_image[i]=="game_site_show_small_image"&&first_minor_image_show==="") 
			{
				first_minor_image_show = i;
				//console.log(first_minor_image_show);
			}
			if (class_minor_image[i]=="game_site_show_small_image_hidden"&&first_minor_image_show!=="") 
			{
  				document.getElementsByName("minor_image")[first_minor_image_show].className = "game_site_show_small_image_hidden";
				document.getElementsByName("minor_image")[i].className = "game_site_show_small_image";
				break;
			}
		}
	}
	function to_left_small_image()
	{
		var class_minor_image =[];
		var t ;
		var last_minor_image_hidden="";
		var last_minor_image_show="";
		var minor_image = document.getElementsByName("minor_image");
		for (var i = 0; i < minor_image.length ; i++) 
		{
			class_minor_image[i] = document.getElementsByName("minor_image")[i].className;
		}
		//console.log(class_minor_image);
		//console.log(class_minor_image[1]);
		for (var i = 0; i < minor_image.length ; i++) 
		{
			if (class_minor_image[i]=="game_site_show_small_image_hidden") 
			{
				last_minor_image_hidden = i;
				
			}
			else
			{
				last_minor_image_show = i;
				if ((class_minor_image[i+1]=="game_site_show_small_image_hidden"||class_minor_image[i+1]==null)&&last_minor_image_hidden!=="") 
				{
					console.log(1);
					document.getElementsByName("minor_image")[last_minor_image_hidden].className = "game_site_show_small_image";
					document.getElementsByName("minor_image")[i].className = "game_site_show_small_image_hidden";
					break;
				}
			}
		}
	}
	function show_popup_tags(tags)
	{

		var template_show_popup_tags = "";
		var tags_to_array = tags.split(",");
		for (var i = 0; i < tags_to_array.length; i++) 
		{
			template_show_popup_tags = template_show_popup_tags+'<div class="tag_list_column">'			+tags_to_array[i]+'</div>'
		}
		document.getElementById("popupBackground").style.visibility = 'visible';
		$("#tag_list_container").append(template_show_popup_tags);
	}
	function close_popup_tags()
	{
		 $(".tag_list_column").remove();
		document.getElementById("popupBackground").style.visibility = 'hidden';	
	}
	function go_to_dlc_site($game_name,$dlc_name)
	{
		 //console.log($game_name);
		 //console.log($dlc_name);
		 window.location.href='../dlc_site/dlc_site_gen.php?game_name='+$game_name+'&'+'dlc_name='+$dlc_name
	}
	</script>
</html>