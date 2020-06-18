<?php
require_once("conexion/conexion.php");

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Detalle Stock</title>

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
                    name: 'Stock',
                    data: [
                        <?php

                        $sql = "SELECT p.producto,p.precio,cantidad FROM stock s INNER join producto p ON p.idproducto=s.idproducto WHERE cantidad >=0";
                        $res = mysqli_query($cn, $sql);
                        while($data = mysqli_fetch_array($res)){
                        ?>
                        ['<?php echo $data['producto'] ?>', <?php echo $data['cantidad'] ?>,<?php echo $data['precio'] ?>],
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
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<br><br>
<center><a href="ejemplo4.php"> Ver Siguiente </a></center>

</body>
</html>
