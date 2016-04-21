<?php
	
	session_start();
	require_once('config.php');
	if ($_POST['CoachPanel_AssignParticipantToEvent.html']){
		//SAVE TEXT VALUES IN VARIABLES
		$participantid = $_POST['participantid'];
		$eventid = $_POST['eventid'];
		
		//ASSIGN PARTICIPANT TO EVENT
		mysql_query("INSERT INTO 'Participants_Events' ('participant_id', 'event_id') VALUES ('$participantid','$eventid')");
		
		//PARTICIPANT HAS BEEN ASSIGNED TO EVENT
		echo ("Participant has been assigned to the event successfully!");
		}
?>