
<?php
	include("db/dbconn.php");
?>
<html>
    <head>
        <title>Estadistica</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/chartJS/Chart.min.js"></script>
    </head>
    <style>
        .caja{
            margin: auto;
            max-width: 250px;
            padding: 20px;
            border: 1px solid #FF0000;
        }
        .caja select{
            width: 100%;
            font-size: 16px;
            padding: 5px;
        }
        .resultados{
            margin: auto;
            margin-top: 40px;
            width: 1000px;
        }
    </style>
    <body>
        <div class="caja">
            <select onChange="mostrarResultados(this.value);">
                <?php
                    for($i=2015;$i< date("Y")+'1' ;$i++){
                        if($i == date("Y")){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
</div>
<BR>
<div>
						<center> <th>REPORTE VENTA TOTAL MENSUAL</th>	</center>

</div>

        <div class="resultados"><canvas id="grafico"></canvas></div>


				<table id="datatable">
				<center>	<thead>
						<tr>

				    <th>VENTA TOTAL ANUAL</th>

				    </tr>
					</thead></center>
					<tbody>
				    <?php
						$year=date("Y");
				      $query = $conn->query("SELECT SUM(ven.total) AS total
																			FROM venta ven
																			WHERE  YEAR(ven.fecha) = '$year-%' ")
				       or die(mysqli_error());


				      while($fetch = $query->fetch_array())
				        {
				        $name = $fetch['total'];


				    ?>
				    <tr>
				    <center>  <td><?php echo $name; ?></td></center>

				    </tr>
				    <?php
				      }
				    ?>
					</tbody>
				</table>
    </body>
    <script>
            $(document).ready(mostrarResultados(2018));
                function mostrarResultados(year){
                    $('.resultados').html('<canvas id="grafico"></canvas>');
                    $.ajax({
                        type: 'POST',
                        url: 'php/procesar.php',
                        data: 'year='+ year,

                        dataType: 'JSON',
                        success:function(response){
                            var Datos = {
                                    labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                    datasets : [
                                        {
                                            fillColor : 'rgba(15,72,127,1)', //COLOR DE LAS BARRAS
                                            strokeColor : 'rgba(255,0,0,0.8)', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : 'rgba(26,130,228,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : 'rgba(255,0,0,1)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                            data : response
                                        }
                                    ]
                                }
                            var contexto = document.getElementById('grafico').getContext('2d');
                            window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });
                            Barra.clear();
                        }
                    });
                    return false;
                }
    </script>
</html>
