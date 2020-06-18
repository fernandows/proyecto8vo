<?php
	include("function/session.php");
	 include('db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faben Mobiliaria</title>
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
		<label>Faben Mobiliaria</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch ();
			?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>Salir</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
			</ul>
	</div>

	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Mi Cuenta</h3>
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
									<td class="profile">Name:</td><td class="profile"><?php echo $fetch['nombre'];?>&nbsp;<?php echo $fetch['mi'];?>&nbsp;<?php echo $fetch['apellido'];?></td>
								</tr>
								<tr>
									<td class="profile">Address:</td><td class="profile"><?php echo $fetch['address'];?></td>
								</tr>
								<tr>
									<td class="profile">Country:</td><td class="profile"><?php echo $fetch['country'];?></td>
								</tr>
								<tr>
									<td class="profile">ZIP Code:</td><td class="profile"><?php echo $fetch['zipcode'];?></td>
								</tr>
								<tr>
									<td class="profile">Mobile Number:</td><td class="profile"><?php echo $fetch['mobile'];?></td>
								</tr>
								<tr>
									<td class="profile">Telephone Number:</td><td class="profile"><?php echo $fetch['telephone'];?></td>
								</tr>
								<tr>
									<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['idcliente']; ?>"><input type="button" class="btn btn-success" name="edit" value="Edit Account"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
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
		<img src="img/about1.jpg" style="width:1150px; height:250px; border:1px solid #000; ">
	<br />
	<br />


	<legend>Acerca de Nosotros</legend>
		<div id="content">
			<legend><h3>Misión</h3></legend>
					<h4 style="text-indent:60px;">Nos vemos como una empresa posicionada a nivel nacional e incursionando en el mercado internacional reconocida por su competitividad y productividad, comercializando productos de alto.</h4>
			<br />
				<legend><h3>Visión</h3></legend>
					<h4 style="text-indent:60px;">Fabenmobiliaria, the company that inspire, motivate, and give determination to the sports enthusiast.</h4>
			<br />

		</div>
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
						<a href="http://www.facebook.com/Faben Mobiliaria"><li>Facebook</li></a>
						<a href="http://www.twitter.com/Faben Mobiliaria"><li>Twitter</li></a>
						<a href="http://www.pinterest.com/Faben Mobiliaria"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/Faben Mobiliaria"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
