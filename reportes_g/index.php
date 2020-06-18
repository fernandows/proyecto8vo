<?php
require_once("conexion/conexion.php");
include("db/dbconn.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Prueba</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">
        ${demo.css}
    </style>
    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    //aqui agrego el nombre que le quiero poner al grafico....
                    text: '<strong>Detalle de Transacciones Clientes </strong><strong style="color: red;"> </strong>'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                //aqui agrego en data los parametros que contienen la tabla cliente como facil ...
                series: [{
                    type: 'pie',
                    name: 'Ordenes Cliente',
                    data: [
                        <?php

                        $sql = "SELECT cli.nombre,ven.total,ven.estado,ven.fecha
FROM venta ven inner JOIN clientes cli ON cli.idcliente = ven.idcliente ORDER BY ven.fecha DESC";
                        $res = mysqli_query($cn, $sql);
                        while($data = mysqli_fetch_array($res)){
                        ?>
                        ['<?php echo $data['nombre'] ?>', <?php echo $data['total'] ?>,'<?php echo $data['estado'] ?>'],
                        <?php
                        }
                        ?>
                    ]
                }]
            });
        }
      );


    </script>
</head>
<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<br><br>

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
      $query = $conn->query("SELECT cli.nombre,ven.total,ven.estado,ven.fecha
FROM venta ven inner JOIN clientes cli ON cli.idcliente = ven.idcliente ORDER BY ven.fecha DESC")
       or die(mysqli_error());


      while($fetch = $query->fetch_array())
        {
        $name = $fetch['nombre'];
        $amnt = $fetch['total'];
        $o_date = $fetch['total'];

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
