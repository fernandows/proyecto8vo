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
			<li><a href="reportes.php">Reportes</a>
				<ul>
					<li><a href="admin_a0.php" style="font-size:15px; margin-left:15px;">Mes Anterior</a></li>
					<li><a href="admin_a1.php" style="font-size:15px; margin-left:15px;">Ciudad</a></li>
					<li><a href="admin_a2.php"style="font-size:15px; margin-left:15px;">Top Clientes</a></li>
					<li><a href="admin_a3.php"style="font-size:15px; margin-left:15px;">Venta Anual</a></li>
					<li><a href="admin_a4.php"style="font-size:15px; margin-left:15px;">No Ventas</a></li>
				</ul>


			</li>
			<li><a href="parametro.php">Configuraciones</a></li>
		</ul>
	</div>

	<div id="rightcontent" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Reportes	</h2></center></div>
			<div class="alert alert-info">

				<form method="get" action="../reportes/reporte.php">
             <th>	<legend> Estado de la Facturas</legend></th>
            <tr style="font-size:16px;">
 						<th> <input type=date  id="fecha1" name="fecha1" ></th>
						 <th> <input type=date  id="fecha2" name="fecha2">	</th>
							</tr>
							<select name="estado">
							<option value="ENTREGADO">Entregado</option>
							<option  value="CONFIRMADO">Confirmado</option>
							<option  value="EN ESPERA">En Espera</option>
							</select>
         <?php
 			 					$fe11 = date("Y/m/d", strtotime('fecha1'));
							  $fe22 = date("Y/m/d", strtotime('fecha2'));
 							$query = $connect->query("SELECT COUNT(tra.idventa)as No_Facturas,cli.cedula,cli.nombre,cli.apellido,cli.ciudad, cli.celular, sum(tra.total) as Total
							FROM venta tra
							inner join clientes cli on cli.idcliente=tra.idcliente
							WHERE  tra.estado='estado'  and tra.fecha BETWEEN  '$fe11 00:00:00' and '$fe22 23:59:59'
							 GROUP by cli.cedula order by No_Facturas DESC") or die(mysqli_error());

							while(	$fetch = $query->fetch())
						{	$t_id = $fetch['idventa'];

						}
							?>
           <input id="prodId" name="idventa" type="hidden" value=0>
 				 		<button type="submit" class="btn btn-mini btn-info">Reporte por Estado</button>
						 	</thead>
        </form>

		<form method="get" action="../reportes/reporte_producto.php">

          <th>	<legend> Producto más/menos Vendidos</legend></th>
           <tr style="font-size:16px;">
					<th> <input type=date  id="fecha11" name="fecha11" ></th>
					 <th> <input type=date  id="fecha22" name="fecha22">	</th>
						</tr>
						<select name="producto">
						<option value="desc">Más Vendidos</option>
						<option  value="asc">Menos Vendidos</option>

						</select>
			 <?php
							$fe11 = date("Y/m/d", strtotime('fecha11'));
							$fe22 = date("Y/m/d", strtotime('fecha22'));
						$query = $connect->query("SELECT det.idproducto as Codigo, pro.producto,pro.precio,sum(det.cantidad) as Cantidad FROM
						detalle_v det
						INNER JOIN producto pro on pro.idproducto=det.idproducto
						INNER join venta fac on det.idventa=fac.idventa
						WHERE fac.fecha BETWEEN  '$fe11 00:00:00' and '$fe22 23:59:59'
						GROUP by det.idproducto
						order by cantidad desc
						limit 10") or die(mysqli_error());

						while(	$fetch = $query->fetch())
					{	$t_id = $fetch['idventa'];

					}
			?>
				 <input id="prodId" name="idventa" type="hidden" value=0>
					<button type="submit" class="btn btn-mini btn-info">Reporte por Producto</button>
    </form>
		<form method="get" action="../reportes/reporte_ciudad.php">

					<th>	<legend> Ciudad donde mas se realiza las compras</legend></th>
					 <tr style="font-size:16px;">
					<th> <input type=date  id="fecha11" name="fecha111" ></th>
					 <th> <input type=date  id="fecha22" name="fecha222">	</th>
						</tr>
						<select name="ciudad">
						<option value="desc">Más Vendidos</option>
						<option  value="asc">Menos Vendidos</option>

						</select>

				 <input id="prodId" name="idventa" type="hidden" value=0>
				<button type="submit" class="btn btn-mini btn-info">Reporte por Ciudad</button>
		</form>
    <form method="get" action="../reportes/reporte_fecha.php">
				 <th>	<legend> Dia más/menos de Ventas</legend></th>
				<tr style="font-size:16px;">
				<th> <input type=date  id="fecha1" name="fecha11" ></th>
				 <th> <input type=date  id="fecha2" name="fecha22">	</th>
					</tr>
					<select name="fech">
					<option value="asc">Menos Ventas</option>
					<option  value="desc">Más Ventas</option>

					</select>

			 <input id="prodId" name="idventa" type="hidden" value=0>
				<button type="submit" class="btn btn-mini btn-info">Ventas por dia</button>
					</thead>
		</form>
		<form method="get" action="../reportes/reporte_categoria.php">
				 <th>	<legend> Categoria más/menos de Ventas</legend></th>
				<tr style="font-size:16px;">
				<th> <input type=date  id="fecha11" name="fecha11" ></th>
				 <th> <input type=date  id="fecha21" name="fecha22">	</th>
					</tr>
					<select name="fech">
					<option value="asc">Menos Ventas</option>
					<option  value="desc">Más Ventas</option>

					</select>

			 <input id="prodId" name="idventa" type="hidden" value=0>
				<button type="submit" class="btn btn-mini btn-info">Ventas por dia</button>
					</thead>
		</form>
		<form method="get" action="../reportes/reporte_stock.php">

					<th>	<legend> Stock</legend></th>

						<select name="stock">
						<option value="asc">Ascedente</option>
						<option  value="desc">Descendente</option>

						</select>

				 <input id="prodId" name="idventa" type="hidden" value=0>
					<button type="submit" class="btn btn-mini btn-info">Generar Stock</button>
		</form>


			</div>



			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:16px;">
					<th>N_Factura</th>
					<th>Fecha</th>
					<th>Nombre</th>
					<th>Total </th>
					<th>Estado</th>

					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php



					$query = $connect->query("SELECT tra.idventa,tra.total,tra.estado,tra.fecha,cli.nombre,cli.apellido FROM venta tra inner join clientes cli on cli.idcliente=tra.idcliente
WHERE  tra.estado= 'ENTREGADO' and tra.fecha BETWEEN '2016-01-01 00:00:00' and  '2019-01-27 23:59:59'   ORDER by tra.fecha DESC") or die(mysqli_error());
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

				</tr>

				<?php
			}
				?>

				</tbody>
			</table>
			</div>
			</div>
			<?php
				$t_id = $_GET['tid'];

				if (isset($_POST['add']))
					{


			}
				?>




</body>
</html>
