<?php
    start_session();
?>
<html>
<head>
<title>National Gymnastic Meet Login Page</title>
<link rel="stylesheet" type = "text/css" href = "main.css">
</head>
<body>
<header><h1>Login</h1></header>

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
<?php  /*This is the php part*/
    $email = $_POST['usermail'];
    $pw = $_POST['password'];

    $stmt = $db-> prepare("SELECT username FROM Users WHERE uuid=? AND hash=?") 
    $stmt -> execute(array($email, $pw));
    $rows = $stmt->fetch();


    if($rows!=0){

    }
?>