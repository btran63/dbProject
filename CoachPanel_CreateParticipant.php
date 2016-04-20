<?php
	if ($_POST['CoachPanel_CreateParticipant.html']){
		//SAVE TEXT VALUES IN VARIABLES

		$firstname = $_POST['teammemberfirstname'];
		$lastname = $_POST['teammemberlastname'];
		$teammembersex = $_POST['teammembersex'];
		$teammemberdob = $_POST['teammemberdob'];
		$teammembermail = $_POST['teammemberemail'];
		$teammemberheight = $_POST['Height'];
		$teammemberweight = $_POST['Weight'];	
		$nationality = $_POST['teammembernationality'];
		
		//STORE THE COACH ID FOR THE COACH WHO IS LOGGED IN HERE
		$coachid = "123"; //needs work
		
			
		//VERIFY SEX IN M, F, O
		if ($teammembersex != "M" || $teammembersex != "m" || $teammembersex != "F" || $teammembersex != "f" || $teammembersex != "O" || $teammembersex != "o") {
		die ("Invalid user gender. Please type one of the following! (M,F,O) <a href ='MyTeam.html'> &larr; Back</a>");
		
		//SELECT TEAM ID BEING COACHED BY THE COACH WHO IS LOGGED IN
		$stmt = $db -> prepare("SELECT team_id FROM Teams WHERE primary_coach_id= ?");
		$stmt->execute(array($coachid));
		$row = $stmt->fetch();
		if ($row != '0'){
		die ("The Meet Name scheduled for the given date already exists. Try a different Name or Start Date instead! <a href ='AdminPanel_CreateMeet.html'> &larr; Back</a>");
		}
		$teamid = $row['team_id'];


		//CREATE PARTICIPANT
		mysql_query("INSERT INTO 'Participants' ('first_name', 'last_name', 'sex', 'height', 'weight', 'email', 'nationality', 'team_id') VALUES ('$firstname' , '$lastname', '$teammembersex', '$teammemberheight', '$teammemberweight', '$teammembermail', '$teammembernationality','$teamid')");
		
		//PARTICIPANT CREATED 
		echo ("Participant added to the team successfully!");
		}
?>