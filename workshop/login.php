<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  href="style_register.css" >
	<link rel="stylesheet"  href="bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
	<link rel="icon"  href="icon\game.png" type="image" sizes="16x16">
	<title>login</title>
</head>
<body class="body">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  	<a class="navbar-brand"><div class="Tab_header_logo white_text">Login</div></a>
	</nav>
	<form class="register_form">
		<pre class="register_form_detail">Username      : <input type="text" id="username"></pre>
		<pre class="register_form_detail">Password      : <input type="password" id="password" ></pre>
		<p class="red_text" id="error"></p>
		<input class="confirm_register_btn" type="button" id="confirm_register_btn" value="Confirm"></input>
	</form>
</body>
<script type = "text/javascript">
	$( document ).ready(function() 
    {
		$.get("check_usernames_and_passwords.php", function(data, status)
		{
			try
			{
				var data_from_users = JSON.parse(data);
			}
			catch
			{
				var data_from_users = "";
			}
			console.log(data_from_users);
			console.log(data_from_users[0].passwords);
			document.getElementById('confirm_register_btn').onclick=function() 
			{
				var check_username		=check_usernames();
				var check_password 	=check_passwords();
				var username 	= document.getElementById('username').value;

				var d = new Date();
				d.setTime(d.getTime() + (1*24*60*60*1000));
				var expires = "expires=" + d.toUTCString();
		    	if (check_username&&check_password) 
		    	{
		    		document.cookie = "username="+username+";"+expires+";"+"path=/";
		        	window.open("index.html", "_self");	
					alert("Your login was success");
		    	}
		    	else
		    	{
		    		document.getElementById('error').innerHTML="Username or Password not right!!";
		        	return;
		    	}
		    	 
		    	
			}
			function check_usernames()
			{
		        var username 	= document.getElementById('username').value;
		  
		   		for (var i = 0; i < data_from_users.length; i++) 
				{
					if (data_from_users[i].usernames==username) 
					{
						return true;
					}
				}
				return false;

			}
			function check_passwords()
			{
		        var password 	= document.getElementById('password').value;
		  
		   		for (var i = 0; i < data_from_users.length; i++) 
				{
					if (data_from_users[i].passwords==password) 
					{
						return true;
					}
				}
				return false;

			}
		});
	});
</script>
</html>