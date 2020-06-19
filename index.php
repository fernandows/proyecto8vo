<?php
	include("function/login.php");
  include("function/customer_signup.php");


?>
<!DOCTYPE html>
<html>
<head>
	<title>PYE Collection</title>
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
		<label>p Y E</label>
		<ul>
			<li><a href="admin/admin_home.php"><i "></i>Administrador</a></li>
		</ul>
			<ul>
				<li><a href="#signup"   data-toggle="modal">Registrarse</a></li>
				<li><a href="#login"   data-toggle="modal">Ingresar</a></li>
			</ul>
	</div>
		<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Ingresando...</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="email" name="email" placeholder="Email" style="width:250px;">
						<input type="password" name="password" placeholder="Password" style="width:250px;">
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="login" value="Login">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					</form>
			</div>
		</div>

		<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Registrate aquí...</h3>
				</div>
					<div class="modal-body">
						<center>
					<form method="post">
						<input type="text" name="nombre" placeholder="Ingrese los nombres" required><br>
 						<input type="text" name="apellido" placeholder="Ingrese los apellidos" required><br>
						<input type="text" name="ciudad" placeholder="Ingrese la ciudad de residencia" required><br>
						<input type="text" name="pais" placeholder="Ingrese el pais de residencia" required><br>
 						<input type="text" name="cedula" placeholder="Ingrese el numero de cedula sin espacios" maxlength="10"><br>
						<input type="text" name="celular" placeholder="Ingrese un número de celular" maxlength="10"><br>
						<input type="email" name="email" placeholder="Ingrese un correo" required><br>
						<input type="password" name="password" placeholder="Contraseña" required><br>

						</center>
					</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="signup" value="Registrarse">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				</div>
					</form>
			</div>
	<br>
<div id="container">
	<div class="nav">

			 <ul>
				<li><a href="index.php"><font size="5"><i class="icon-home"></i>Inicio</font>  </a></li>
				<li><a href="product.php"><font size="5"><i class="icon-th-list"></i>Productos</font></a>
				<li><a href="aboutus.php"><font size="5"><i class="icon-bookmark"></i>Nosotros</font></a></li>
				<li><a href="contactus.php"><font size="5"><i class="icon-inbox"></i>Contactanos</font></a></li>
				<li><a href="privacy.php"><font size="5"><i class="icon-info-sign"></i>Politicas de la Empresa</font></a></li>
				<li><a href="faqs.php"><font size="5"><i class="icon-question-sign"></i>Preguntas Frecuentes</font></a></li>
			</ul>
	</div>

	<div id="carousel">
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
				<div class="active item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner2.jpg" class="carousel"></div>
				<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner1.jpg" class="carousel"></div>
				<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner3.jpg" class="carousel"></div>
			</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
	</div>




	<div id="content">
		<div id="product" style="position:relative; margin-top:30%;">
			<center><h2>
			  <legend>Productos más Solicitados</legend></h2></center>
			<br />

			<?php

				$query = $connect->query("SELECT * FROM producto ORDER BY idproducto DESC") or die (mysqli_error());

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
							echo " ".$fetch['producto']."";
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
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;">  &copy; <?php echo  Date("Y"); ?> </label>
			<p style="font-size:25px;">PYE Collection  </p>
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
