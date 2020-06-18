<?php
	include("db/dbconn.php");
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Highcharts Example</title>

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
					text: 'Reporte de Ventas por ciudad'
			},
			yAxis: {
					allowDecimals: false,
					title: {
							text: 'Units'
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
</head>

	<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/data.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>





<table id="datatable">
	<thead>
		<tr>

      <th>Nombre Producto</th>
      <th>Total en Ventas </th>

    </tr>
	</thead>
	<tbody>
    <?php
		$mes=date("Y-m");
      $query = $conn->query("SELECT pro.idproducto,cli.ciudad ,pro.producto ,count( det.idventa) as Fac_Aparece , sum( det.cantidad) as No_Producto
			FROM detalle_v det
			INNER join venta tra on tra.idventa=det.idventa
			INNER JOIN producto pro on pro.idproducto=det.idproducto
			INNER join clientes cli on tra.idcliente=cli.idcliente

			GROUP by cli.ciudad order by No_Producto desc")
       or die(mysqli_error());


      while($fetch = $query->fetch_array())
        {
        $name = $fetch['ciudad'];

        $amnt = $fetch['Fac_Aparece'];
        $o_date = $fetch['No_Producto'];

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
	</body>
</html>
