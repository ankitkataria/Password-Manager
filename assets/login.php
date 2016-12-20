<?php
	function test_input($data){
		$data=stripslashes($data);
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;

	}
	$error="";$emailErr="";
	$email="";$pass="";

	$conn= new mysqli("localhost","root","toor","pass_man");
		if($conn->connect_error)
			$error="cant establish connection";
		else
			$error="connection established";

	if($_SERVER['REQUEST_METHOD']=="POST")
	{		
		$email=test_input($_POST['email']);
		$pass=test_input($_POST['pass']);
		$ctr=1;

		if(empty($email)||empty($pass))
		{	
		 	$emailErr="All Fields are Compulsary";$ctr=0;
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; $ctr=0;
        }
        if($ctr==1)
        {
        	$sh=sha1($pass);
        	$q="select password from users where email='".$email."';";
        	//echo $q;
        	//if($conn->query($q))
        	//	$error="successful man";
        	$result=$conn->query($q);
        	if($result->num_rows==1)
        	{
        		$row=$result->fetch_assoc();
        		//echo $row['password']." and ".$sh;
        		if($row['password']==$sh)
        		{
        			//$error="authentication complete";
        			session_start();
        			$_SESSION['curr_user']=$email;
        			header("location:profile_index.php");
        		}
        		else
        		{
        			$emailErr="Incorrect Username/Password";
        		}
        	}

        }


	}





	


?>