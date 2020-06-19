<?php
	include("../reportes_g/db/dbconn.php");
	include("../function/session.php");
include('../db/database_connection.php');
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Venta Mes Anterior VS mes Actual'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'No de Articulos'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});
		</script>


		<script language="javascript" type="text/javascript">
				function printDiv(divID) {
						//Get the HTML of div
						var divElements = document.getElementById(divID).innerHTML;
						//Get the HTML of whole page
						var oldPage = document.body.innerHTML;

						//Reset the page's HTML with div's HTML only
						document.body.innerHTML =
							"<html><head><title></title></head><body>" +
							divElements + "</body>";

						//Print Page
						window.print();

						//Restore orignal HTML
						document.body.innerHTML = oldPage;


				}
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
					<li>Bienvenido :&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
				</ul>
		</div>




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

<script src="../reportes_g/Highcharts-4.1.5/js/highcharts.js"></script>
<script src="../reportes_g/Highcharts-4.1.5/js/modules/data.js"></script>
<script src="../reportes_g/Highcharts-4.1.5/js/modules/exporting.js"></script>



<div id="rightcontent" style="position:absolute; top:14%;">
<div id="printablediv">
<div class="alert alert-info"><center><h2> Reportes Gráficos</h2></center></div>


<div id="container" style="width: 1020px; height: 400px; margin: 0 auto"></div>
<br>

	<div class="alert alert-info">
	<table id="datatable" class="table table-hover" style="background-color:;">

	<thead>
		<tr>

      <th>Nombre Producto</th>
      <th>Venta Mes Anterior</th>
      <th>Venta Mes Actual</th>
    </tr>
	</thead>
	<tbody>
    <?php
		$mes=date("Y-m");
      $query = $conn->query("SELECT pro.producto, sum(det.cantidad) as mes_anterior,sum(det.cantidad)-2 as mes_actual
from detalle_v det
INNER join venta ven on det.idventa=ven.idventa
INNER join producto pro on  det.idproducto=pro.idproducto
WHERE det.cantidad>1
GROUP by pro.producto")
       or die(mysqli_error());


      while($fetch = $query->fetch_array())
        {
        $name = $fetch['producto'];
        $amnt = $fetch['mes_anterior'];
        $o_date = $fetch['mes_actual'];

    ?>
    <tr>
      <td><?php echo $name; ?></td>
      <td><?php echo $amnt; ?></td>
      <td><?php echo $o_date; ?></td>
    </tr>
    <?php
      }
    ?>
	</tbody>



</table>
</div>
</div>
<div class='pull-right'>
<div class="add"><a onclick="javascript:printDiv('printablediv')" name="print" style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"></i> Imprimir Reporte</a></div>
</div>
</div>

	</body>
</html>
