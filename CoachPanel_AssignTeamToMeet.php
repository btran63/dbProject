<?php
	
	session_start();
	require_once('config.php');
	if ($_POST['CoachPanel_AssignTeamToMeet.html']){
		//SAVE TEXT VALUES IN VARIABLES

		$teamid = $_POST['teamid'];
		$meetid = $_POST['meetid'];



		//ASSIGN TEAM TO MEET
		mysql_query("INSERT INTO 'Teams_Meets' ('team_id', 'meet_id') VALUES ('$teamid','$meetid')");
		
		//TEAM HAS BEEN ASSIGNED TO MEET 
		echo ("Team has been assigned to the meet successfully!");
		}
?>