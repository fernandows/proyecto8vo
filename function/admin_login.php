<?php

 include('../db/database_connection.php');


if (isset($_POST['enter']))

	{
		$email=$_POST['username'];

		$password=md5($_POST['password']);



    $result=$connect->query("SELECT * FROM admin WHERE username='$email' ") or die ('cannot login' . mysqli_error());
    $row=$result->fetch  ();
    //$run_num_rows = $result->num_rows;

  if ($result->rowCount() )
  {

    $pass = $row['password'];
if($pass==$pass)
{

  session_start ();
  $_SESSION['id'] = $row['adminid'];
  header ("location:admin_home.php");



}
else
{
  echo "<script>alert('Contraseña Incorrecta ')</script>";
  //header("location:home.php");
}
  }
	}

?>
