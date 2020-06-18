<?php

 include('database_connection.php');

if (isset($_POST['login']))

	{
		$email=$_POST['email'];
		$password=$_POST['password'];

		
			$result=$connect->query("SELECT * FROM customer WHERE email='$email' AND password='$password' ")
				or die ('cannot login' . mysqli_error());
			$row=$result->fetch();
			//$run_num_rows = $result->num_rows;
							
						if ($result->rowCount())
						{
							session_start ();
							$_SESSION['id'] = $row['customerid'];
							header ("location:home.php");
						}
						
						else
						{
							echo "<script>alert('Invalid Email or Password')</script>";
							header("location:home.php");
						}
	}

?>