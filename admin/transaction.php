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

	<div id="rightcontent" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Transacciones	</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Buscar..." id="filter"></label>
			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:16px;">
					<th>ID</th>
					<th>Fecha</th>
					<th>Nombre</th>
					<th>Total </th>
					<th>Estado</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = $connect->query("SELECT tra.idventa,tra.total,tra.estado,tra.fecha,cli.nombre,cli.apellido FROM venta tra INNER JOIN clientes cli ON cli.idcliente = tra.idcliente ORDER by tra.fecha desc") or die(mysqli_error());
					while($fetch = $query->fetch())
						{
						$id = $fetch['idventa'];
						$amnt = $fetch['total'];
						$o_stat = $fetch['estado'];
						$o_date = $fetch['fecha'];

						$name = $fetch['nombre'].' '.$fetch['apellido'];
				?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $o_date; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $amnt; ?></td>
					<td><?php echo $o_stat; ?></td>


					<td><a href="receipt.php? tid=<?php echo $fetch['idventa']?> & estado=<?php echo $fetch['estado'] ?>">Ver</a>


					<?php
					if($o_stat == 'CONFIRMADO'){}
						elseif($o_stat == 'CANCELADO'){}
						elseif($o_stat == 'ENTREGADO'){}

			else{
					echo '| <a class="btn btn-mini btn-info" href="confirm.php?id='.$id.'">Confirmar</a> ';
					echo '| <a class="btn btn-mini btn-danger" href="cancel.php?id='.$id.'">Cancelar</a></td>';
					}
					?>
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
