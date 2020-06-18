<?php

	if (isset($_POST['add_p']))
{


	$prod_id =$_POST['idproducto'];
	$cust_id =$_POST['idcliente'];

		$connect->query ("INSERT INTO cart (prod_id,cust_id)  VALUES ('$prod_id', '$cust_id')  ") or die(mysqli_error());

			header("location: product1.php");
}
?>
