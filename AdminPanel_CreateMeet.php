<?php
	session_start();
	require_once('config.php');
	
	if(isset($_POST[AdminPanel_CreateMeet.html])){
	$meetname = $_POST['meetname'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$capacity = $_POST['capacity'];
	$zipcode = $_POST['zipcode'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$street_address =$_POST['streetaddress'];
	
	//CHECK IF START DATE GREATER THAN CURRENT DATE
	$date_now = date("Y-m-d");
	$date_convert = date_format($startdate,"Y/m/d");
	if ($date_now > $date_convert) 
	{
	die ("Inavlid date entered! Please try again <a href ='AdminPanel_CreateEvent.html'> &larr; Back</a><br>");
	}

	//CHECK IF END DATE GREATER THAN START DATE
	$startdate_convert = date_format($startdate,"Y/m/d");
	$enddate_convert = date_format($enddate,"Y/m/d");
	if ($startdate_convert > $enddate_convert) 
	{
	die ("End Date must be greater than Start Date! Please try again <a href ='AdminPanel_CreateEvent.html'> &larr; Back</a><br>");
	}	
	

	//VERIFY IF MEET NAME ALREADY EXISTS ON THE GIVEN START DATE
	//MEET NAME CAN HAVE DUPLICATES, FOR EXAMPLE ANNUAL EVENTS
		$stmt = $db -> prepare("SELECT meet_name FROM Meets WHERE meet_name= ? AND start_date =?");
		$stmt->execute(array($meetname,$startdate));
		$row = $stmt->fetch();
	if ($row != '0'){
		die ("The Meet Name scheduled for the given date already exists. Try a different Name or Start Date instead! <a href ='AdminPanel_CreateMeet.html'> &larr; Back</a>");
	}

	//VERIFY IF CAPACITY GREATER THAN 0
	if ($capacity < 1){
		die ("The Capacity must be a numeric value greater than zero. <a href ='AdminPanel_CreateMeet.html'> &larr; Back</a>");
	}
	
	//CREATE NEW MEET
	mysql_query("INSERT INTO 'Meets' (meet_name, start_date, end_date, capacity, zip_code, city, state, street_address) VALUES ('$meetname' , '$startdate_convert', '$enddate_convert', $capacity,'$zip_code', '$city', '$state', '$street_address')");
	
	//SEND EMAIL TO ALL COACHES ABOUT THE NEW MEET
	$sql = mysql_query("select email from Coaches");
	$recipients = array();
	while($row = mysql_fetch_array($sql)) {
    	$recipients[] = $row['email'];
	}
	$to = 'nationalgymmeet@gmail.com';
	$subject = "New Meet: '$meetname' Has Been Scheduled!";
	$body = "Hello! A new meet has been scheduled and is now available for registeration for your team!";
	$headers = 'From: nationalgymmeet@gmail.com' . "\r\n" ;
	$headers .= 'Reply-To: nationalgymmeet@gmail.com' . "\r\n";
	$headers .= 'BCC: ' . implode(', ', $recipients) . "\r\n";
	mail($to, $subject, $body, $headers);
	
	//MEET CREATED 
	echo("New Meet has been created!");
	}
?>
