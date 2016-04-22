<?php
    session_start();
    include 'index_views.php';
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
			<?php
			if (!isLoggedIn()){
			    echo '<li><a href="login.php">Login</a></li>';
			}
			else{
			    echo '<li><a href="logout.php">Logout</a></li>';
			}
			?>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="myteam.php">MyTeam</a><li>
			<li><a href="report.php">Reports</a><li>
			</ul>
			<br><br>
			
			// About Us
			<hr align="left" width="50%">
            <h2>About Us</h2>
            <div>National Gym Meet is a project in order to create a functional database for the database class COSC3380 for University of Houston.</div>
            <div>This website is a project in order to make students learn about how databases and websites function when used together.</div>
            <hr align="left" width="50%">
            <img src="./static/homepic1.jpg" class="stockimg"><img src="./static/homepic2.jpg" class="stockimg"><img src="./static/homepic3.jpg" class="stockimg">
            <style type="text/css">
                .stockimg{
                    height:200px;
                    width:auto;
                }
            </style>    	
            // About Us ending
		
        <!--<h2>Events</h2> -->
       	<?php/*  
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
   	echo "<table id = t01><tr><th>Event Name</th><th>Event Date</th><th>Start Time</th><th>End Time</th></tr>";	//Table Headers
	   while($row = $results->fetch_assoc())
	   {
		  echo "<tr><td>" .$row["name"]. "</td><td>" .$row["date_started"]. "</td><td>" .$row["start_time"]. "</td><td>" .$row["end_time"]. "</td></tr>";
	   }
   }
   	   echo "</table>";
   	   $conn->close();
*/?>
</body>
</html>
