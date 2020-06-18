<?php


	include('db/database_connection.php');
	if (isset($_POST['cash']))
{
	$customer = $_POST['idcliente'];
	$product = $_POST['producto'];
	$total = $_POST['precio'];
	$destination = $_POST['destination'];


		$connect->query("INSERT INTO `ventas` (idcliente, producto, total, payment) VALUES ('$customer', '$product', $total, '$destination', 'COD')")
			or die (mysqli_error());
}
?>
