<html>
<head>
<title>National Gymnastic Meet Registration Page</title>
<link rel="stylesheet" type = "text/css" href = "login.css">
</head>
<body>
<header><h1>Registration</h1></header>

            <ul id = "menu">
            <li><a class="active" href="Homepage.html">Home</a></li>
            <li><a href="Login.html">Login</a></li>
            <li><a href="Registration.html">Registration</a></li>
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="MyTeam.html">MyTeam</a><li>
            <a href="Report.html">Report</a>
            </ul>
<br>
<br>
<section class="loginform cf">
<form name="Registration" action="submit.php" method="post" accept-charset="utf-8">
    <ul style = "list-style: none;">
        <li><label for="userfirstname">First Name</label>
        <input type="firstname" name="userfirstname" placeholder="FirstName" required></li><br>
        <li><label for="userlastname">Last Name</label>
        <input type="lastname" name="userlastname" placeholder="LastName" required></li><br>
        <li><label for="teamname">Team Name</label>
        <input type="teamname" name="teamname" placeholder="TeamName" required></li><br>
        <li><label for="usersex">Sex</label>
        <input type="sex" name="usersex" placeholder="M,F,O" maxlength ="1" required></li><br>
        <li><label for="userphone">Phone</label>
        <input type="phone" name="userphone" placeholder="Phone Number" maxlength ="11" required></li><br>
        <li><label for="usermail">Email</label>
        <input type="email" name="usermail" placeholder="yourname@email.com" required></li><br>
        <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required></li><br>
        <li>
            <li><label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required></li><br>
        <li>
        <input type="submit" value="Login"></li>
    </ul>
</form>
</section>
</body>
</html>
//NEED PASSWORD CONSTRAINTS
<?php
	session_start();
	require_once('config.php');

	//CHECK IF COACH REGISTRATION
	if ($_POST('Registration.php')){
		//SAVE TEXT VALUES IN VARIABLES
		$firstname = $_POST('userfirstname');
		$lastname = $_POST('userlastname');
		$teamname = $_POST('teamname');
		$usersex = $_POST('usersex');
		$phone = $_POST('userphone');
		$usermail = $_POST('usermail');
		$password = $_POST('password');
		$confirmpassword = $_POST('confirmpassword');
	
	//VERIFY USERNAME LENGTH
	if (strlen($usermail) > 31){
		die ("Username must not contain more than 31 characters. Please try again! <a href ='Registration.html'> &larr; Back</a>");
	}
	
	//VERIFY IF USER NAME ALREADY EXISTS
		$stmt = $db -> prepare("SELECT username FROM Users WHERE username= $usermail");
		$stmt->execute(array($usermail));
		$row = $stmt->fetch();
	if ($row != '0'){
		die ("That username already exists. Try a different username instead! <a href ='Registration.html'> &larr; Back</a>");
	}

	//VERIFY IF TEAM NAME ALREADY EXISTS
		$stmt = $db -> prepare("SELECT team_name FROM Teams WHERE team_name= $teamname");
		$stmt->execute(array($teamname));
		$row2 = $stmt->fetch();
	if ($row2 != '0'){
		die ("That team name already exists. Try a unique team name instead! <a href ='Registration.html'> &larr; Back</a>");
	}

	
	//VERIFY PASSWORDS MATCH
	if ($password != $confirmpassword){
		die ("The passwords do not match. Please try again! <a href ='Registeration.html'> &larr; Back</a>");
	}

	//VERIFY SEX IN M, F, O
	if ($usersex != "M" || $usersex != "m" || $usersex != "F" || $usersex != "f" || $usersex != "O" || $usersex != "o") {
		die ("Invalid user gender. Please type one of the following! (M,F,O) <a href ='Registration.html'> &larr; Back</a>");
	}

	//CREATE NEW COACH (Will have to update team_id when the team is created?)
		mysql_query("INSERT INTO 'Coaches' (first_name, last_name, sex, email, phone) VALUES ('$firstname' , '$lastname', '$usersex', '$useremail','$userphone')");


	//CREATE NEW COACH_USER (I don't know how to hash?)
		mysql_query("INSERT INTO 'Users' (username, hash, coach) VALUES ('$usermail' , '$password', '1')");

	//CREATE NEW TEAM (Need coach ID?)
		mysql_query("INSERT INTO 'Teams' (team_name) VALUES ('$teamname')");

	//ACCOUNT CREATED 
		echo("Your account has been created!");
	}
	?>
