		<?php
		include('../db/database_connection.php');

		$t_id = $_GET['id'];


$connect->query("UPDATE venta SET estado = 'CONFIRMADO' WHERE idventa = '$t_id'") or die(mysqli_error());


		$query2 = $connect->query("SELECT producto.idproducto,detalle_v.cantidad as can, detalle_v.idventa  FROM detalle_v LEFT JOIN producto ON producto.idproducto = detalle_v.idproducto WHERE detalle_v.idventa = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch()){

		$pid = $row['idproducto'];
		$oqty = $row['can'];
    $trans_if = $row['idventa'];
		$query3 = $connect->query("SELECT * FROM stock WHERE idproducto = '$pid'") or die (mysqli_error());
		$row3 = $query3->fetch();

		$stck = $row3['cantidad'];

		$stck_out = $stck - $oqty;

		$query = $connect->query("UPDATE stock SET cantidad = '$stck_out' WHERE idproducto = '$pid'") or die(mysqli_error());


	   include('../function/customer_signup_confirmado.php');
		}
		header("location: transaction.php");

		?>
