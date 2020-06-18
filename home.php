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

					$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch();
			?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>Salir</a></li>
				<li>Bienvenido:&nbsp;&nbsp;&nbsp;<a href="#profile" href  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
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
									<td class="profile">Nombre:</td><td class="profile"><?php echo $fetch['nombre'];?>&nbsp;<?php echo $fetch['apellido'];?></td>
								</tr>
								<tr>
									<td class="profile">Ciudad:</td><td class="profile"><?php echo $fetch['ciudad'];?></td>
								</tr>
								<tr>
									<td class="profile">Pais:</td><td class="profile"><?php echo $fetch['pais'];?></td>
								</tr>

								<tr>
									<td class="profile">Cedula:</td><td class="profile"><?php echo $fetch['cedula'];?></td>
								</tr>
								<tr>
									<td class="profile">Celular:</td><td class="profile"><?php echo $fetch['celular'];?></td>
								</tr>
								<tr>
									<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['idcliente']; ?>"><input type="button" class="btn btn-success" name="edit" value="Editar"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				</div>
					</form>
			</div>




	<br>
<div id="container">




	<div id="content">
		<div class="nav">
				 <ul>
					<li><a href="home.php"> <font size="5">  <i class="icon-home"></i>Inicio</a></li>
					<li><a href="product1.php"> <font size="5">			 <i class="icon-th-list"></i>Producto</a></li>
					<li><a href="aboutus1.php"><font size="5">   <i class="icon-bookmark"></i>Acerca de Nosotros</a></li>
					<li><a href="contactus1.php"><font size="5"><i class="icon-inbox"></i>Contactanos</a></li>
					<li><a href="privacy1.php"><font size="5"><i class="icon-info-sign"></i>Politicas de la Empresa</a></li>
					<li><a href="faqs1.php"><font size="5"><i class="icon-question-sign"></i>FAQs</a></li>
				</ul>
		</div>
		</div>

		<div id="carousel">
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="active item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner2.jpg" class="carousel"></div>
					<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner3.jpg" class="carousel"></div>
					<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner1.jpg" class="carousel"></div>
				</div>
					<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		 </div>



		<div id="product" style="position:relative; margin-top:30%;">
			<center><h2><legend>Productos más Vendidos</legend></h2></center>
			<br />

			<?php

				$query = $connect->query("SELECT *FROM producto  ORDER BY idproducto DESC") or die (mysqli_error());

					while($fetch = $query->fetch())
						{

						$pid = $fetch['idproducto'];

						$query1 = $connect->query("SELECT * FROM stock WHERE idproducto = '$pid'") or die (mysqli_error());
						$rows = $query1->fetch();

						$qty = $rows['cantidad'];
						if($qty <= 1){

						}else{
							echo "<div class='float'>";
							echo "<center>";
							echo "<a href='details.php?id=".$fetch['idproducto']."'><img class='img-polaroid' src='photo/".$fetch['imagen']."' height = '300px' width = '300px'></a>";
							echo "".$fetch['producto']."";
							echo "<br />";
								echo "PVP: ".$fetch['precio']."";
							echo "<br />";

							echo "Disponibles ".$qty."";
							echo "<br />";
							echo "</center>";
							echo "</div>";
						}

						}
			?>
		</div>


	</div>

		<br />
</div>
<br />
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
