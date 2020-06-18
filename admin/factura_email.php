
<?php
//error_reporting(E_ALL ^ E_NOTICE);
	include('../db/database_connection.php');


?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

	<br>


	<div id="rightcontent" style="position:absolute; top:10%;">



			<div class="alert alert-info">
			<form method="post" class="well"  style="background-color:#fff; overflow:hidden;">
	<div id="printablediv">



	<center>
	<table class="table" style="width:50%;">

	<label style="font-size:25px;">Faben Mobiliaria Inc.  </label>
  <label style="font-size:20px;">Recibo Oficial</label>
		<tr>
			<th><h5>Cantidad</h5></td>
			<th><h5>Producto</h5></td>
			<th><h5></h5></td>
			<th><h5>Precio</h5></td>
		</tr>

		<?php

    $t_id = '75';
		$query = $connect->query("SELECT * FROM venta WHERE idventa = '$t_id'") or die (mysqli_error());
		$fetch = $query->fetch();
    $amnt = $fetch['total'];
		$subtotal = $fetch['subtotal'];
		$ivva = $fetch['iva'];

		echo "Fecha: ". $fetch['fecha']."";

		$query2 = $connect->query("SELECT * FROM detalle_v LEFT JOIN producto ON producto.idproducto = detalle_v.idproducto WHERE detalle_v.idventa = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch()){

		$pname = $row['producto'];

		$pprice = $row['precio'];
		$oqty = $row['cantidad'];

		echo "<tr>";
		echo "<td>".$oqty."</td>";
		echo "<td>".$pname."</td>";
      echo "<td></td>";
		echo "<td>".$pprice."</td>";
		echo "</tr>";
		}
		?>

	</table>
	<legend></legend>
	<h7>Subtotal  <?php echo $subtotal; ?></h7>
	<legend></legend>
	<h7>Iva <?php echo $ivva; ?></h7>
	<legend></legend>
	<h4>TOTAL <?php echo $amnt; ?></h4>
	</center>
	</div>

	</form>s
			</div>
			</div>



</body>
</html>
