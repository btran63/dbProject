<?php
?>
<html>
<head>
    <title>National Gymnastic Meet My Team</title>
    <link rel="stylesheet" type = "text/css" href = "main.css">
</head>
<body>
    <header><h1>My Team</h1></header>
	
		
			<ul id="menu">
			<li><a class="active" href="Homepage.html">Home</a></li>
			<li><a href="Login.html">Login</a></li>
			<li><a href="Registration.html">Registration</a></li>
			<li><a href="Contact.html">Contact</a></li>
			<li><a href="MyTeam.html">MyTeam</a><li>
			<li><a href="Report.html">Reports</a><li>
			</ul>
			<br><br>
			
			<h2>Team Name</h2>
			<h3>Register Team Members</h3>
<section class="loginform cf">
<form name="Register Team Members" action="index_submit" method="get" accept-charset="utf-8">
    <ul style = "list-style: none;">
		<li><label for="teammemberfirstname">First Name</label>
        <input type="firstname" name="teammemberfirstname" placeholder="FirstName" required></li><br>
		<li><label for="teammemberlastname">Last Name</label>
        <input type="lastname" name="teammemberlastname" placeholder="LastName" required></li><br>
		<p4>Date of birth</p4><br><br>
		<li><label for="Month">Month</label>
		<input type ="datetime" name="birthmonth" placeholder ="MM" required></li><br>
		<li><label for="Day">Day</label>
		<input type ="datetime" name="birthdate" placeholder ="DD" required></li><br>
		<li><label for="Year">Year</label>
		<input type ="datetime" name="birthyear" placeholder ="YYYY" required></li><br>
		<li><label for="Height">Height in cm</label>
		<input type ="Height" name="Height" placeholder ="100" required></li><br>
		<li><label for="Weight">Weight in kg</label>
		<input type ="Weight" name="Weight" placeholder ="150" required></li><br>
        <input type="submit" value="Login"></li>

    </ul>
</form>			
</body>
</html>