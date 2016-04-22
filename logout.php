<?php
session_start();
//on one of your pages you will have a logout button that redirects to /logout.php. This is the logout.php
session_unset();
session_destroy();
header('Location: index.php'); //refresh: 'number of seconds before redirecting'


?>
