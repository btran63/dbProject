<html>
<head>
<title>National Gymnastic Meet Registration Page</title>
<link rel="stylesheet" type = "text/css" href = "login.css">
</head>
<body>
<header><h1>Registration</h1></header>

            <ul id = "menu">
            <li><a class="active" href="Homepage.html">Home</a></li>
            <li><a href="Login.html">Login</a></li>
            <li><a href="Registration.html">Registration</a></li>
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="MyTeam.html">MyTeam</a><li>
            <a href="Report.html">Report</a>
            </ul>
<br>
<br>
<section class="loginform cf">
<form name="Registration" action="submit.php" method="post" accept-charset="utf-8">
    <ul style = "list-style: none;">
        <li><label for="userfirstname">First Name</label>
        <input type="firstname" name="userfirstname" placeholder="FirstName" required></li><br>
        <li><label for="userlastname">Last Name</label>
        <input type="lastname" name="userlastname" placeholder="LastName" required></li><br>
        <li><label for="teamname">Team Name</label>
        <input type="teamname" name="teamname" placeholder="TeamName" required></li><br>
        <li><label for="usersex">Sex</label>
        <input type="sex" name="usersex" placeholder="M,F,O" maxlength ="1" required></li><br>
        <li><label for="userphone">Phone</label>
        <input type="phone" name="userphonw" placeholder="Phone Number" maxlength ="11" required></li><br>
        <li><label for="usermail">Email</label>
        <input type="email" name="usermail" placeholder="yourname@email.com" required></li><br>
        <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required></li><br>
        <li>
            <li><label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required></li><br>
        <li>
        <input type="submit" value="Login"></li>
    </ul>
</form>
</section>
</body>
</html>
