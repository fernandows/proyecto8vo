<?php
	include('db/database_connection.php');

	if (isset($_POST['pay_now']))
{

	$cid = $_SESSION['id'];
  $total = $_POST['total'];
	$ivva= $_POST['iva'];
	$subtotall= $_POST['subtotal'];

	include ("random_code.php");
	$t_id = $r_id;
	$date = date("Y-m-d H:i:s");
	$que = $connect->query("INSERT INTO `venta` (idventa, idcliente, subtotal,iva,total,estado,fecha,deposito) VALUES ('$t_id', '$cid', '$subtotall','$ivva','$total', 'EN ESPERA', '$date','')") or die (mysqli_error());


	$p_id = $_POST['pid'];
	$oqty = $_POST['qty'];

			$i=0;
			foreach($p_id as &$pro_id){
		  $connect->query("INSERT INTO `detalle_v` (`idproducto`, `cantidad`, `idventa`) VALUES ('".($pro_id)."', '".($oqty[$i])."', '".($t_id)."')") or die(mysqli_error());
      $i++;
			}
	echo "<script>window.location = 'summary.php?tid= +".$t_id."'</script>";
	//header ("Location: summary.php?tid=$t_id");
	}
?>
