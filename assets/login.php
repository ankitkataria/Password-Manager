<?php
	function test_input($data){
		$data=stripslashes($data);
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;

	}
	$error="";$userErr="";
	$user="";$pass="";

	$conn= new mysqli("localhost","root","toor","pass_man");
		if($conn->connect_error)
			$error="cant establish connection";
		else
			$error="connection established";

	if($_SERVER['REQUEST_METHOD']=="POST")
	{		
		$user=test_input($_POST['user']);
		$pass=test_input($_POST['pass']);
		$ctr=1;

		if(empty($user)||empty($pass))
		{	
		 	$userErr="All Fields are Compulsary";$ctr=0;
		}
	    else if(!preg_match('/^[a-zA-Z0-9_]*$/',$user))
        {
            $userErr="Invalid User Name";$ctr=0;
        }
        if($ctr==1)
        {
        	$sh=sha1($pass);
        	$q="select username,password from users where username='".$user."';";
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
        			$_SESSION['curr_user']=$row['username'];
        			//echo $row['username'];
                    header("location:profile_index.php");
        		}
        		else
        		{
        			$userErr="Incorrect Username/Password";
        		}
        	}
            else{
                $userErr="Incorrect Username/Password";
            }

        }


	}





	


?>