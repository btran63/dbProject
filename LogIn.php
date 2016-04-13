<?php
	session_start();
	require_once('config.php');
	
	if(isset($_POST[LogIn.php])){
	$username = $_POST['usermail'];
	$password = $_POST['password'];

	//hash the password? $password = hash($password); ??

	//MATCH USERNAME AND PASS
	$stmt = $db -> prepare("SELECT * FROM Users WHERE username= $username AND hash =$password");
		$stmt->execute(array($username));
		$row = $stmt->fetch();


	if ($row != '0'){ 
	//Need to create ForgotPass.html
		die ("Inavlid combination of Username and Password! Please try again <a href ='LogIn.html'> &larr; Back</a><br> <a href ='ForgotPass.html'>Forgot your password? </a>");
	} else{
	

	//CHECK IF COACH OR ADMIN
	if ($row['coach'] == 1 || $row['coach'] == "1"){
		echo "You are now logged in, Coach.";
	//create cookies? do coach things and stuff
	//load coach panel form
	} else if ($row['admin'] == 1 || $row['admin'] == "1"){
		echo "Welcome, Admin.";
	//create cookies? do admin things and stuff
	//load admin panel form
	}

	}
?>