<?php
include("function/session.php");
 include('db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faben Mobiliaria</title>
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header">
		<img src="img/logo.jpg">
		<label>Faben Mobiliaria</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysql_error());
					$fetch = $query->fetch ();
		     // $fetch = $connect->fetch(PDO::FETCH_ASSOC);

		?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>salir</a></li>
				<li><a href="#profile" href  data-toggle="modal">Bienvenido:&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
			</ul>
	</div>
<div id="container">


							<?php
 								$id = (int) $_SESSION['id'];
 								$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysql_error());
								$fetch = $query->fetch ();
								{
									$firstname=$fetch['nombre'];
 									$lastname=$fetch['apellido'];
									$address=$fetch['ciudad'];
									$country=$fetch['pais'];
 									$mobile=$fetch['cedula'];
									$telephone=$fetch['celular'];
									$email=$fetch['email'];
								
									$customerid=$fetch['idcliente'];
								}
							?>
				<div id="account">
					<form method="POST" action="function/edit_customer.php">
						<center>
						<h3>Editar mi cuenta</h3>
							<table>
								<tr>
									<td>Nombre:</td><td><input type="text" name="nombre" placeholder="Nombre" required value="<?php echo $firstname; ?>"></td>
								</tr>
 								<tr>
									<td>Apellido:</td><td><input type="text" name="apellido" placeholder="Apellido" required value="<?php  echo $lastname;?>"></td>
								</tr>
								<tr>
									<td>Ciudad:</td><td><input type="text" name="ciudad" placeholder="Ciudad" required value="<?php echo $address;?>"></td>
								</tr>
								<tr>
									<td>Pais:</td><td><input type="text" name="pais" placeholder="Pais" required value="<?php echo $country;?>"></td>
								</tr>
 								<tr>
									<td>Cedula:</td><td><input type="text" name="cedula" placeholder="Cedula" value="<?php echo $mobile;?>" maxlength="11"></td>
								</tr>
								<tr>
									<td>Celular:</td><td><input type="text" name="celular" placeholder="Celular" value="<?php echo $telephone;?>" maxlength="10"></td>
								</tr>
								<tr>
									<td>Email:</td><td><input type="email" name="email" placeholder="Email" required value="<?php echo $email;?>"></td>
								</tr>
								<tr>
									<td>Password</td><td><input type="password" name="password" placeholder="Password" required value=""></td>
								</tr>
								<tr>
									<td></td><td><input type="submit" name="edit" value="Guardar Cambios" class="btn btn-primary">&nbsp;<a href="home.php"><input type="button" name="cancel" value="Cancelar" class="btn btn-danger"></a></td>
								</tr>
							</table>
						</center>
					</form>
				</div>



	<br>

</div>
</body>
</html>
