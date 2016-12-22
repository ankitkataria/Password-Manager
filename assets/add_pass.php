<?php
	session_start();
		if(!isset($_SESSION['curr_user']))
		header("location:../login_index.php");
	$user=$_SESSION['curr_user'];
	//echo "$user";
	$emailErr="";
	$passErr="";
	$email="";$email2="";$email2_check="";$email2Err="";
	$pass="";
	$pass_check="";
	$ctr=1;$modErr="";
	$modErrSc="";

	function test_input($data){
		$data=stripslashes($data);
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	function record_exists($record_check){

            $co=new mysqli("localhost","root","toor","pass_man");
            if($co->connect_error)
                die("aborting connection".$co->connect_error);
            

            $res=$co->query("select email from ".$_SESSION['curr_user'].";");
           // if($co->query("select email from ".$_SESSION['curr_user'].";"))
           //     echo "successful";
           while($rw=$res->fetch_assoc())
            {
                if($rw['email']==$record_check)
                    {return true;}
            }

         // echo $res."something"; 
         //$rw=$res->fetch_assoc();
           //echo $rw;
            return false;
        }



	if(isset($_POST['addup_sub']))
	{
		//print_r($_POST);
		$email=test_input($_POST['email']);
		$pass=test_input($_POST['pass']);
		$pass_check=test_input($_POST['pass_check']);
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

        if($ctr==0)
        {
        	$modErr="You did not enter valid data. Please Try Again";
        	$modErrSc="
			$('.modErr').css({'opacity':'1'});
			$('.modErr').delay(1000).fadeOut(1000);

        	";
        }
        else{
        	$conn=new mysqli("localhost","root","toor","pass_man");
        	if($conn->connect_error)
        		die("some error".$conn->connect_error);

        	if(!record_exists($email))
        	{
        		$conn->query("insert into ".$_SESSION['curr_user']." values('$email','$pass');");
        	}
        	else
        	{
        		$conn->query("update ".$_SESSION['curr_user']." set password='$pass' where email='$email';");
        	}
        	$conn->close();
        }


	}
	else if(isset($_POST['del_sub']))
	{
		$email2=test_input($_POST['email2']);
		$email2_check=test_input($_POST['email2_check']);
		if(empty($email2)||empty($email2_check))
    	{
    		$ctr=0;
    		$email2Err="Field cannot be left empty";
    	}
    	if($email2!=$email2_check)
    		{	$ctr=0;
    		$email2Err="Emails don't match";
    		}
		//print_r($_POST);
		
    	if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
            $email2Err = "Invalid email format"; $ctr=0;
        }

        if($ctr==0)
        {
        	$modErr="You did not enter valid data. Please Try Again";
        	$modErrSc="
			$('.modErr').css({'opacity':'1'});
			$('.modErr').delay(1000).fadeOut(1000);

        	";
        }
        else{
        	$conn=new mysqli("localhost","root","toor","pass_man");
        	if($conn->connect_error)
        		die("some error".$conn->connect_error);

        	$conn->query("delete from ".$_SESSION['curr_user']." where email='$email2';");
        	$conn->close();
        }


	}

   




?>