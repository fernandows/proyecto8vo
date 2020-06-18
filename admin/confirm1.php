		<?php
		include('../db/database_connection.php');

		$t_id = $_GET['id'];


$connect->query("UPDATE transaction SET order_stat = 'Confirmed' WHERE transaction_id = '$t_id'") or die(mysqli_error());


		$query2 = $connect->query("SELECT * FROM transaction_detail LEFT JOIN product ON product.product_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch()){

		$pid = $row['product_id'];
		$oqty = $row['order_qty'];

    $trans_if = $row['transaction_id'];
		$query3 = $connect->query("SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error());
		$row3 = $query3->fetch();

		$stck = $row3['qty'];

		$stck_out = $stck - $oqty;

		$query = $connect->query("UPDATE stock SET qty = '$stck_out' WHERE product_id = '$pid'") or die(mysqli_error());


	   include('../function/customer_signup_confirmacion.php');
		}
		header("location: transaction.php");

		?>
