<?php
include 'config.php';

function userExists($username){
    $db = connect();
    $statement = $db->prepare('SELECT username FROM Users WHERE username = :username');
    $params = array(':username' => $username);
    $statement->execute($params); // Retrieving the results list here.
    $db = NULL; // Closing the connection
    if ($statement->rowCount()){
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
function isAdmin(){
    if (!isset($_SESSION['admin'])){
        return False;
    }
    elseif ($_SESSION['admin'] == true){
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
        $stmt->execute($params);
        $values = $stmt->fetch(PDO::FETCH_ASSOC);
        $hash = $values['hash'];
        $admin = $values['admin'];
        if (password_verify($password, $hash)){
            $_SESSION['username'] = $username;
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
function changePW($username, $newPassword){
    $db = connect();
    $hash = password_hash($newPassword, PASSWORD_BCRYPT);
    $params = array(':hash' => $hash, ':username' => $username);
    $stmt = $db->prepare('UPDATE Users SET hash = :hash WHERE username = :username');
    $stmt->execute($params);
}
function resetRandomPW($username){
    $pw = random_bytes(12); // even if the username does not exist, making the runtime equivalent helps reduce enumeration risks
    if (userExists($username)){
        changePW($username, $pw);
    }
    return $pw;
}

function usermailExists($usermail){
    $db = connect();
    $stmt = $db->prepare('SELECT username FROM Users WHERE email = :usermail');
    $params = array(':usermail' => $usermail);
    $stmt->execute($params);
    if ($stmt->rowCount()){
        return true;
    }
    else{
        return false;
    }
}

function getUsermailByUsername($username){
    $db = connect();
    $stmt = $db->prepare('SELECT email FROM Users WHERE username = :username');
    $params = array(':username' => $username);
    $stmt->execute($params);
    if ($stmt->rowCount()){
        $returnValue = $stmt->fetch(FETCH_ASSOC);// If the user exists, return the email
        return $returnValue['email'];
    } else{
        return null;
    }
}
function sendNewPassword($username, $pw){
    // Two things to consider:
    // 1. If the provided email has an account in the DB, send a new password.
    // 2. If not, send a link to the registration page, to limit user enumeration.
    $usermail = getUsermailByUsername($username);
    
    if ($usermail != null){
        $subject = 'National Gym Meets: Password Reset';
        $header  = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= 'To: '. $usermail . "\r\n";
        $header .= 'From: admin@nationalgymmeet.info' . "\r\n";
        $recipient = $usermail;

        $msg = '<p>Hello, and welcome back to National Gym Meets! We are sorry that you\'ve forgotten your password! Your credentials are available below.</p>';
        $msg = $msg . '<p>Username: <strong>' . $username . '</strong></p>';
        $msg = $msg . '<p>Password: <strong>' . $pw . '</strong></p>';
        
        mail($usermail, $subject, $msg, $header);
        return '<p>Check your email!</p>';
    }
    else{
        return '<p>Check your email!</p>';
    }
    
}
?>
