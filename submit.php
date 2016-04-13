<?php
	session_start();
	require_once('config.php');
	//CHECK IF COACH REGISTRATION
	if ($_POST('Registration.html')){
		
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

	die("Your account has been created!");
	}
	
	//CHECK IF TEAM MEMBER REGISTERATION
	if ($_POST('MyTeam.html)){
	//SAVE TEXT VALUES IN VARIABLES
		$firstname = $_POST('teammemberfirstname');
		$lastname = $_POST('teammemberlastname');
		$teammembersex = $_POST('teammembersex');
		$teammemberdob = $_POST('teammemberdob');
		$teammembermail = $_POST('teammemberemail');
		$teammemberheight = $_POST('Height');
		$teammemberweight = $_POST('Weight');	
		$nationality = $_POST('teammembernationality');

	}

?>
