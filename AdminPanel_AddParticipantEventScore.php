<?php
	session_start();
	require_once('config.php');
	
	if(isset($_POST[AdminPanel_AddParticipantEventScore.html])){

	$eventid = $_POST['eventid'];
	$partcipantid = $_POST['participantid'];
	$participantscore = $_POST['participantscore'];

	//CHECK IF PARTICIPANT SCORE GREATER THAN OR EQUAL TO 0
	if ($participantscore < 0){
	die("Participant score must be a value greater than or equal to zero. Please try again. <a href ='AdminPanel_AddParticipantEventScore.html'> &larr; Back</a>");
	}
	
	//CREATE NEW ENTRY IN Participants_Events
	mysql_query("INSERT INTO 'Participants_Events' (participant_id, event_id, participant_score) VALUES ('$participantid' , '$eventid', '$participantscore')");



	//SELECT FIRST PLACE SCORE AND WINNER IN THE EVENT
	$stmt = $db -> prepare("SELECT MAX(participant_score) AS FirstPlaceScore, participant_id FROM Participants_Events WHERE event_id = ?;");
	$stmt->execute($eventid);
	$row1 = $stmt->fetch();
	if ($row1 != '0'){
	$firstplaceparticipant = row1['participant_id'];
	$firstplacescore = row1['FirstPlaceScore'];
	}

	//SELECT SECOND PLACE SCORE AND WINNER IN THE EVENT
	$stmt = $db -> prepare("SELECT MAX(participant_score) AS SecondPlaceScore, participant_id FROM Participants_Events WHERE participant_score < (SELECT MAX(participant_score) AS FirstPlaceScore FROM Participants_Events) AND event_id = ?;");
	$stmt->execute($eventid);
	$row2 = $stmt->fetch();
	if ($row2 != '0'){
	$secondplaceparticipant = row2['participant_id'];
	$secondplacescore = row2['SecondPlaceScore'];
	}
	
	//SELECT THIRD PLACE SCORE AND WINNER IN THE EVENT
	$stmt = $db -> prepare("SELECT MAX(participant_score) AS ThirdPlaceScore, participant_id FROM Participants_Events WHERE participant_score < (SELECT MAX(participant_score) AS SecondPlaceScore FROM Participants_Events WHERE participant_score <(SELECT MAX(participant_score) AS FirstPlaceScore FROM Participants_Events) ) AND event_id = ?;");
	$stmt->execute($eventid);
	$row3 = $stmt->fetch();
	if ($row3 != '0'){
	$thirdplaceparticipant = row3['participant_id'];
	$thirdplacescore = row3['ThirdPlaceScore'];
	}
	
	

	//UPDATE EVENTS TABLE WITH 1ST, 2ND, 3RD SCORES AND SCORER IDS
	$stmt = $db -> prepare("UPDATE 'Events' SET first_place_winner_id = ? , first_place_winner_score = ? , second_place_winner_id = ? , second_place_winner_score = ? , third_place_winner_id = ? , third_place_winner_score = ? WHERE uuid = ?;");
	$stmt->execute(array($firstplaceparticipant, $firstplacescore, $secondplaceparticipant, $secondplacescore, $thirdplaceparticipant, $thirdplacescore));
	
	
	
	//SCORES UPDATED 
	echo("Participant Score for the Event has been added! If the score is Top 3 for the Event, it will be updated in the Events table as well!");
	}
?>
