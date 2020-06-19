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
		<img src="img/banner1.jpg">
		<label>PYE Collection</label>
			<ul>
				<li><a href="#signup"   data-toggle="modal">Regístrate </a></li>
				<li><a href="#login"   data-toggle="modal">Iniciar sesión</a></li>
			</ul>

	</div>

	<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Iniciar sesión...</h3>
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
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
				cerrar</button>
					</form>
			</div>
		</div>

	<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Salir...</h3>
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
				<li><a href="privacy.php"><font size="5"><i class="icon-info-sign"></i>Acerca de</font></a></li>
<li><a href="Galeria.php"><font size="5"><i class="icon-info-sign"></i>Galeria</font></a></li>


	<li><a href="admin/admin_noticia.php"><font size="5"><i class="icon-info-sign"></i>Noticias</font></a></li>


			</ul>

	</div>




		<div id="content">
			<legend><h3>Política de privacidad
 </h3></legend>
				<p>respeta la privacidad de los visitantes del sitio web alphaware.com y de los sitios web locales relacionados con él, y tiene mucho cuidado para proteger su información. Esta política de privacidad le indica qué información recopilamos de usted, cómo podemos usarla. y los pasos que tomamos para asegurarnos de que esté protegido.
				</p>
			<hr>
				<h4>Protección de la información de los visitantes.
</h4>
					<p>Para proteger la información que nos proporciona visitando nuestro sitio web, hemos implementado varias medidas de seguridad. Su información personal está contenida detrás de redes seguras y solo es accesible para un número limitado de personas, que tienen derechos de acceso especiales y están obligados a mantener la información confidencial. Tenga en cuenta que siempre que proporcione información personal en línea existe un riesgo que terceros pueden interceptar y usar esa información. Si bien Alphaware se esfuerza por proteger la información personal y la privacidad de sus usuarios, no podemos garantizar la seguridad de la información que divulgue en línea y lo hace bajo su propio riesgo..</p>
			<hr>

				
			<hr>
				<h4>Política en línea
 </h4>
					<p>La Política de privacidad no se extiende a nada inherente al funcionamiento de Internet y, por lo tanto, está más allá del control de adidas, y no debe aplicarse de ninguna manera contraria a la ley aplicable o la regulación gubernamental. Esta política de privacidad en línea solo se aplica a la información recopilada a través de nuestro sitio web y no a la información recopilada sin conexión.

.</p>

		</div>
	<br />
</div>
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;">  &copy; <?php echo  Date("Y"); ?> </label>
			<p style="font-size:25px;"> PYE Collection </p>
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
