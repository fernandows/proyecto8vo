		<?php
		include('../db/database_connection.php');

		$t_id = $_GET['id'];


$connect->query("UPDATE venta SET estado = 'ENTREGADO' WHERE idventa = '$t_id'") or die(mysqli_error());



	   include('../function/customer_signup_entregado.php');

		header("location: transaction.php");

		?>
