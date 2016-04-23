<?php
	 session_start();
	require_once('config.php');
	//CHECK IF COACH REGISTRATION
	if ($_POST['Registration']){
		
	//SAVE TEXT VALUES IN VARIABLES
	$username = $_POST['username'];
	$firstname = $_POST['userfirstname'];
	$lastname = $_POST['userlastname'];
	$teamname = $_POST['teamname'];
	$phone = $_POST['userphone'];
	$usermail = $_POST['usermail'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	
	
	//VERIFY IF USER NAME ALREADY EXISTS
	$stmt = $db -> prepare("SELECT username FROM Users WHERE username= :uname ;");
	$stmt->execute(array("uname" => $username));
	$row = $stmt->fetch();
	if ($row != '0'){
	echo ("That username already exists. Try a different username instead! <a href ='registration.php'> &larr; Back</a>");
	}

	//VERIFY THAT EMAIL DOES NOT EXIST YET
	$stmt = $db -> prepare("SELECT email FROM Coaches WHERE email = :emailid ;");
	$stmt -> execute(array("emailid" => $usermail));
	if ($stmt != '0')	
	die ("That email already exists. Use another <a href = 'registration.php'> &larr; Back</a>");

	//VERIFY IF TEAM NAME ALREADY EXISTS
	$stmt = $db -> prepare("SELECT team_name FROM Teams WHERE team_name= :teamname ;");
	$stmt->execute(array("teamname" => $teamname));
	$row2 = $stmt->fetch();
	if ($row2 != '0'){
	echo ("That team name already exists. Try a unique team name instead! <a href ='registration.html'> &larr; Back</a>");
	}
	
	//VERIFY PASSWORDS MATCH
	if ($password != $confirmpassword){
	echo ("The passwords do not match. Please try again! <a href ='registration.php'> &larr; Back</a>");
	}
	
	//CREATE NEW TEAM
 	$stmt = $db -> prepare("INSERT INTO Teams (uuid, team_name) VALUES (uuid(), :team)");
	$stmt -> execute(array("team" => $teamname));
		

	
	//CREATE NEW COACH 
	$stmt = $db -> prepare("INSERT INTO Coaches(uuid, first_name, last_name, sex, email, phone) VALUES(uuid(), :firstName, :lastName, :userSex, :email, :phone)");
	$stmt->execute(array("firstName" => $firstname, "lastName" => $lastname, "userSex" => $usersex, "email" => $usermail, "phone" => $userphone));
	
	//CREATE NEW COACH_USER 
	$hash = password_hash($password, PASSWORD_BCRYPT);
	$stmt = $db -> prepare("INSERT INTO Users (uuid, username, hash, coach, email) VALUES (uuid(), :user, :password, int, :email)");
	$stmt -> execute(array("user" => $username, "email" => $usermail, "password" => $hash, "int" => '1'));
	
	//UPDATE PRIMARY COACH ID IN TEAMS TABLE
	$stmt = $db -> prepare("SELECT uuid FROM Coaches WHERE email = ?");
	$stmt -> execute($usermail);
	$result = $stmt->fetch();


	$stmt = $db -> prepare("Update Teams SET primary_coach_id = :id where team_name = :team;)");
	$stmt -> execute(array("team" => $teamname, "id" => $result));

	echo ("Acount created successfully! Please login with your information. <a href ='login.php'> &larr; Back</a>");

	}
	

/* commented to test the above code
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
    echo "Team member added successfully! Do you want to add another team member? <a href = 'MyTeam.php'> Yes</a><a href = 'index.php'> &larr; No</a>";
    
		//die("Team member added successfully!");

	}*/

?>
