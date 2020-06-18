<?php
	include("../function/session.php");

 include('../db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faben Mobiliaria</title>
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
	<div id="header" style="position:fixed;">
		<img src="../img/logo.jpg">
		<label>Faben Mobiliaria</label>

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


		<a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position:absolute;margin-left:270px; margin-top:180px; z-index:-1000;"><i class="icon-plus-sign icon-white"></i>Agregar Producto</a>
		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Agregar Producto...</h3>
			</div>

		</div>

		<?php


				?>
				<div id="leftnav">
					<ul>
						<li><a href="admin_home.php" style="color:#333;">Inicio</a></li>
						<li><a href="admin_feature.php">Productos</a>
							<ul>
								<li><a href="admin_archiv.php" style="font-size:15px; margin-left:15px;">Archivadores</a></li>
								<li><a href="admin_cocina.php" style="font-size:15px; margin-left:15px;">Cocina</a></li>
								<li><a href="admin_closets.php" style="font-size:15px; margin-left:15px;">Closets</a></li>
								<li><a href="admin_escolar.php" style="font-size:15px; margin-left:15px;">Escolar</a></li>
								<li><a href="admin_football.php" style="font-size:15px; margin-left:15px;">Mesas</a></li>
								<li><a href="admin_recepcion.php"style="font-size:15px; margin-left:15px;">Recepciones</a></li>
								<li><a href="admin_salas.php"style="font-size:15px; margin-left:15px;">Salas</a></li>
								<li><a href="admin_running.php"style="font-size:15px; margin-left:15px;">Sillones</a></li>
								<li><a href="admin_product.php" style="font-size:15px; margin-left:15px;">Sillas</a></li>
							</ul>
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
			<div class="alert alert-info"><center><h2>Adquisicion DE PRODUCTOS</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Product here..." id="filter"></label>
			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>


						<tr>
							<th><h5>Cantidad</h5></td>
							<th><h5>Producto</h5></td>


							<th><h5>Precio</h5></td>

						</tr>


						<?php
						$t_id = $_GET['tid'];
						$query = $connect->query("SELECT * FROM adquisicion WHERE adquisicion_id = '$t_id'") or die (mysqli_error());
						$fetch = $query->fetch();

						$amnt = $fetch['total'];
					    $ivva = $fetch['iva'];
					    $sub = $fetch['subtotal'];

						$t_id = $fetch['adquisicion_id'];

						$query2 = $connect->query("SELECT * FROM detalle_adqui LEFT JOIN product ON product.product_id = detalle_adqui.idproducto WHERE detalle_adqui.adquisicion_id = '$t_id'") or die (mysqli_error());
						while($row = $query2->fetch()){

						$pname = $row['product_name'];
						$psize = $row['product_size'];
						$pprice = $row['product_price'];
						$oqty = $row['cantidad'];

						echo "<tr>";
						echo "<td>".$oqty."</td>";
						echo "<td>".$pname."</td>";

						echo "<td>".$pprice."</td>";
						echo "</tr>";
						}
						?>





				</thead>


			</table>

								<legend></legend>


								<center><h4>Subtotal      <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$sub; ?></h4></center>
									<legend></legend>
								<center><h4>Iva        <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$ivva; ?></h4></center>
									<legend></legend>
								<center><h4>TOTAL <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$amnt; ?></h4></center>

			</div>
			</div>

  <?php

  ?>
	  <?php

  ?>

</body>
</html>
<script type="text/javascript">
	$(document).ready( function() {

		$('.remove').click( function() {

		var id = $(this).attr("id");


		if(confirm("Are you sure you want to delete this product?")){


			$.ajax({
			type: "POST",
			url: "../function/remove.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$(".del"+id).fadeOut(2000, function(){ $(this).remove();});
			}
			});
			}else{
			return false;}
		});
	});

</script>
