<?php

	function test_input($data){
		$data=stripslashes($data);
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;

	}
	 $q="";$error="";
	 $emailErr="";$passErr="";

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
			email varchar(50) not null,			
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
    	$email=test_input($_POST['email']);
    	$pass=test_input($_POST['pass']);
    	$pass_check=test_input($_POST['pass_check']);
    	$ctr=1;


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

    	if($ctr==1)
    	{
    		$email_db="";$sh_db="";
    		$sh=sha1($pass);
    		$stmt=$conn->prepare("insert into users values(?,?);");
    		$stmt->bind_param("ss",$email_db,$sh_db);
    		$email_db=$email;
    		$sh_db=$sh;
    		if($stmt->execute())
    			$error="value executed";

    		$stmt->close();

    	}
    	$conn->close();
    }
?>