		<?php
		include('../db/database_connection.php');

		$t_id = $_GET['id'];

		$connect->query("UPDATE adquisicion SET estado = 'Confirmed' WHERE adquisicion_id = '$t_id'") or die(mysqli_error());


		$query2 = $connect->query("SELECT * FROM detalle_adqui LEFT JOIN product ON product.product_id = detalle_adqui.idproducto WHERE detalle_adqui.adquisicion_id = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch()){

		$pid = $row['product_id'];
		$oqty = $row['cantidad'];

		$query3 = $connect->query("SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error());
		$row3 = $query3->fetch();

		$stck = $row3['qty'];

		$stck_out = $stck + $oqty;

		$query = $connect->query("UPDATE stock SET qty = '$stck_out' WHERE product_id = '$pid'") or die(mysqli_error());
		}
		header("location: facturas_adqui.php");

		?>
