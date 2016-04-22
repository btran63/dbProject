<?php
include 'config.php';

function userExists($username){
    $db = connect();
    $statement = $db->prepare('SELECT username FROM Users WHERE username = :username');
    $params = array(':username' => $username);
    $results = $statement->execute($params); // Retrieving the results list here.
    $db = NULL; // Closing the connection
    if ($db->rowCount()){
        return True;
    }
    else{
        return False;
    }
}
function isLoggedIn(){
    if (!isset($_SESSION['logged_in'])){
        return False;
    }
    elseif ($_SESSION['logged_in'] == true){
        return True;
    }
    else{
        return False;
    }
}
function loginRequested(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if ($_POST['loginSubmit']){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}
function login($username, $password){
    // Inputs: $username, $password
    // Outputs: If $username and password are valid credentials, returns a null object corresponding to no error message.
    // Otherwise, outputs a string to be output in the body of login.php
    if (userExists($username)){
        $db = connect();
        $stmt = $db->prepare('SELECT hash, admin FROM Users WHERE username = :username');
        $params = array(':username' => $username);
        $results = $stmt->execute($params);
        $values = $db->fetch(FETCH_ASSOC);
        $hash = $values['hash'];
        $admin = $values['admin'];
        if (password_verify($password, $hash)){
            $_SESSION['logged_in'] = true;
            if ($admin){
                $_SESSION['admin'] = true;
            }
            else{
                $_SESSION['admin'] = false;
            }
            return null;
        }
        else {
            return '<p>Invalid username or password!</p>';
        }
        
    }
    else{
        // Limiting the prospect of user enumeration by hashing the password anyway, to reduce the risk of timing-based attacks
        // Also serves to throttle botnet activity.
        password_hash('ERROR', PASSWORD_BCRYPT);
        return '<p>Invalid username or password!</p>';
    }
}
?>
