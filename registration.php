<?php
    session_start();
    include 'authentication.php';
    if (isLoggedIn()){
        header('Location: index.php');
    }
?>
<html>
<header>
    <title>National Gymnastic Meet Home</title>
    <link rel="stylesheet" type = "text/css" href = "main.css">
</header>
<body>
    <header><a href="index.php"><img src="./static/new_logo.jpg" href="index.php"></a></header>
        
        <div id=nav>
		<li style= "list-style-type:none"><a href="admin.php">List of Current Meets</a></li><br>
		<li style= "list-style-type:none">Register for a Meet</li><br>
		<li style= "list-style-type:none">Edit Meet</li><br>
		<li style= "list-style-type:none">Search Meet</li><br>
        </div>
            <ul id="menu">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="myteam.php">MyTeam</a><li>
            <li><a href="report.php">Reports</a><li>
            </ul>
        
<section class="loginform cf">
<form name="Registration" action="submit.php" method="post" accept-charset="utf-8">
    <ul style = "list-style: none;">
        <li><label for="userfirstname">First Name</label>
        <input type="text" name="userfirstname" placeholder="Bob" required></li><br>
        <li><label for="userlastname">Last Name</label>
        <input type="text" name="userlastname" placeholder="Smith" required></li><br>
        <li><label for="teamname">Team Name</label>
        <input type="text" name="teamname" placeholder="Rockets" required></li><br>
        <li><label for="usersex">Sex</label>
        <input type="radio" name="usersex" value='M' required>Male 
        <input type="radio" name="usersex" value='F'>Female 
        <input type='radio' name='usersex' value='O'>Unspeficied/ Transitioning/ Other</li><br>
        <li><label for="userphone">Phone</label>
        <input type="text" name="userphone" placeholder="XXXXXXXXXX" maxlength ="11" required></li><br>
        <li><label for="usermail">Email</label>
        <input type="email" name="usermail" placeholder="yourname@email.com" required></li><br>
<li><label for="username">Desired Username</label>
        <input type="text" name="username" placeholder="Bob_Smith24" required></li><br>
        <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required></li><br>
        <li>
            <li><label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required></li><br>
        <li>
        <input name ="Registration" type="submit" value="Register"></li>
    </ul>
</form>

</section>
</body>
</html>

<!--
-->
