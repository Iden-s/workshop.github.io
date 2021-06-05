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
		<pre class="register_form_detail">Email                     : <input type="email" id="email"></pre>
		<pre class="register_form_detail">Confirm - email      : <input type="email" id="confirm_email" ></pre>
		<pre class="register_form_detail">Sex                        : <input type="radio" id="male"  checked="checked" name="gender" value="male">  male    <input type="radio" id="female" name="gender" value="female">  female</pre>
			
		<pre class="register_form_detail">Birthdate                : <input type="date" id="birthdate"></pre></div>
		<pre class="register_form_detail">Country                  : <select  id="country">
			  	<option value="none">None</option>
				</select></pre>
		<p class="red_text" id="error"></p>
		<input class="confirm_register_btn" type="button" id="confirm_register_btn" value="Confirm"></input>
	</form>
</body>
<script type = "text/javascript">
	var country = ["Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina",
	"Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus",
	"Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei",
	"Bulgaria","Burkina Faso","Burundi","Côte d'Ivoire","Cabo Verde","Cambodia","Cameroon",
	"Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo(Congo-Brazzaville)","Costa Rica","Croatia","Cuba","Cyprus",
		"Czechia(Czech Republic)","Democratic Republic of the Congo","Denmark","Djibouti","Dominica",
		"Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia",
		"Eswatini (fmr.\"Swaziland\")","Ethiopia",	"Fiji","Finland","France","Gabon","Gambia","Georgia",
		"Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti",
		"Holy See","Honduras","Hungary","Iceland","India",
		"Indonesia","Iran",	"Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya",
		"Kiribati","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein",
		"Lithuania","Luxembourg","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands",
		"Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Morocco",
		"Mozambique","Myanmar(formerly Burma)","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua",
		"Niger","Nigeria","North Korea","North Macedonia","Norway","Oman","Pakistan","Palau","Palestine State",
		"Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia",
		"Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent and the Grenadines","Samoa","San Marin",
		"Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore",
		"Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain",
		"Sri Lanka","Sudan","Suriname",	"Sweden","Switzerland","Syria","Tajikistan","Tanzania","Thailand",
		"Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda",
		"Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu",
		"Venezuela","Vietnam","Yemen","Zambia","Zimbabwe"];
	country.sort();
	var country_template="";
	for (var i = 0; i < country.length; i++) 
	{
		country_template=country_template+"<option value='"+country[i]+"'>"+country[i]+"</option>";
	}
	$("#country").append(country_template);

	$( document ).ready(function() 
    {
		$.get("check_email.php", function(data, status)
		{
			try
			{
				var email_from_user_detail = JSON.parse(data);
			}
			catch
			{
				var email_from_user_detail = "";
			}
			function check_mail()
			{
		        var email 	= document.getElementById('email').value;
		        var confirm_email = document.getElementById('confirm_email').value;

				var regex = RegExp(/\S{1,}@\w{1,}\.{1}\S{1,}/);
				var pattern = confirm_email.match(regex);
				if ((email==confirm_email)&&email!=""&&confirm_email!=""&&(pattern==confirm_email)) 
		        {
		        	for (var i = 0; i < email_from_user_detail.length; i++) 
					{
						if (email_from_user_detail[i].email==confirm_email) 
						{
							return "mail has been register";
						}
					}		       
		        	return confirm_email;
		          	console.log("mail_confirm");
		        }
		        else
		        {
		        	return "mail not confirm";
		        	console.log("mail_not_confirm");
		        	
		        }
			}
			function check_sex()
			{
				var male = document.getElementById('male').checked;
				var female = document.getElementById('female').checked;
		        if(male)
		        {
		        	return "male";
		        }
		        else
		        {
					return "female";
		        }
			}
			function check_birthdate()
			{
		        var date=document.getElementById('birthdate').value;
		        var date_today 		=new Date();
		        var date_today_year	=date_today.getFullYear();
		        var date_today_month=date_today.getMonth()+1;
		        var date_today_day	=date_today.getDate();
		        var date_today_formatted =date_today_year+"-"+date_today_month+"-"+date_today_day;
		        var date_choosed = date.split("-");

		        if (date_choosed[0]<date_today_year&&date!="") 
		        {
		        	return date;
		        	console.log(date);
		        }
		        else
		        {
		        	return "date not confirm";
		        }
			}
			function check_country()
			{
		        var country=document.getElementById('country').value;
		        console.log(country);
		        if (country != "none") 
		        {
		        	return country;
		        }
		        else
		        {
		        	return "country not confirm";
		        }
			}
			document.getElementById('confirm_register_btn').onclick=function() 
			{
				var email 		=check_mail();
				var birthdate 	=check_birthdate();
				var country 	=check_country();
				var sex 		=check_sex();
		    	if (email=="mail not confirm") 
		    	{
		        	document.getElementById('error').innerHTML="Email not confirm!!";
		        	return;
		    	}
		    	if (email=="mail has been register") 
		    	{
		        	document.getElementById('error').innerHTML="this Email has been register!!";
		        	return;
		    	}
		    	if (birthdate=="date not confirm") 
		    	{
		        	document.getElementById('error').innerHTML="Date not confirm!!";
		        	return;
		    	}
		    	if (country=="country not confirm") 
		    	{
		        	document.getElementById('error').innerHTML="Country not confirm!!";
		        	return;
		    	}  
		    	document.getElementById('error').innerHTML="";
		    	/*var queryString = "?email=" + email + "&birthdate=" + birthdate + "&country=" + country;*/ 	
		    	var jsarray={email:email, birthdate:birthdate, country: country, sex: sex};
		    	sessionStorage.setItem("jsArray", JSON.stringify(jsarray));
				window.open("register_users.php?"+jsarray, "_self");	
			}
	   	});
	});
</script>
</html>
