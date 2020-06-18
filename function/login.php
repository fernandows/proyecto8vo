<?php

 include('db/database_connection.php');


if (isset($_POST['login']))

	{
		$email=$_POST['email'];
    
		$password=md5($_POST['password']);



    $result=$connect->query("SELECT * FROM clientes WHERE email='$email' ") or die ('cannot login' . mysqli_error());
    $row=$result->fetch  ();
    //$run_num_rows = $result->num_rows;

  if ($result->rowCount() )
  {

    $pass = $row['password'];
if($pass==$password)
{

  session_start ();
  $_SESSION['id'] = $row['idcliente'];
  header ("location:home.php");



}
else
{
  echo "<script>alert('Contraseña Incorrecta ')</script>";
  //header("location:home.php");
}
  }
	}

?>
