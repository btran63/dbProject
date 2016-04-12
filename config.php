<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $db_host = "localhost";
    $db_user = "Andrew";
    $db_pass = "password";
    $db_name = "gymnastics"//name of db;

    $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>