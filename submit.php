<?php
	session_start();
	require_once('config.php');
	//CHECK IF COACH REGISTRATION
	if ($_POST['Registration.html']){
		
	//SAVE TEXT VALUES IN VARIABLES
	$username = $_POST['username'];
	$firstname = $_POST['userfirstname'];
	$lastname = $_POST['userlastname'];
	$teamname = $_POST['teamname'];
	$phone = $_POST['userphone'];
	$usermail = $_POST['usermail'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	//VERIFY USERNAME LENGTH
	if (strlen($username) > 31){
	die ("Username must not contain more than 31 characters. Please try again! <a href ='Registration.html'> &larr; Back</a>");
	}
	
	//VERIFY IF USER NAME ALREADY EXISTS
	$stmt = $db -> prepare("SELECT username FROM Users WHERE username= ?;");
	$stmt->execute($username);
	$row = $stmt->fetch();
	if ($row != '0'){
	die ("That username already exists. Try a different username instead! <a href ='Registration.html'> &larr; Back</a>");
	}
	//VERIFY THAT EMAIL DOES NOT EXIST YET
	$stmt = $db -> prepare("SELECT email FROM Users WHERE email = ?");
	$stmt -> execute($usermail);
	if ($row != '0')
		die ("That email already exists. Use another <a href = 'Registration.html'> &larr; Back</a>");
	//VERIFY IF TEAM NAME ALREADY EXISTS
	$stmt = $db -> prepare("SELECT team_name FROM Teams WHERE team_name= $teamname;");
	$stmt->execute(array($teamname));
	$row2 = $stmt->fetch();
	if ($row2 != '0'){
	die ("That team name already exists. Try a unique team name instead! <a href ='Registration.html'> &larr; Back</a>");
	}

	
	//VERIFY PASSWORDS MATCH
	if ($password != $confirmpassword){
	die ("The passwords do not match. Please try again! <a href ='Registeration.html'> &larr; Back</a>");
	}
	//CREATE NEW COACH (Will have to update team_id when the team is created?)
	$stmt = $db -> prepare("INSERT INTO Coaches(first_name, last_name, sex, email, phone) VALUES(:firstName, :lastName, :userSex, :email, :phone)");
	$stmt->execute(array("firstName" => $firstname, "lastName" => $lastname, "userSex" => $usersex, "email" => $useremail, "phone" => $userphone));
	//CREATE NEW COACH_USER 
	$hash = password_hash($password, PASSWORD_BCRYPT);
	$stmt = $db -> prepare("INSERT INTO Users (uuid, username, hash, coach, email) VALUES (uuid(), :user, :password, int, :email)");
	$stmt -> execute(array("user" => $username, "email" => $usermail, "password" => $hash, "int" => '1'));
	//CREATE NEW TEAM (Need coach ID?)
	mysql_query("INSERT INTO 'Teams' (team_name) VALUES ('$teamname')");
	$stmt = $db -> prepare("INSERT INTO Team (team_name) VALUES (:team)");
	$stmt -> execute("team" => $teamname);
	die("Your account has been created!");
	}
	
	//CHECK IF TEAM MEMBER REGISTERATION
	if ($_POST['MyTeam.html']){
	//SAVE TEXT VALUES IN VARIABLES
		$firstname = $_POST['teammemberfirstname'];
		$lastname = $_POST['teammemberlastname'];
		$teammembersex = $_POST['teammembersex'];
		$teammemberdob = $_POST['teammemberdob'];
		$teammembermail = $_POST['teammemberemail'];
		$teammemberheight = $_POST['Height'];
		$teammemberweight = $_POST['Weight'];	
		$nationality = $_POST['teammembernationality'];
		
		//VERIFY SEX IN M, F, O
		if ($teammembersex != "M" || $teammembersex != "m" || $teammembersex != "F" || $teammembersex != "f" || $teammembersex != "O" || $teammembersex != "o") {
		die ("Invalid user gender. Please type one of the following! (M,F,O) <a href ='MyTeam.html'> &larr; Back</a>");
		
		//INSERT PARTICIPANT ( Need Team_ID "Select uuid from Teams where primary_coach_id = the coach who is logged in;?
		mysql_query("INSERT INTO 'Participants' ('first_name', 'last_name', 'sex', 'height', 'weight', 'email', 'nationality') VALUES ('$firstname' , '$lastname', '$teammembersex', '$teammemberheight', '$teammemberweight', '$teammembermail', '$teammembernationality')");

		//ACCOUNT CREATED 
		die("Team member added successfully!");

	}

?>
