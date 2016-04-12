<?php
	session_start();
	require_once('config.php');

	$stmt = $db -> prepare("SELECT id, first_name FROM Users WHERE password = ?");
	$stmt->execute(array("what you want the ? to be"));
	$row = $stmt->fetch();

	//fetch only needed if pulling, execute is all you need for storing in DB
	//fetch returns the first row it finds only
	//fetchAll returns all rows
	//$row is an array. so the id above will be stored as $row[0], first_name will be $row[1].

	//if you return multiple rows (fetchAll) it is stored as a 2D array. first row's id will be $row[0][0]
	//second row's id is $row[1][0]

?>
<html>

<button value="hello" style="Display: 
		<?php if(isset($_SESSION['logged_in']){
			echo block;
		} else {
			echo none;
		} ?> 
	;">
<header>

</header>

<body>
<!--form methods should always be POST; !-->
<form action="/index.php" method="POST">
<?php
	if(isset($_POST['username']) && !empty($_POST['username'])){
		//check db for matching username and password
		//if they match after hashing the input
		$_SESSION['username'] = $_POST["username"];
		$_SESSION['logged_in'] = true;
	}
?>
<input type="text" name="username" placeholder="Username">
</form>
</body>
</html>