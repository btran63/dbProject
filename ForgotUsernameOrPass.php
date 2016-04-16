<?php
	session_start();
	require_once('config.php');
	
	if(isset($_POST[ForgotUsernameOrPass.html])){
	$firstname = $_POST['userfirstname'];
	$lastname = $_POST['userlastname'];
	$usermail = $_POST['useremail'];
	$userphone = $_POST['userphone'];
	



	//MATCH FIRST_NAME, LAST_NAME, EMAIL, PHONE
	$stmt = $db -> prepare("SELECT * FROM Coaches WHERE first_name = ? AND last_name = ? AND email = ? AND phone = ?;");
		$stmt->bindParam('1, $firstname, PDO::PARAM_STR, 25');
		$stmt->bindParam('2, $lastname, PDO::PARAM_STR, 25');
		$stmt->bindParam('3, $usermail, PDO::PARAM_STR, 50');
		$stmt->bindParam('4, $userphone, PDO::PARAM_INT');
		$results = $stmt->execute();
		$row = $results->fetch();
	//IF NO MATCH FOUND
	if ($row = '0'){ 
	//INCORRECT DATA
		die ("Inavlid data entered! Please try again <a href ='ForgotUsernameOrPass.html'> &larr; Back</a><br>");
	} else{
	//MATCH FOUND

	//SELECT CORRECT USERNAME AND PASSWORD
	$stmt = $db -> prepare("SELECT * FROM Users WHERE Users.uuid = (Select uuid from Coaches WHERE first_name = $firstname AND last_name = $lastname AND email = $usermail AND phone = $userphone;");
	$stmt->execute(array($username));
	$row = $stmt->fetch();
	$username = $row['username'];
	//hash password?? $row[hash] = hash($row[hash]);?
	$pass = $row['hash'];

	//SEND EMAIL TO COACH
	mail($usermail, "Your Username and Password", "Hello $firstname $lastname, \n \nUsername: $username \n Password: $pass \n\n Sincerely,\nNational Gym Meet";
		
	echo "An Email Has Been Sent With Your Username And Password! <a href ='LogIn.html'>Click Here to return to Login Page!</a>";

	}
?>
