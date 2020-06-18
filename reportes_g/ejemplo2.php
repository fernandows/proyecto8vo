<?php

require_once("conexion/conexion.php");

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Productos Mas Vendidos</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">
        ${demo.css}
    </style>
    <script type="text/javascript">
        $(function () {

            $('#container').highcharts({
                chart: {
                    type: 'line',
                    marginRight: 200
                },
                title: {
                    text: '<strong>Productos Mas Vendidos</strong>',
                    x: -50
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b> ({point.y:,.0f})',
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                            softConnector: true
                        }
                    }
                },
                legend: {
                    enabled: false
                },
                series: [{
                    name: 'Producto',
                    data: [

                        <?php
                        $sql = "SELECT td.idproducto, producto, precio, SUM(td.cantidad) as total_vendidos FROM detalle_v td, producto p, venta t WHERE td.idproducto = p.idproducto GROUP BY td.idproducto ORDER BY producto limit 10";
                        $res = mysqli_query($cn, $sql);
                        while($data = mysqli_fetch_array($res)){
                        ?>
                        ['<?php echo $data['producto'] ?>', <?php echo $data['total_vendidos'] ?>],

                        <?php
                        }
                        ?>

                    ]
                }]
            });
        });
    </script>
</head>
<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/funnel.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 410px; max-width: 600px; height: 400px; margin: 0 auto"></div>
<br><br>
<center><a href="ejemplo3.php">Ver ejemplo 3</a></center>
</body>
</html>
