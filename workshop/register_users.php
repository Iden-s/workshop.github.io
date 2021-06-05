<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  href="style_register.css" >
	<link rel="stylesheet"  href="bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
	<link rel="icon"  href="icon\game.png" type="image" sizes="16x16">
	<title>Register</title>
</head>
<body class="body">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  	<a class="navbar-brand"><div class="Tab_header_logo white_text">Register</div></a>
	</nav>
	<form class="register_form">
		<pre class="register_form_detail">Please insert username not more than 20 charecters</pre>
		<pre class="register_form_detail">Username                     : <input type="text" id="username" ></pre>
		<pre class="register_form_detail">Please insert password not more than 20 charecters</pre>
		<pre class="register_form_detail">Password                      : <input type="Password" id="password" ></pre>
		<pre class="register_form_detail">Confirm-password              : <input type="Password" id="confirm_password" ></pre>
		<p class="red_text" id="error"></p>
		<input class="confirm_register_btn" type="button" id="confirm_register_btn" value="Confirm"></input>
	</form>
</body>
<script type = "text/javascript">
	$( document ).ready(function() 
    {
		$.get("check_usernames.php", function(data, status)
		{
			try
			{
				var usernames_from_users = JSON.parse(data);
			}
			catch
			{
				var usernames_from_users = "";
			}
			var jsarray = JSON.parse(sessionStorage.getItem("jsArray"));
			console.log(jsarray);
			var email 		=jsarray.email;
			var birthdate 	=jsarray.birthdate;
			var country 	=jsarray.country;
			var sex 		=jsarray.sex;
			document.getElementById('confirm_register_btn').onclick=function() 
			{
				var username=check_username_lenght();
				var password=check_password();
				console.log(username);
				if (username=="this username has been register") 
				{
					document.getElementById('error').innerHTML="This username has been register!!";
		        	return;
				}
				if (username) 
				{
					username=document.getElementById('username').value;
				}
				else
				{
					document.getElementById('error').innerHTML="Username not confirm!!";
		        	return;
				}
				if (password) 
				{
					password=document.getElementById('confirm_password').value;
				}
				else
				{
					document.getElementById('error').innerHTML="Password not confirm!!";
		        	return;
				}
				send_data(email,birthdate,country,sex,username,password);
				window.open("index.html", "_self");	
				alert("Your register was success");
			}
			function check_username_lenght()
			{
		        var username 	= document.getElementById('username').value;
		        var res = username.split("");
		   		if (res.length<=20) 
		   		{
		   			for (var i = 0; i < usernames_from_users.length; i++) 
					{
						if (usernames_from_users[i].usernames==username) 
						{
							return "this username has been register";
						}
					}
		   			return true;
		   			console.log("user_confirm");
		   		}
		   		else
		   		{
		   			return false;
		   			console.log("user_not_confirm");
		   		}
			}
			function check_password()
			{
		        var password 	= document.getElementById('password').value;
		        var confirm_password = document.getElementById('confirm_password').value;
		        var res = confirm_password.split("");
		        if((password==confirm_password)&&password!=""&&confirm_password!=""&&(res.length<=20))
		        {
		        	
		   			return true;
		          	console.log("password_confirm");
		        }
		        else
		        {
		        	return false;
		        	console.log("password_not_confirm");
		        	
		        }
			}
			function send_data(email,birthdate,country,sex,username,password) 
			{
			  	var user_detail 		= {};
			  	user_detail.email 		= email;
			 	user_detail.sex		 	= sex;
			  	user_detail.birthdate 	= birthdate;
			  	user_detail.country 	= country;

			  	var user 				= {};
			  	user.username 			= username;
			 	user.password		 	= password;

				$.ajax({
					url:"insert_data.php",
					method : "post",
					data : {user_detail : JSON.stringify(user_detail),user : JSON.stringify(user)},
					success: function(res)
					{
						console.log(res);
					}
				})
			}
		});
	});
</script>
</html>