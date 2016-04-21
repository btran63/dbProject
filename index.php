<?php
    session_start();
?>
<html>
<header>
    <title>National Gymnastic Meet Home</title>
    <link rel="stylesheet" type = "text/css" href = "main.css">
</header>
<body>
    <header><a href="index.php"><img src="usable_logo.jpg"></a></header>
		
		<div id=nav>
		List of Current Meets</li><br>
		Register for a Meet</li><br>
		Edit Meet</li><br>
		Search Meet</li><br>
		</div>
			<ul id="menu">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="myteam.php">MyTeam</a><li>
			<li><a href="report.php">Reports</a><li>
			</ul>
			<br><br>
		
        <h2>Events</h2>
       	<?php  
  session_start();
  
  $servername = "localhost";
  $username = "andrew";
  $password = "password";
  $dbname = "gymnastics";
  
  //Create Connections
  $conn = new mysqli($servername, $username, $password, $dbname);
  //Check Connections
  if($conn->connect_error)
  {
	  die("Connections failed: " .$conn->connect_error);
  }
   $sql = "Select name, date_started, start_time, end_time"; //query to pull the name, date, start time, end time from event table
   $results = $conn->query($sql);
	   echo "<table>";					//making a table to store the data 
	   echo "<tr>";
	   echo "<td>Event Name</td>";
	   echo "<td>Event Date</td>";
	   echo "<td>Start Date</td>";
	   echo "<td>End Date</td>";
	   echo "</tr>";
   if ($results->num_rows > 0) 					//loops through and outputs each row
   {
	   while($row = $results->fetch_assoc())
	   {
		   echo "<tr>" .$row["name"]. "&nbsp" .$row["date_started"]. "&nbsp" .$row["start_time"]. "&nbsp" .$row["end_time"];	//don't know why this isn't working
	   }
   }
   	   echo "</table>";
   	   $conn->close();
?>
		<!--<h3>Individual Events</h3><br><h3>Team Events</h3>-->
</body>
</html>
