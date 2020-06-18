<?php
	    include('../db/database_connection.php');

		include ("session.php");
			if(ISSET($_POST['edit']));
			{
				$id = $_SESSION['id'];
 				$firstname=$_POST['nombre'];
 				$lastname=$_POST['apellido'];
				$address=$_POST['ciudad'];
				$country=$_POST['pais'];
  			$mobile=$_POST['cedula'];
				$telephone=$_POST['celular'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$password2=md5($password);
				$connect->query("UPDATE clientes SET nombre='$firstname', apellido='$lastname', ciudad='$address',
							pais='$country', cedula='$mobile', celular='$telephone',
							email='$email', password='$password2' WHERE idcliente='$id' ") or die (mysqli_error());

					header("location:../home.php");
			}

	?>
