<?php
    session_start();
    include 'authentication.php';
    if (isLoggedIn()){
        header('Location: index.php');
    }
    
    if (loginRequested()){
    	$login_msg = login($_POST['username'], $_POST['password']);
    	if (isLoggedIn()){
            header('Location: index.php');
    	}
    }
    elseif (pwRecoveryRequested(){
        $pw = resetRandomPW($_POST['recoverUsername'])
        $recover_msg = sendNewPassword($_POST['recoverUsername'], $pw);
        
    })
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
<br>
<br>
<section class="loginform cf">
	<h2>Coach & Admin Login</h2>
    <?php
        if (isset($login_msg)){
            if ($login_msg){
                echo $login_msg;
            }
            
        }
    ?>
<form name="login" action="login.php" method='POST' accept-charset="utf-8">
    <h2>Are you a coach or admin? Sign in here!</h2>
    <ul style = "list-style: none;">
        <li><label for="username">Username</label>
        <input type="text" name="username" placeholder="glsmith13" required></li>
        <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="password" required></li>
        <li>
        <input type="submit" name="loginSubmit" value="Login"></li>
    </ul>
</form>
<form name="recovery" action="login.php" method='POST' accept-charset="utf-8">
    <h2>Forgot your password?</h2>
    <?php
    if (isset($recover_msg)){
        echo $recover_msg;
    }
    ?>
	<ul style="list-style: none;">
		<li><label for="username">Username</label><input type="text" name="recoverUsername" required></li>
		<li><input type="submit" name="recoverSubmit" value="Reset Password"></li>
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
