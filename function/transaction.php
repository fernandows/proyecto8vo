<?php

	if (isset($_POST['add']))
{


	$customer = $_POST['clientes'];
	$product = $_POST['producto'];
	$price = $_POST['precio'];
	$qty = $_POST['cantidad'];
	$amount = $_POST['total'];

		$connect->query ("INSERT INTO cart (prod_id,cust_id)  VALUES ('$prod_id', '$cust_id')  ") or die(mysqli_error());

			header("location: product1.php");
}
?>
