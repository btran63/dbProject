<?php
    start_session();
    if (isLoggedIn()){
        header('Location: index.php');
    }
    include 'login_views.php';
    if (loginRequested()){
    	$login_msg = login($_POST['username'], $_POST['password']);
    	if (isLoggedIn()){
            header('Location: index.php');
    	}
    }
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
    <?php
        if ($login_msg){
            echo $login_msg;
        }
    ?>
<form name="login" action="index_submit" method='POST' accept-charset="utf-8">
    <ul style = "list-style: none;">
        <li><label for="username">Username</label>
        <input type="text" name="username" placeholder="glsmith13" required></li>
        <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="password" required></li>
        <li>
        <input type="submit" name="loginSubmit" value="Login"></li>
        <li><label for="forgorUserPass">forgotUserPass</label>
        <input type = "submit" value = "ForgotUserNameOrPass.html"></li>
    </ul>
</form>
</section>
</body>
</html>
<?php  /*This is the php part; DEPRECATED! Refer to login_views.php for the new function definitions*/
    /*$email = $_POST['usermail'];
    $pw = $_POST['password'];
    $stmt = $db-> prepare("SELECT username, hash, email FROM Users WHERE email=?");
    $stmt->execute($email);
    $results = $stmt->execute();
    $userResults = $results->fetch_row();
    if ($userResults.num_rows)
    {
    	$hash = $userResults[1];
    	$validPW = password_verify($pw, $hash);
    	if ($validPW)
    	{
    		$_SESSION['logged_in'] = True;
		$_SESSION['username'] = $userResults[0];
		$_SESSION['email'] = $userResults[2];
		//CHECK IF COACH OR ADMIN
		if ($userResults['coach'] == 1 || $userResults['coach'] == "1")
		{
			echo "You are now logged in, Coach.";
			
			//create cookies? do coach things and stuff
			//load coach panel form
		}
		else if ($userResults['admin'] == 1 || $userResults['admin'] == "1")
		{
			echo "Welcome, Admin.";
			//create cookies? do admin things and stuff
			//load admin panel form
		}
	}
	else
		//Need to create ForgotUsernameORPass.html, ForgotUsernameORPass.php is uploaded
		die ("Inavlid combination of Username and Password! Please try again <a href ='LogIn.html'> &larr; Back</a><br> <a href ='ForgotUsernameOrPass.html'>Forgot your password? </a>");
    }
    else
    	//Need to create ForgotUsernameORPass.html, ForgotUsernameORPass.php is uploaded
    	die ("Inavlid combination of Username and Password! Please try again <a href ='LogIn.html'> &larr; Back</a><br> <a href ='ForgotUsernameOrPass.html'>Forgot your password? </a>");
    	*/
?>
