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
</body>
</html>
