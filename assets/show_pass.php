<?php
	
		$conn=new mysqli("localhost","root","toor","pass_man");
					if($conn->connect_error)
						die("some error occurred".$conn->connect_error);
					$result=$conn->query("select email,password from ".$_SESSION['curr_user'].";");
					//if($conn->query("select email,password from ".$_SESSION['curr_user'].";"))
					//    echo "did it";
					$i=0;
					//echo $result;
					if($result->num_rows>0)
					{
						echo "<table class='pass_table'>
							 		<tr>
										<th>Email Id</th>
										<th>Passwords</th>
									</tr>";
					    while($rw=$result->fetch_assoc())
						{	
							echo "
								<tr>
									<td>".$rw['email']."</td>
									<td><input class='pass_field' type='password' value='".$rw['password']."'>
									<button class='show_btn' onclick='show_pass($i)'>Show/Hide</button>	

									</td>
								</tr>
							";
							$i++;
						}
						echo "</table>";
				    }
				    else{
				    	echo "No passwords saved. Add A Password To Begin.";
				    }


?>