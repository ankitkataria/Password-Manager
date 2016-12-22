<?php
	session_start();
	if(!isset($_SESSION['curr_user']))
		header("location:login_index.php");
	include("./assets/profile.php");
	include("./assets/add_pass.php")
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
			
				<?php 
					include("./assets/show_pass.php");
				?>
					        
			
	</div>

	<div class="over" id="over_add">
		<div class="add">
			<h1>Add/Update Password</h1>
			<div class="warning">
				<span style="color:red">Note</span> :If the entered Email-Id Already Exists Then It Will Be Overwritten.
			</div>
			<form class="addup form_temp" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				Email:<div class="err"> * <?php echo $emailErr;?></div><br>
				<input type="text" placeholder="foobar@example.com" name="email">
				Password:<div class="err"> * <?php echo $passErr;?></div><br>
				<input type="password" name="pass" placeholder="***********">
				Re-enter Password:<div class="err"> *</div><br>
				<input type="password" name="pass_check" placeholder="***********">
				<div id="btn_ctn">
					<input type="submit" class="add_up_btn btn" value="Add/Update" name="addup_sub"> 
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

			<form class="addup form_temp" method="post">
				Email:<div class="err"> * <?php echo $email2Err;?></div><br>
				<input type="text" placeholder="foobar@example.com" name="email2">
				Re-enter Email:<br>
				<input type="text" name="email2_check" placeholder="foobar@example.com">
				<div id="btn_ctn">
					<input type="submit" class="add_up_btn btn" value="Delete" name="del_sub">
				</div>
			</form>

			<button class="close_over">
			&times;
			</button>
		</div>
	</div>
	<div class="modErr"><?php echo $modErr;?></div>
	
	<script type="text/javascript">
	
	function show_pass(ctr){	
			var ele=document.getElementsByClassName("pass_field");
		
			var at=ele[ctr].getAttribute("type");
			if(at=='password')
				ele[ctr].setAttribute("type","text");
			else
				ele[ctr].setAttribute("type","password");
		}	

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

		<?php echo $modErrSc;?>

		


	});

	</script>



</body>
</html>