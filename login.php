<?php
require_once('config.php');
function login($email, $pw){

	$stmt = $db-> prepare("SELECT username, hash, email FROM Users WHERE email=?");
	$stmt->bind_param('ss', $email, $pw);
	$results = $stmt->execute();
	$userResults = $results->fetch_row();
	if ($userResults.num_rows)
	{
		$hash = $userResults[1];
		$validPW = password_verify($pw, $hash);
		if ($validPW)
		{
			$_SESSION['logged_in'] = True;
			$_SESSION['username'] = $userResults[0];
			$_SESSION['email'] = $userResults[2];
			return NULL;
		}
		else
		{
			$msg = "Invalid username or password";
			return $msg;
		}	
	}
	else
	{
		$msg = "Invalid username or password";
		return $msg;
	}
}
$rows = $stmt->fetch();
?>