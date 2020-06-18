<?php

	include('../db/database_connection.php');

	if (isset($_POST['pay_now']))
{

	$cid = $_SESSION['id'];

	$total = $_POST['total'];
	$ivva= $_POST['iva'];
	$subtotall= $_POST['subtotal'];

	include ("random_code.php");
	$t_id = $r_id;
	$date = date("M d, Y");
	$que = $connect->query("INSERT INTO `adquisicion` (idadquisicion,idproveedor,subtotal,iva,total,estado,fecha) VALUES ('$t_id', '$cid', '$subtotall','$ivva','$total', 'EN ESPERA', '$date')") or die (mysqli_error());

	$p_id = $_POST['idproducto'];
	$oqty = $_POST['cantidad'];

			$i=0;
			foreach($p_id as &$pro_id){
				$connect->query("INSERT INTO `detalle_adqui` (`idproducto`, `cantidad`, `idadquisicion`) VALUES ('".($pro_id)."', '".($oqty[$i])."', '".($t_id)."')") or die(mysqli_error());

			$i++;
			}
	echo "<script>window.location = 'summary_adqui.php?tid= +".$t_id."'</script>";
	//header ("Location: summary.php?tid=$t_id");
	}
?>
