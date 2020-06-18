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
            type: 'pie'
        },
        title: {
            text: 'Top de Clientes con mas compras'
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

      <th>CLIENTE</th>
      <th>TOTAL EN COMPRAS</th>

    </tr>
	</thead>
	<tbody>
    <?php
		$mes=date("Y-m");
      $query = $conn->query("SELECT cli.nombre,cli.apellido,sum(ven.total) as total
FROM venta ven inner JOIN clientes cli ON cli.idcliente = ven.idcliente GROUP BY cli.idcliente ORDER BY total DESC")
       or die(mysqli_error());


      while($fetch = $query->fetch_array())
        {
        $name = $fetch['nombre'];
        $amnt = $fetch['total'];
        $o_date = $fetch['apellido'];

    ?>
    <tr>
      <td><?php echo $name,$o_date; ?></td>
      <td><?php echo $amnt; ?></td>

    </tr>
    <?php
      }
    ?>
	</tbody>
</table>
	</body>
</html>
