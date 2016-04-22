<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $db_host = "localhost";
    $db_user = "Andrew";
    $db_pass = "password";
    $db_name = "gymnastics"//name of db;
    $allowedChars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!#$%&'*+-/=?^_`{|}~";
    $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // Defining a connect function which will help get around the GLOBALS issue re: using values defined here inside functions
    function connect(){
        $returnValue = new PDO('mysql:host=' . $GLOBALS["db_host"] . '; dbname=' . $GLOBALS["db_name"] . '; charset=utf8' , $GLOBALS["db_user"], $GLOBALS["db_pass"]);
        $returnValue->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $returnValue->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $returnValue;
        // Usage: $db = connect();
        // $stmt = $db->prepare(//Statement);
        // $params = array(':datata' => $datata)
        // $stmt->execute($params)
        // $row = $stmt->fetch(FETCH_ASSOC)
    }    

?>
