<?php
	include("db/dbconn.php");
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Productos Disponibles</title>
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
	</head>
	<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/data.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table id="datatable">
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
	</body>
</html>
