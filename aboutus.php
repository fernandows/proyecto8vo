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
				<h3 id="myModalLabel">Login...</h3>
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
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
			</div>
		</div>

	<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Sign Up Here...</h3>
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
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
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

		<img src="img/about1.jpg" style="width:1150px; height:250px; border:1px solid #000; ">
	<br />
	<br />

	<legend>Acerca de Nosotros</legend>
		<div id="content">
			<legend><h3>Misión</h3></legend>
					<h4 style="text-indent:60px;"> Nos vemos como una empresa posicionada a nivel nacional e incursionando en el mercado internacional reconocida por su competitividad y productividad, comercializando productos de alto.</h4>
			<br />
				<legend><h3>Visión</h3></legend>
					<h4 style="text-indent:60px;">Alphaware, the company that inspire, motivate, and give determination to the sports enthusiast.</h4>
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
						<a href="http://www.facebook.com/alphaware"><li>Facebook</li></a>
						<a href="http://www.twitter.com/alphaware"><li>Twitter</li></a>
						<a href="http://www.pinterest.com/alphaware"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/alphaware"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
