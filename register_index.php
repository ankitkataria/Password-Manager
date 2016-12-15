<!DOCTYPE html>
<html>
<head>
   <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body class="register">
	<div class="wrapper_register">
		<div class="main_head"><h1>Sign Up Now!</h1></div>
		<div class="main_body">
				<div class="registered">
					<h2 class="sign_up_head">Already A Registered User?</h2>
					Sign In
					<a href="#">Here</a>
				</div>
				<div class="new_user">
					<h2 class="sign_up_head"> New User? </h2>
					<form class="sign_up">    
						Email-Id:<br>
						<input type="text" name="email" placeholder="foobar@example.com"><br>
						Password:<br>
						<input type="password" name="pass" placeholder="***********"><br>
						Re-enter Password:<br>
						<input type="password" name="pass_check" placeholder="***********"><br>
						<div id="btn_ctn">
						<button type="submit" class="sign_up_btn">Sign Up</button>
						</div>
					</form>	
				</div>
		</div>		
	</div>
</body>
</html>