<?php
	session_start();
	require_once('config.php');
	
	if(isset($_POST[ForgotUsernameOrPass.html])){
	$firstname = $_POST['userfirstname'];
	$lastname = $_POST['userlastname'];
	$usermail = $_POST['useremail'];
	$userphone = $_POST['userphone'];
	
	//MATCH FIRST_NAME, LAST_NAME, EMAIL, PHONE
	$params = array(':first_name' => $firstname, ':last_name' => $lastname, ':email' => $usermail, ':phone' => $userphone);
	$stmt = $db -> prepare("SELECT * FROM Coaches WHERE first_name = :first_name AND last_name = :last_name AND email = :email AND phone = :phone");
	$results = $stmt->execute($params);
	$row = $results->fetch();
	//IF NO MATCH FOUND
	if ($row = '0')
	{ 
	//INCORRECT DATA
		die ("Inavlid data entered! Please try again <a href ='ForgotUsernameOrPass.html'> &larr; Back</a><br>");
	}
	else
	{
	//MATCH FOUND
	//SELECT CORRECT USERNAME AND PASSWORD
	$stmt = $db -> prepare("SELECT * FROM Users WHERE Users.uuid = (Select uuid from Coaches WHERE first_name = ? AND last_name = ? AND email = ? AND phone = ?;");
	$results = $stmt->execute($params);
	$row = $results->fetch();
	$username = $row['username'];
	//NOTE: CANNOT RETURN PASSWORD! MUST RESET IF IT IS FORGOTTEN
	$newPass = "";//randomly generate new password
	$passSize = mt_rand(8,30);//password min and max length
	for ($i = 0; $i < $passSize; $i++)
	{
		$pick = mt_rand(0,80);//location of random char in allowedChars
		$char = $allowedChars[$pick];
		$newPass .= $char;
	}
	//hash $newPass
	mysql_query("INSERT INTO 'Users'(hash) VALUES ('$newPass')");

	//SEND EMAIL TO COACH
	mail($usermail, "Your Username and Password", "Hello $firstname $lastname, \n \nUsername: $username \n Password: $newPass \n\n Sincerely,\nNational Gym Meet";
		
	echo "An Email Has Been Sent With Your Username And Password! <a href ='LogIn.html'>Click Here to return to Login Page!</a>";

	}
?>
