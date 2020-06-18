<?php
	include("function/login.php");
include("function/customer_signup.php");

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
			<ul>
				<li><a href="#signup"   data-toggle="modal">Registrarse</a></li>
				<li><a href="#login"   data-toggle="modal">Ingresar</a></li>
			</ul>
	</div>
		<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Ingresar...</h3>
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

		<div id="login1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Por favor regístrece antes de comprar...</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="email" name="email" placeholder="Email" style="width:250px;">
						<input type="password" name="password" placeholder="Password" style="width:250px;">
					</center>
				</div>
			<div class="modal-footer">
				<p style="float:left;">No Tienes una cuenta ? <a href="#signup" data-toggle="modal">Registrate aquí!</a></p>
				<input class="btn btn-primary" type="submit" name="login" value="Login">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrrar</button>
					</form>
			</div>
		</div>

		<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Registrate Aquí...</h3>
				</div>
					<div class="modal-body">
						<center>
					<form method="post">
						<input type="text" name="firstname" placeholder="Firstname" required>
						<input type="text" name="mi" placeholder="Middle Initial" maxlength="1" required>
						<input type="text" name="lastname" placeholder="Lastname" required>
						<input type="text" name="address" placeholder="Address" style="width:430px;"required>
						<input type="text" name="country" placeholder="Province" required>
						<input type="text" name="zipcode" placeholder="ZIP Code" required maxlength="4">
						<input type="text" name="mobile" placeholder="Mobile Number" maxlength="11">
						<input type="text" name="telephone" placeholder="Telephone Number" maxlength="8">
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						</center>
					</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
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
<a href=" https://play.google.com/store/apps/details?id=com.ar.augment&hl=es " target=”_blank”    > <img src=QRS/metav.png  alt=Descargar ALIGN=RIGHT  WIDTH=90 HEIGHT=90″ /> </a>

	<div class="nav1">
		<ul>
			<li><a href="archivadores.php" >Archivadores</a></li>
			<li>|</li>
			<li><a href="cocina.php">Cocina</a></li>
			<li>|</li>
			<li><a href="closets.php"  >Closets</a></li>
			<li>|</li>
			<li><a href="escolar.php" class="active" style="color:#111;" >Escolar</a></li>
			<li>|</li>
			<li><a href="football.php"   >Mesas</a></li>
			<li>|</li>
			<li><a href="recepciones.php">Recepciones</a></li>
			<li>|</li>
			<li><a href="salas.php">Salas</a></li>
			<li>|</li>
			<li><a href="running.php" >Sillones</a></li>
			<li>|</li>
			<li><a href="product.php">Sillas</a></li>

	</ul>
	</div>

	<div id="content">
		<br />
		<br />
		<div id="product">

			<?php

				$query = $connect->query("SELECT *FROM producto WHERE categoria='Escolar' ORDER BY idproducto DESC") or die (mysqli_error());

					while($fetch = $query->fetch())
						{

						$pid = $fetch['idproducto'];

						$query1 = $connect->query("SELECT * FROM stock WHERE idproducto = '$pid'") or die (mysql_error());
						$rows = $query1->fetch();

						$qty = $rows['cantidad'];
						if($qty < 1){

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
