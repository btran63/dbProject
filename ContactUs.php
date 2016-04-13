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