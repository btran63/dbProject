<?php  
    session_start();
?>
<html>
<header>
    <title>National Gymnastic Meet Home</title>
    <link rel="stylesheet" type = "text/css" href = "main.css">
</header>
<body>
    <header><a href="index.php"><img src="usable_logo.jpg"></a></header>
        
        <div id=nav>
        List of Current Meets</li><br>
        Register for a Meet</li><br>
        Edit Meet</li><br>
        Search Meet</li><br>
        </div>
			<ul id="menu">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="myteam.php">MyTeam</a><li>
			<li><a href="report.php">Reports</a><li>
			</ul>
<br>
<br>
<section class="loginform cf">
<form name="login" action="index_submit" method="get" accept-charset="utf-8">
    <ul style = "list-style: none;">
        <li><label for="username">Username</label>
        <input type="text" name="username" placeholder="glsmith13" required></li>
        <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="password" required></li>
        <li>
        <input type="submit" value="Login"></li>
    </ul>
</form>
</section>
</body>
</html>

