<?php
	include("function/session.php");
	 include('db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>AlphaWare</title>
	<link rel="icon" href="img/logo.jpg" />
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
		<label>alphaware</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch ();
			?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
			</ul>
	</div>

	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Mi cuenta</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id'];

								$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysqli_error());
								$fetch = $query->fetch ();
						?>
						<center>
					<form method="post">
						<center>
							<table>
								<tr>
									<td>Nombre:</td><td><input type="text" name="nombre" placeholder="Nombre" required value="<?php echo $nombre; ?>"></td>
								</tr>
 								<tr>
									<td>Apellido:</td><td><input type="text" name="apellido" placeholder="Apellido" required value="<?php  echo $apellido;?>"></td>
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
									<td>Password</td><td><input type="password" name="password" placeholder="Password" required value="<?php echo $password;?>"></td>
								</tr>
								<tr>
									<td></td><td><input type="submit" name="edit" value="Guardar Cambios" class="btn btn-primary">&nbsp;<a href="home.php"><input type="button" name="cancel" value="Cancelar" class="btn btn-danger"></a></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['idcliente']; ?>"><input type="button" class="btn btn-success" name="edit" value="Edit Account"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
					</form>
			</div>



	<br>
<div id="container">
	<div class="nav">
			 <ul>
				<li><a href="home.php"><font size="5">   <i class="icon-home"></i>Inicio</a></li>
				<li><a href="product1.php"> <font size="5">			 <i class="icon-th-list"></i>Productos</a></li>
				<li><a href="aboutus1.php">  <font size="5"> <i class="icon-bookmark"></i>Nosotros</a></li>
				<li><a href="contactus1.php"><font size="5"><i class="icon-inbox"></i>Contactos</a></li>
				<li><a href="privacy1.php"><font size="5"><i class="icon-info-sign"></i>Politica de privacidad</a></li>
				<li><a href="faqs1.php"><font size="5"><i class="icon-question-sign"></i>Compras Realizadas</a></li>
			</ul>
	</div>


		<img src="img/contactus.jpg" style="width:1150px; height:250px; border:1px solid #000; ">
	<br />
	<br />

		<div id="content">
			<form method="post">
				<table style="position:relative; left:25%;">
					<tr>
						<td style="font-size:20px;">Email:</td><td><input type="email" name="email" value="<?php echo $fetch['email']; ?>" style="width:400px;" disabled></td>
					</tr>
					<tr>
						<td style="font-size:20px;">Message:</td><td><textarea name="message" style="width:400px; height:300px;" required></textarea></td>
					</tr>
					<tr>
						<td></td><td><button class="btn btn-info" name="send" style="width:300px;"><i class="icon icon-ok icon-white"></i>Submit</button>&nbsp;<a href="index.php"><button class="btn btn-danger" style="width:110px;"><i class="icon icon-remove icon-white"></i>Cancel</button></a></td>
					</tr>
				</table>
			</form>
		</div>
		<?php


			if(isset($POST['send']));
			{
				@$email = $_POST['email'];
				@$message = $_POST['message'];

				$connect->query ("INSERT INTO `contact` (email, message) VALUES ('$email', '$message')") or die (mysqli_error());
			}
		?>

	<br />
</div>
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyrght &copy; <?php echo  Date("Y"); ?> </label>
			<p style="font-size:25px;">Faben Mobiliaria </p>
		</div>

			<div id="foot">
				<h4>Links</h4>
					<ul>
						<a href="http://www.facebook.com/alphaware"><li>Facebook</li></a>
						<a href="http://www.twitter.com/alphaware"><li>Twitter</li></a>
						<a href="http://www.pinterest.com/alphaware"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/alphaware"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
