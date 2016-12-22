<?php

	function test_input($data){
		$data=stripslashes($data);
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;

	}

    function user_exists($user_check){

            $co=new mysqli("localhost","root","toor","pass_man");
            if($co->connect_error)
                die("aborting connection".$co->connect_error);


            $res=$co->query("select username,email,password from users");
            while($rw=$res->fetch_assoc())
            {
                if($rw['username']==$user_check)
                    return true;
            }
            return false;
   }
	 $q="";$error="";$alert="";
	 $emailErr="";$passErr="";$userErr="";

     $conn=new mysqli("localhost","root","toor");
     if($conn->select_db("pass_man")==false)
     	{
     		$q="create database pass_man;";
     		if($conn->query($q))
     			$error="the database is created";
     		else
     			$error="the database is not created"; 

     		$conn->select_db("pass_man");
     		$q2="create table users
			(	
            username varchar(100) not null,
			email varchar(100) not null,			
			password varchar(500) not null
			);
     		";
     		if($conn->query($q2))
     			$error="table created";
 			else
 				$error="table not created";    		
     	}
    else
    	$error="the database already exits";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $user=test_input($_POST['user']);
    	$email=test_input($_POST['email']);
    	$pass=test_input($_POST['pass']);
    	$pass_check=test_input($_POST['pass_check']);
    	$ctr=1;

        if(empty($user))
        {
            $userErr="Field cannot be empty";$ctr=0;
        }
        if(!preg_match('/^[a-zA-Z0-9_]*$/',$user))
        {
            $userErr="Invalid User Name";$ctr=0;
        }
    	if(empty($pass)||empty($pass_check))
    	{
    		$ctr=0;
    		$passErr="Field cannot be left empty";
    	}
    	if($pass!=$pass_check)
    		{	$ctr=0;
    		$passErr="Passwords don't match";
    		}
    	if(empty($email))
    	{
    		$emailErr="You should have an email";
    		$ctr=0;
    	}

    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; $ctr=0;
        }
        if(user_exists($user))
        {
            $userErr="Username already in use";
            $ctr=0;
        }

    	if($ctr==1)
    	{
    		$email_db="";$sh_db="";$user_db="";
    		$sh=sha1($pass);
    		$stmt=$conn->prepare("insert into users values(?,?,?);");
    		$stmt->bind_param("sss",$user_db,$email_db,$sh_db);
    		$email_db=$email;
            $user_db=$user;
    		$sh_db=$sh;
    		if($stmt->execute())
    			$error="value executed";

    		$stmt->close();
            $q2="create table ".$user."
            (   
            email varchar(50) not null,         
            password varchar(500) not null
            );
            ";
            //echo "$q2";
            if($conn->query($q2))
                {   $alert="<script>alert('Successfully registered. Proceed to Login Page.');</script>";
                    $error="table of user created";
                }
            else
            {   
                $alert="<script>alert('Some Error occurred. Please try again after some time.');</script>";
                $error="table of user not created";
            }

    	}
    	$conn->close();
    }
?>