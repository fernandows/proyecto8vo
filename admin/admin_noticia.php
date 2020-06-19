<?php
	include("../function/session.php");
	 include('../db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>P Y E</title>
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/carousel.js"></script>
	<script src="../js/button.js"></script>
	<script src="../js/dropdown.js"></script>
	<script src="../js/tab.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/popover.js"></script>
	<script src="../js/collapse.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/scrollspy.js"></script>
	<script src="../js/alert.js"></script>
	<script src="../js/transition.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>
	<script src="../jscript/jquery-1.9.1.js" type="text/javascript"></script>

		<!--Le Facebox-->
		<link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
		<script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
		<script src="../facefiles/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox()
		})
		</script>
</head>
<body>




	<body>
	<div id="header">
		<img src="img/banner1.jpg">
		<label>PyE Collection</label>
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
				<li><a href="privacy.php"><font size="5"><i class="icon-info-sign"></i>Acerca de</font></a></li>
<li><a href="Galeria.php"><font size="5"><i class="icon-info-sign"></i>Galeria</font></a></li>


	<li><a href="proyecto8vo/admin/admin_noticia.php"><font size="5"><i class="icon-info-sign"></i>Noticias</font></a></li>


			</ul>


			
	</div>

		<?php
			if (isset($_POST['add']))
				{
					$product_code = $_POST['noticiaid'];
					$product_name = $_POST['titulo'];
					$product_price = $_POST['contenido'];


					$category = $_POST['categoria'];

					$code = rand(0,98987787866533499);

								$name = $code.$_FILES["imagen"] ["name"];
								$type = $_FILES["imagen"] ["type"];
								$size = $_FILES["imagen"] ["size"];
								$temp = $_FILES["imagen"] ["tmp_name"];
								$error = $_FILES["imagen"] ["error"];

								if ($error > 0){
									die("Error en cargar archivo! Codigo $error.");}
								else
								{
									if($size > 30000000000) //conditions for the file
									{
										die("Formato no valido!");
									}
									else
									{
										move_uploaded_file($temp,"../photo/".$name);


				$q1 = $connect->query("INSERT INTO noticia ( noticiaid,titulo, contenido, imagen, categoria)
				VALUES ('$product_code','$product_name','$product_price','$name', '$category')");



				header ("location:admin_noticia.php");
			}}
		}

				?>

				





	<div id="rightcontent" style="position:absolute; top:14%;">
			<div class="alert alert-info"><h2> Noticias</h2></div>
		
			
			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
						
					<th></th>
					<th>Titulo</th>
					<th>Contenido</th>

					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = $connect->query("SELECT * FROM `noticia` ORDER BY noticiaid DESC") or die(mysqli_error());
					while($fetch = $query->fetch())
						{
						$id = $fetch['noticiaid'];
				?>
				<tr class="">
					
					<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['imagen']?>" height = "800px" width = "800spx"></td>
					<td><?php echo $fetch['titulo']?></td>
					<td><?php echo $fetch['contenido']?></td>

					
				</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>
			</div>


</body>
</html>
