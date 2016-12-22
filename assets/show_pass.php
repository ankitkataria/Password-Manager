<?php
	
		$conn=new mysqli("localhost","root","toor","pass_man");
					if($conn->connect_error)
						die("some error occurred".$conn->connect_error);
					$result=$conn->query("select email,password from ".$_SESSION['curr_user'].";");
					//if($conn->query("select email,password from ".$_SESSION['curr_user'].";"))
					//    echo "did it";
					
					//echo $result;
					if($result->num_rows)
					{
					    while($rw=$result->fetch_assoc())
						{	
							echo "
								<tr>
									<td>".$rw['email']."</td>
									<td><input class='pass_field' type='password' value='".$rw['password']."'>
									<button class='show_btn'>Show/Hide</button>	

									</td>
								</tr>
							";
						}
				    }


?>