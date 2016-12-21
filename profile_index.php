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
	<div class="main">
		<nav class="profile_ind">
				
			<button class="nav" id="logout"><a href="./assets/logut.php">LogOut</a> </button> 
			<button class="nav" id="addup"><a href="#">Add/Update</a> </button>
			<button class="nav" id="del"><a href="#">Delete</a> </button>
		</nav>
		
		<div class="pass_table">
			<table class="pass_table">
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
	</div>

	<div class="over" id="over_add">
		<div class="add">
			<h1>Add/Update Password</h1>
			<div class="warning">
				<span style="color:red">Note</span> :If the entered Email-Id Already Exists Then It Will Be Overwritten.
			</div>
			<form class="addup form_temp">
				Email:<br>
				<input type="text" placeholder="foobar@example.com" name="email">
				Password:<br>
				<input type="password" name="pass" placeholder="***********">
				Re-enter Password:<br>
				<input type="text" name="pass_check" placeholder="***********">
				<div id="btn_ctn">
					<button type="submit" class="add_up_btn btn">Add/Update</button>
				</div>
			</form>
		</div>	
		<button class="close_over">
		&times;
		</button>		
	</div>
	<div id="over_del" class="over">
		<div class="delete">
			<h1>Delete Password</h1>
			<div class="warning">
				<span style="color:red">Note</span>:Enter the Email of the record to be deleted.This action cannot be reversed.
			</div>

			<form class="addup form_temp">
				Email:<br>
				<input type="text" placeholder="foobar@example.com" name="email">
				Re-enter Email:<br>
				<input type="text" name="pass" placeholder="foobar@example.com">
				<div id="btn_ctn">
					<button type="submit" class="add_up_btn btn">Delete</button>
				</div>
			</form>

			<button class="close_over">
			&times;
			</button>
		</div>
	</div>
	
	<script type="text/javascript">
		
	$(document).ready(function(){
		$("#addup").click(function(){
			$("#over_add").slideDown(500);
			$("#over_add").css({"display":"flex"});

		});
		$("#del").click(function(){
			$("#over_del").slideDown(500);
			$("#over_del").css({"display":"flex"});

		});
		$(".close_over").click(function(){
			$(".over").slideUp(500);

		});




	});

	</script>



</body>
</html>