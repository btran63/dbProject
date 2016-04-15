<?php
    session_start();
?>
<html>
<head>
    <title>National Gymnastic Meet Contact Page</title>
    <link rel="stylesheet" type = "text/css" href = "main.css">
</head>
<body>
    <header><h1>Contact</h1></header>
            <ul id="menu">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="myteam.php">MyTeam</a><li>
            <a href="report.php">Report</a>
            </ul>
    <br>

<form action ="contact.php" method ="post">
    <ul> 
        <li> 
            <label for ="name">Name</label>
            <input type="text" name="name" id="name" required/></li>
        <li> 
            <label for ="email">Email</label>
            <input type="text" name="email" id="email" required/></li><br>
        <li> 
            <label for ="topic">Topic</label>
            <select name="topic"> 
                <option value ="schedule">Schedule an Event</option>
                <option value ="support">Technical Support</option>
                <option value ="ticket">Ticket Sales</option>
                <option value ="other">Other</option></select></li><br>
        <li> 
        <label for ="message">Type your message below. <br> 
        If you are reporting technical difficulties, please enter your operating system, browser type/version, and any other information that you think may be helpful.<br></label>
        <textarea name="message" id="message" cols="42" rows="9" required></textarea>
        </li><br>
        <li> 
        <input type="submit" value="Submit" id="email"/>
        </li>
    <ul>
</form>
            <ul id="contact">
            <li><a href="https://scontent.fhou1-2.fna.fbcdn.net/hphotos-xal1/v/l/t1.0-9/12313556_1041753215868752_6695584085920213377_n.jpg?oh=661313cfd1af0761321f1e10db5be913&oe=578720F8"><img src="./12313556_1041753215868752_6695584085920213377_n.jpg"></a>
                    <ul>
                        <li><a href="#Kent Taylor">Kent Taylor</a></li>
                        <li><a href="#Phone Number">Phone Number: XXX-XXX-XXXX</a></li>
                        <li><a href="#Email">Email Address: M00bs2P3cs@nationalgymmeet.info</a></li>
                    </ul>
            </li>
            <br>
            <li><a href="https://scontent.fhou1-2.fna.fbcdn.net/hphotos-xfp1/v/t1.0-9/11150526_919306578133416_8461172475397297888_n.jpg?oh=c605deecea03d8e4c8e68e0659e01bd2&oe=57730970"><img src="./11150526_919306578133416_8461172475397297888_n.jpg"></a>
                    <ul>
                        <li><a href="#Aaron Tedone">Aaron Tedone</a></li>
                        <li><a href="#Phone Number">Phone Number: XXX-XXX-XXXX</a></li>
                        <li><a href="#Email">Email Address: D0Y0U3v3nL1ft@nationalgymmeet.info</a></li>
                    </ul>
            </li>
            <br>
            <li><a href="https://scontent.fhou1-2.fna.fbcdn.net/hphotos-xfa1/v/t1.0-9/11091159_10152615891056152_8911970729619676855_n.jpg?oh=9e5355283eba177a334e86693d4bac65&oe=577A0363"><img src="./11091159_10152615891056152_8911970729619676855_n.jpg"></a>
                    <ul>
                        <li><a href="#Shah Zaib">Shah Zaib</a></li>
                        <li><a href="#Phone Number">Phone Number: XXX-XXX-XXXX</a></li>
                        <li><a href="#Email">Email Address: R3c1pe4Succ3ss@nationalgymmeet.info</a></li>
                    </ul>
            </li>
            <br>
            <li><a href="https://scontent.fhou1-2.fna.fbcdn.net/hphotos-xfp1/v/t1.0-0/p206x206/301368_258062200905184_825249961_n.jpg?oh=05127946584a472fe7cb1831bdd0f014&oe=5775A891"><img src="./301368_258062200905184_825249961_n.jpg"></a>
                    <ul>
                        <li><a href="#Brian Tran">Brian Tran</a></li>
                        <li><a href="#Phone Number">Phone Number: XXX-XXX-XXXX</a></li>
                        <li><a href="#Email">Email Address: 733tS3npai@nationalgymmeet.info</a></li>
                    </ul>
            </li>
            <br>            
            <li><a href="https://scontent.fhou1-2.fna.fbcdn.net/hphotos-xat1/v/t1.0-9/11665566_10152942033142967_2176484849873132696_n.jpg?oh=a260ee6e1ef57fe1acf50bc94ff2a689&oe=5786D568"><img src="./11665566_10152942033142967_2176484849873132696_n.jpg"></a>
                    <ul>
                        <li><a href="#Andrew Tang">Andrew Tang</a></li>
                        <li><a href="#Phone Number">Phone Number: XXX-XXX-XXXX</a></li>
                        <li><a href="#Email">Email Address: Y0uW0tM8t3@nationalgymmeet.info</a></li>
                    </ul>
            </li>
            <br>
            </ul>
</body>
</html>

<?php
//STORE TEXT VALUES IN VARIABLES
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['topic'];
$message = $_POST['message'];

//SEND EMAIL (we should create a gmail for National Gym Meet
mail("nationalgymmeet@gmail.com", $subject, "Name: '$name'\nEmail: '$email'\nMessage: " . $message, "");

echo "Email has been sent! <a href = "Homepage.html">Goto Homepage!</a>";
}
?>
