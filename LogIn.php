<html>
<head>
<title>National Gymnastic Meet Login Page</title>
<link rel="stylesheet" type = "text/css" href = "main.css">
</head>
<body>
<header><h1>Login</h1></header>

			<ul id="menu">
			<li><a class="active" href="Homepage.php">Home</a></li>
			<li><a href="Login.php">Login</a></li>
			<li><a href="Registration.php">Registration</a></li>
			<li><a href="Contact.php">Contact</a></li>
			<li><a href="MyTeam.php">MyTeam</a><li>
			<li><a href="Report.php">Reports</a><li>
			</ul>
<br>
<br>
<section class="loginform cf">
<form name="login" action="index_submit" method="get" accept-charset="utf-8">
    <ul style = "list-style: none;">
        <li><label for="usermail">Email</label>
        <input type="email" name="usermail" placeholder="yourname@email.com" required></li>
        <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="password" required></li>
        <li>
        <input type="submit" value="Login"></li>
    </ul>
</form>
</section>
</body>
</html>
<?php  /*This is the php part*/
    $email = $_POST['usermail'];
    $pw = $_POST['password'];

    $stmt = $db-> prepare(SELECT ) 
?>