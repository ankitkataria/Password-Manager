<?php
	session_start();
	if(!isset($_SESSION['curr_user']))
		header("location:login_index.php");
	include("./assets/profile.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>	
	<button><a href="./assets/logut.php">Log Out</a> </button>

</body>
</html>