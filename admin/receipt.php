<?php
error_reporting(E_ALL ^ E_NOTICE);

	include("../function/session.php");
	include('../db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faben Mobiliaria</title>
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/carousel.js"></script>
	<script src="../js/button.js"></script>
	<script src="../js/dropdown.js"></script>
	<script src="../js/tab.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/popover.js"></script>
	<script src="../js/collapse.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/scrollspy.js"></script>
	<script src="../js/alert.js"></script>
	<script src="../js/transition.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>
	<script src="../jscript/jquery-1.9.1.js" type="text/javascript"></script>

		<!--Le Facebox-->
		<link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
		<script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
		<script src="../facefiles/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox()
		})
		</script>

		<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML =
              "<html><head><title></title></head><body>" +
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;


        }
		</script>
</head>
<body>
	<div id="header" style="position:fixed;">
		<img src="../img/logo.jpg">
		<label>Faben Mobiliaria</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = $connect->query ("SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch ();
			?>

			<ul>
				<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>Salir</a></li>
				<li>Bienvenido:&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>

	<br>









	<div id="leftnav">
		<ul>
			<li><a href="admin_home.php" style="color:#333;">Inicio</a></li>
			<li><a href="admin_feature.php">Productos</a>
				<ul>
					<li><a href="admin_archiv.php" style="font-size:15px; margin-left:15px;">Archivadores</a></li>
					<li><a href="admin_cocina.php" style="font-size:15px; margin-left:15px;">Cocina</a></li>
					<li><a href="admin_closets.php" style="font-size:15px; margin-left:15px;">Closets</a></li>
					<li><a href="admin_escolar.php" style="font-size:15px; margin-left:15px;">Escolar</a></li>
					<li><a href="admin_football.php" style="font-size:15px; margin-left:15px;">Mesas</a></li>
					<li><a href="admin_recepcion.php"style="font-size:15px; margin-left:15px;">Recepciones</a></li>
					<li><a href="admin_salas.php"style="font-size:15px; margin-left:15px;">Salas</a></li>
					<li><a href="admin_running.php"style="font-size:15px; margin-left:15px;">Sillones</a></li>
					<li><a href="admin_product.php" style="font-size:15px; margin-left:15px;">Sillas</a></li>
				</ul>
			</li>

			<li><a href="customer.php">Clientes</a></li>
			<li><a href="proveedor.php">Proveedor</a></li>
			<li><a href="transaction.php">Ventas</a></li>
			<li><a href="facturas_adqui.php">Adquisiciones</a>
					<ul>
					<li><a href="admin_cart.php "style="font-size:15px; margin-left:15px;">Facturar</a></li>
					</ul>
			</li>
			<li><a href="message.php">Contáctanos</a></li>
			<li><a href="reportes.php">Reportes</a></li>
			<li><a href="parametro.php">Configuraciones</a></li>
		</ul>
	</div>

	<div id="rightcontent" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Transacciones	</h2></center></div>
			<br />


			<div class="alert alert-info">
			<form method="post" class="well"  style="background-color:#fff; overflow:hidden;">
	<div id="printablediv">



	<center>
	<table class="table" style="width:50%;">

	<label style="font-size:25px;">   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFaben Mobiliaria Inc.  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="../img/logo60.png">   </label>


	<label style="font-size:20px;">Recibo Oficial</label>
		<tr>
			<th><h5>Cantidad</h5></td>
			<th><h5>Producto</h5></td>
			<th><h5></h5></td>
			<th><h5>Precio</h5></td>
		</tr>

		<?php

		$t_id = $_GET['tid'];

		$query = $connect->query("SELECT * FROM venta WHERE idventa = '$t_id'") or die (mysqli_error());
		$fetch = $query->fetch();

		$amnt = $fetch['total'];
		$subtotal = $fetch['subtotal'];
		$ivva = $fetch['iva'];

		echo "Fecha: ". $fetch['fecha']."";

		$query2 = $connect->query("SELECT * FROM detalle_v LEFT JOIN producto ON producto.idproducto = detalle_v.idproducto WHERE detalle_v.idventa = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch()){

		$pname = $row['producto'];

		$pprice = $row['precio'];
		$oqty = $row['cantidad'];

		echo "<tr>";
		echo "<td>".$oqty."</td>";
		echo "<td>".$pname."</td>";
		echo "<td>&nbsp&nbsp&nbsp&nbsp</td>";
		echo "<td>".$pprice."</td>";
		echo "</tr>";
		}
		?>

	</table>
	<legend></legend>
	<h7>Subtotal  <?php echo "&nbsp&nbsp&nbsp&nbsp".$subtotal; ?></h7>
	<legend></legend>
	<h7>Iva <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$ivva; ?></h7>
	<legend></legend>
	<h4>TOTAL <?php echo "&nbsp&nbsp&nbsp&nbsp".$amnt; ?></h4>
	</center>
	</div>

	<?php


  $estado = $_GET['estado'];
	$id=$_GET['tid'];
	if($estado == 'CONFIRMADO'){echo '| <a class="btn btn-mini btn-info" href="confirm_entrega.php?id='.$id.'">Confirmar Entrega</a> ';}
elseif($estado == 'CANCELADO'){    }
elseif($estado == 'ENTREGADO'){     }
else{
	echo '| <a class="btn btn-mini btn-info" href="confirm.php?id='.$id.'">Confirmar Deposito</a> ';
  echo '| <a class="btn btn-mini btn-danger" href="cancel.php?id='.$id.'">Cancelar</a></td>';

        }


	?>
	<div class='pull-right'>
	<div class="add"><a onclick="javascript:printDiv('printablediv')" name="print" style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"></i> Imprimir Recibo</a></div>
	</div>
	</form>



	<table class="table table-hover" style="background-color:;">
		<thead>
		<tr style="font-size:20px;">
			<th>Deposito </th>
    </tr>
		</thead>
		<tbody>
		<?php

			$query = $connect->query("SELECT deposito FROM venta tra WHERE tra.idventa= $t_id  ") or die(mysqli_error());
			while($fetch = $query->fetch())
				{
			//	$id = $fetch['idproducto'];
		?>
		<tr class="del<?php echo $id?>">
			<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['deposito']?>" height = "70px" width = "80px"></td>


		</tr>
		<?php
			}
		?>
		</tbody>
        <form method="post" enctype="multipart/form-data">
							<center>
								<table>
									<tr>
										<td><input type="file" name="producto" required></td>
		              </tr>
		              <?php include("random_id.php");
									echo '<tr>
										<td><input type="hidden" name="product_code" value="'.$code.'" required></td>
									<tr/>';
									?>
		             </table>
								<input class="btn btn-primary" type="submit" name="add" value="Subir Deposito">
							 </center>

		        </form>


			</div>
  </div>


	<?php
		$t_id = $_GET['tid'];

		if (isset($_POST['add']))
			{


				$product_name = $_POST['producto'];

				$code = rand(0,98987787866533499);

							$name2 = $code.$_FILES["producto"] ["name"];
							$type = $_FILES["producto"] ["type"];
							$size = $_FILES["producto"] ["size"];
							$temp = $_FILES["producto"] ["tmp_name"];
							$error = $_FILES["producto"] ["error"];

							if ($error > 0){
								die("Error en cargar archivo! Code $error.");}
							else
							{
								if($size > 30000000000) //conditions for the file
								{
									die("Imagen muy grande!");
								}
								else
								{
									move_uploaded_file($temp,"../photo/".$name2);


			$q2 = $connect->query("UPDATE venta SET deposito='$name2' WHERE idventa='$t_id' ");
     //header ("location:receipt.php");

	}
	}
	}
		?>




</body>
</html>
