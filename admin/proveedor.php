<?php
	include("../function/session.php");

 include('../db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>PYE Collection</title>
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
	<script src="../javascripts/filter_c.js" type="text/javascript" charset="utf-8"></script>
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
	<div id="header" style="position:fixed;">
		<img src="/proyecto8vo/img/banner1.jpg">
		<label>PyE Collection</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = $connect->query ("SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch ();
			?>

			<ul>
				<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>Salir</a></li>
				<li>Bienvenido:&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>

	<br>
	<a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position:absolute;margin-left:270px; margin-top:155px; z-index:-1000;"><i class="icon-plus-sign icon-white"></i>Nuevo Proveedor</a>


		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Agregar Proveedor...</h3>
			</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
					<center>
						<table>

							<?php include("random_id.php");
							echo '<tr>
								<td><input type="hidden" name="idproveedor" value="'.$code.'" required></td>
							<tr/>';
							?>
							<tr>
								<td><input type="text" name="ruc" placeholder="ruc" style="width:250px;" required></td>
							<tr/>
							<tr>
								<td><input type="text" name="nombre" placeholder="nombre" style="width:250px;" maxLength="50" required></td>
							</tr>
							<tr>
								<td><input type="text" name="representante" placeholder="representante" style="width:250px;" maxLength="50" required></td>
							</tr>
							<tr>
								<td><input type="text" name="direccion" placeholder="direccion" style="width:250px;" maxLength="50" required></td>
							</tr>
							<tr>
								<td><input type="text" name="telefono" placeholder="telefono" style="width:250px;" maxLength="15" required></td>
							</tr>
							<tr>
								<td><input type="text" name="correo" placeholder="correo" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="text" name="detalle" placeholder="detalle" style="width:250px;" maxLength="50" required></td>
							</tr>

						</table>
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="add" value="Agregar">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					</form>
			</div>
		</div>

		<?php
			if (isset($_POST['add']))
				{
					$product_code = $_POST['idproveedor'];
					$ruc = $_POST['ruc'];
					$nombre = $_POST['nombre'];
					$representante = $_POST['representante'];
					$direccion = $_POST['direccion'];
					$telefono = $_POST['telefono'];
					$correo = $_POST['correo'];
					$detalle = $_POST['detalle'];

					$code = rand(0,98987787866533499);




				$q1 = $connect->query("INSERT INTO proveedor ( idproveedor,ruc, nombre, representante, direccion, telefono, correo,detalle)
				VALUES ('$product_code','$ruc','$nombre','$representante','$direccion', '$telefono', '$correo', '$detalle')");


				header ("location:proveedor.php");

		}

				?>

				<div id="leftnav">
					<ul>
						<li><a href="admin_home.php" style="color:#333;">Inicio</a></li>
						<li><a href="admin_feature.php">Productos</a>
							
						</li>

						<li><a href="customer.php">Clientes</a></li>
						<li><a href="proveedor.php">Proveedor</a></li>
						<li><a href="transaction.php">Ventas</a></li>
						<li><a href="facturas_adqui.php">Adquisiciones</a>
								<ul>
								<li><a href="admin_cart.php "style="font-size:15px; margin-left:15px;">Facturar</a></li>
								</ul>
						</li>
						<li><a href="message.php">Contáctanos</a></li>
						<li><a href="reportes.php">Reportes</a></li>
						<li><a href="parametro.php">Configuraciones</a></li>
					</ul>
				</div>

	<div id="rightcontent" style="position:absolute; top:14%;">
			<div class="alert alert-info"><center><h2>Proveedor</h2></center></div>
			<br />
			<fieldset>
	         <legend>Elige un color</legend>
	         <label>
						 	 <input type="radio" name="color" value="negro"> Buscar por Ruc
							 <input type="radio" name="color" value="azul"> Buscar por Nombre

	         </label>


	     </fieldset>
			 	<br />
				<label  style="padding:5px; float:left;"><input type="text" name="filter" placeholder="Buscar por nombre..." id="filter"></label>

			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Ruc</th>
					<th>Empresa</th>
					<th>Representante</th>

					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = $connect->query("SELECT * FROM `proveedor` ORDER BY idproveedor DESC") or die(mysqli_error());

					while($fetch = $query->fetch())
						{

						$idd = $fetch['idproveedor'];

				?>
				<tr class="del<?php echo $idd?>">
					<td><?php echo $fetch['ruc']?></td>
					<td><?php echo $fetch['nombre']?></td>
					<td><?php echo $fetch['representante']?></td>





					<td>

					<a href="admin_cart.php?ruc=<?php echo $fetch['ruc']?> & nombre=<?php echo $fetch['nombre']?> & representante=<?php echo $fetch['representante']?>  & direccion=<?php echo $fetch['direccion']?> ">+</a>



					</td>
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
