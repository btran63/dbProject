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
	$stmt = $db -> prepare("INSERT INTO Coaches(uuid, first_name, last_name, sex, email, phone) VALUES(uuid(), :firstName, :lastName, :userSex, :email, :phone)");
	$stmt->execute(array("firstName" => $firstname, "lastName" => $lastname, "userSex" => $usersex, "email" => $usermail, "phone" => $userphone));
	//CREATE NEW COACH_USER 
	$hash = password_hash($password, PASSWORD_BCRYPT);
	$stmt = $db -> prepare("INSERT INTO Users (uuid, username, hash, coach, email) VALUES (uuid(), :user, :password, int, :email)");
	$stmt -> execute(array("user" => $username, "email" => $usermail, "password" => $hash, "int" => '1'));
	//CREATE NEW TEAM
  $stmt = $db -> prepare("SELECT uuid FROM Coaches AS C WHERE C.email = ?");
  $stmt -> execute($usermail);
  $result = $stmt->fetch();
	$stmt = $db -> prepare("INSERT INTO Teams (uuid, team_name, primary_coach_id) VALUES (uuid(), :team, :id)");
	$stmt -> execute("team" => $teamname, "id" => $result);
	die ("Acount created successfully! Please login with your information. <a href ='login.php'> &larr; Back</a>");
	}
	
	//CHECK IF TEAM MEMBER REGISTERATION
	if ($_POST['MyTeam.php']){
	//SAVE TEXT VALUES IN VARIABLES
    $coach = $_SESSION['username'];
		$firstname = $_POST['teammemberfirstname'];
		$lastname = $_POST['teammemberlastname'];
		$teammembersex = $_POST['teammembersex'];
		$teammemberdob = $_POST['teammemberdob'];
		$teammembermail = $_POST['teammemberemail'];
		$teammemberheight = $_POST['Height'];
		$teammemberweight = $_POST['Weight'];	
		$nationality = $_POST['teammembernationality'];

		//INSERT PARTICIPANT
    $stmt = $db -> prepare("SELECT uuid FROM Teams AS T WHERE T.primary_coach_id = (SELECT uuid FROM Coaches AS C WHERE C.email = (SELECT email FROM Users AS U WHERE U.user=?))");
    $stmt ->execute($coach);
    $id = $stmt->fetch();
    $stmt = $db -> prepare("INSERT INTO Participants (first_name, last_name, sex, height, weight, nationality, team_id, email) VALUES (:first, :last, :sex, :height, :weight, :nationality, :team, :email)");
    $stmt -> execute(array("first" => $firstname, "last" => $lastname, "sex" => $teammembersex, "height" => $teammemberheight, "weight" => $teammemberweight, "nationality" => $nationality, "team_id" => $id, "email" => $teammemberemail));
    echo "Team member added successfully!";
    
		//die("Team member added successfully!");

	}

?>
