<html>
<head>
<title>National Gymnastic Meet Login Page</title>
<link rel="stylesheet" type = "text/css" href = "login.css">
</head>
<body>
<header><h1>Report</h1></header>

            <ul id = "menu">
            <li><a class="active" href="Homepage.html">Home</a></li>
            <li><a href="Login.html">Login</a></li>
            <li><a href="Registration.html">Registration</a></li>
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="MyTeam.html">MyTeam</a></li>
            <li><a href="Report.html">Report</a></li>
            </ul>
<br>
<br>

<?php
    session_start();
    require_once('config.php');
    echo "<h2>"
    $stmt = $db -> prepare("SELECT team_name FROM Teams WHERE userid")
    echo "</h2>"
    echo "<table>"
    echo "<tr>"
    echo "<td>"
    echo "</td>"
    echo "</tr>"
    echo "</table>"
?>