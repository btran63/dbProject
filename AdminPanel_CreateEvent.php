<?php
	session_start();
	require_once('config.php');
	
	if(isset($_POST[AdminPanel_CreateEvent.html])){
	$eventname = $_POST['eventname'];
	$eventstartdate = $_POST['eventstartdate'];
	$starttime = $_POST['starttime'];
	$endtime = $_POST['endtime'];
	$meetname = $_POST['meeetname']; //SHOULD HAVE A SELECT BOX OR LIST FILLED WITH ALL FUTURE MEET NAMES
	
	//GET MEET ID, START DATE AND END DATE FOR THE MEET NAME
	$stmt = $db -> prepare("SELECT uuid, start_date, end_date FROM Meets WHERE meet_name= ?");
		$stmt->execute(array($meetname));
		$row = $stmt->fetch();
	if ($row != '0'){
		$meetid = $row['uuid'];
		$meetstartdate = $row['start_date'];
		$meetenddate = $row['end_date'];
	}
	
	//CHECK IF START DATE OF EVENT BETWEEN START DATE AND END DATE OF MEET
	$eventstartdateconvert = date_format($eventstartdate,"Y/m/d");
	$meetstartdateconvert = date_format($meetstartdate,"Y/m/d");
	$meetenddateconvert = date_format($meetenddate,"Y/m/d");

	//IF EVENT DATE LESS THAN MEET START DATE OR GREATER THAN MEET END DATE
	if ($eventstartdateconvert < $meetstartdateconvert || $eventstartdateconvert > $meetenddateconvert ) 
	{
	die ("The Event date entered must be between the Start Date and End Date of the Meet! Please try again <a href ='AdminPanel_CreateEvent.html'> &larr; Back</a><br>");
	}


	//CREATE NEW EVENT
	mysql_query("INSERT INTO 'EVENTS' (name, date_started, start_time, end_time, meet_id) VALUES ('$eventname' , '$eventstartdate', '$starttime', '$endtime', '$meetid')");
	
	//MEET CREATED 
	echo("New Event has been created!");
	}
?>