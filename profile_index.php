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
	<link rel="stylesheet" type="text/css" href="./css/profile_style.css">
	<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
</head>
<body>
	<nav class="profile_ind">
			
		<button class="nav" id="logout"><a href="./assets/logut.php">LogOut</a> </button> 
		<button class="nav" id="addup"><a href="#">Add/Update</a> </button>
		<button class="nav id="del"><a href="#">Delete</a> </button>
	</nav>
	
	<div class="pass_table">
		<table>
			<tr>
				<th>Email Id</th>
				<th>Passwords</th>
			</tr>
			<tr>
					<td>Gmail</td>
					<td>dont know</td>
			</tr>		
			<tr>
					<td>Yahoo</td>
					<td>dont use</td>
			</tr>		
	        <tr>
					<td>Facebook</td>
					<td>dont want to use</td>
			</tr>		
	        	        



		</table>
	</div>



</body>
</html>