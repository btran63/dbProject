<form action ="Contact Us.php" method ="post">
<ul> 
<li> 
<label for ="name">Name</label>
<input type="text" name="name" id="name" required/>
</li>
<li> 
<label for ="email">Email</label>
<input type="text" name="email" id="email" required/>
</li><br>
<li> 
<label for ="topic">Topic</label>
<select> 
<option value ="schedule">Schedule an Event</option>
<option value ="support">Technical Support</option>
<option value ="ticket">Ticket Sales</option>
<option value ="other">Other</option>
</select>
</li><br>
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

<?php
if ($_POST[ContactUs.html]){

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
