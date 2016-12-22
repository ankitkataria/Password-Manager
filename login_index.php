<?php
	session_start();
	if(isset($_SESSION['curr_user']))
		header("location:profile_index.php");
	include("./assets/login.php");
?>

<!DOCTYPE html>
<html>
<head>
   <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body class="register">
	<div class="wrapper_register">
		<div class="main_head"><h1>Login</h1></div>
		<div class="main_body">
				<div class="registered">
					<h2 class="sign_up_head">Not A Registered User?</h2>
					Sign In
					<a class="here_link" href="register_index.php">Here</a>
				</div>
				<div class="new_user">
					<h2 class="sign_up_head"> Sign In </h2>
					<form class="sign_up" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">    
						Username:<div class="err"> * <?php echo $userErr;?></div><br>
						<input type="text" name="user" placeholder="Monkey"     value="<?php echo $_POST['user'];?>">
						
						<br>
						Password:	<div class="err"> * <?php echo $passErr;?></div><br>
						<input type="password" name="pass" placeholder="***********">
						<br>
						<div id="btn_ctn">
						<button type="submit" class="sign_up_btn">Sign In</button>
						</div>
					</form>	
				</div>
		</div>	
		<div class="error"><?php echo $error; ?></div>	
	</div>
</body>
</html>