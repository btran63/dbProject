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
        $stmt = $db->prepare('SELECT hash, admin FROM Users WHERE username = :username');
        $params = array(':username' => $username);
        $results = $stmt->execute($params);
        $values = $results->fetch(FETCH_ASSOC);
        $hash = $values['hash'];
        $admin = $values['admin'];
        if (password_verify($password, $hash)){
            $_SESSION['logged_in'] = true;
            if ($admin){
                $_SESSION['admin'] = true;
            }
            return null;
        }
        else {
            return 'Invalid username or password!';
        }
        
    }
    else{
        //Limiting the prospect of user enumeration by hashing the password anyway, to reduce the risk of timing-based attacks
        password_hash('ERROR', PASSWORD_BCRYPT)
    }
}
?>
