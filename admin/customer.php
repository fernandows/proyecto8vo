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
				<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>salir</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a><i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>

	<br>

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
			<li><a href="reportes.php">Reportes</a>
				<ul>
					<li><a href="../reportes_g/grafico0.php" style="font-size:15px; margin-left:15px;">Mes Anterior</a></li>
					<li><a href="../reportes_g/grafico1.php" style="font-size:15px; margin-left:15px;">Año mas ventas</a></li>
					<li><a href="../reportes_g/grafico2.php"style="font-size:15px; margin-left:15px;">Clientes</a></li>
					<li><a href="../reportes_g/grafico3.php"style="font-size:15px; margin-left:15px;">Productos</a></li>
					<li><a href="../reportes_g/grafico4.php"style="font-size:15px; margin-left:15px;">No Ventas</a></li>
				</ul>


			</li>
			<li><a href="parametro.php">Configuraciones</a></li>
		</ul>
	</div>

	<div id="rightcontent" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Clientes</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Buscar..." id="filter"></label>
			<br />

		<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Nombre</th>
					<th>Ciudad</th>
					<th>Pais</th>

					<th>Cedula</th>
					<th>Celular</th>
					<th>Email</th>
				</tr>
				</thead>
				<?php
					$query = $connect->query("SELECT * FROM `clientes`") or die(mysqli_error());
					while($fetch = $query->fetch())
						{
				?>
				<tr>
					<td><?php echo $fetch['nombre'];?>&nbsp;<?php echo  $fetch['apellido'];?></td>
					<td><?php echo $fetch['ciudad']?></td>
					<td><?php echo $fetch['pais']?></td>

					<td><?php echo $fetch['cedula']?></td>
					<td><?php echo $fetch['celular']?></td>
					<td><?php echo $fetch['email']?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>

	</div>



</body>
</html>
