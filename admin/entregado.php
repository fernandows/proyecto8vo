		<?php
$t_id = $_GET['id'];
$connect->query("UPDATE transaction SET order_stat = 'Entregado' WHERE transaction_id = '$t_id'") or die(mysqli_error());
include('../function/customer_signup_entregado.php');
	?>
