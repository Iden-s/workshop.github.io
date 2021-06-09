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
		<input class="confirm_register_btn" type="button" id="confirm_register_btn" value="Confirm" onclick="check()"></input>
	</form>
</body>
<script type = "text/javascript">
	function check()
	{
		var username 	=	document.getElementById('username').value;
		var password  	=	document.getElementById('password').value;
        $.post("check_usernames_and_passwords.php",
    	{
    		username:username , password:password
    	})
    	.done(function(data)
    	{
			try
			{
				var data_from_users = JSON.parse(data);

			}
			catch
			{
				var data_from_users = "";
			}
			console.log(data_from_users.length);
				var check_username ;
				if (data_from_users.length != 0) 
				{
					check_username = true;
					check_password = true;
					console.log("true");
				}
				else
				{
					check_username = false;
					check_password = false;
					console.log("false");
				}
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
			
	});

	}

</script>
</html>