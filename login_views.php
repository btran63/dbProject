<?php
include 'config.php';

function userExists($username){
    $db = connect();
    $statement = $db->prepare('SELECT username FROM Users WHERE username = :username');
    $params = array(':username' => $username);
    $results = $statement->execute($params); // Retrieving the results list here.
    $db = NULL; // Closing the connection
    if ($results->rowCount()){
        return True;
    }
    else{
        return False;
    }
}
function login($username, $password){
    if (userExists($username)){
        $db = connect();
    }
}
?>
