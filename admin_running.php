<?php
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



			<a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position:absolute;margin-left:270px; margin-top:180px; z-index:-1000;"><i class="icon-plus-sign icon-white"></i>Agregar Productos</a>
			<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Agregar Productos...</h3>
				</div>
					<div class="modal-body">
						<form method="post" enctype="multipart/form-data">
						<center>
							<table>
								<tr>
									<td><input type="file" name="imagen" required></td>
								</tr>
								<?php include("random_id.php");
								echo '<tr>
									<td><input type="hidden" name="idproducto" value="'.$code.'" required></td>
								<tr/>';
								?>
								<tr>
									<td><input type="text" name="producto" placeholder="Producto" style="width:250px;" required></td>
								<tr/>
								<tr>
									<td><input type="text" name="precio" placeholder="Precio" style="width:250px;" required></td>
								</tr>
							   <tr>
									<td><input type="text" name="marca" placeholder="Marca	" style="width:250px;" required></td>
								</tr>
								<tr>
									<td><input type="number" name="cantidad" placeholder="Cantidad" style="width:250px;" required></td>
								</tr>
								<tr>
									<td><input type="hidden" name="categoria" value="sillones"></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<input class="btn btn-primary" type="submit" name="add" value="Add">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
						</form>
				</div>
			</div>

			<?php
				if (isset($_POST['add']))
					{
						$product_code = $_POST['idproducto'];
						$product_name = $_POST['producto'];
						$product_price = $_POST['precio'];

						$brand = $_POST['marca'];
						$category = $_POST['categoria'];
						$qty = $_POST['cantidad'];
						$code = rand(0,98987787866533499);

									$name = $code.$_FILES["imagen"] ["name"];
									$type = $_FILES["imagen"] ["type"];
									$size = $_FILES["imagen"] ["size"];
									$temp = $_FILES["imagen"] ["tmp_name"];
									$error = $_FILES["imagen"] ["error"];

									if ($error > 0){
										die("Error en cargar archivo! Codigo $error.");}
									else
									{
										if($size > 30000000000) //conditions for the file
										{
											die("Formato no valido!");
										}
										else
										{
											move_uploaded_file($temp,"../photo/".$name);


					$q1 = $connect->query("INSERT INTO producto ( idproducto,producto, precio, imagen, marca, categoria)
					VALUES ('$product_code','$product_name','$product_price','$name', '$brand', '$category')");

					$q2 = $connect->query("INSERT INTO stock ( idproducto, cantidad) VALUES ('$product_code','$qty')");

					header ("location:admin_running.php");
				}}
			}

					?>

				<div id="leftnav">
					<ul>
						<li><a href="admin_home.php" style="color:#333;">Inicio</a></li>
						<li><a href="admin_feature.php">Productos</a>
							<ul>
								<li><a href="admin_product.php" style="font-size:15px; margin-left:15px;">Sillas</a></li>
								<li><a href="admin_football.php" style="font-size:15px; margin-left:15px;">Mesas</a></li>
								<li><a href="admin_running.php"style="font-size:15px; margin-left:15px;">Sillones</a></li>
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

	<div id="rightcontent" style="position:absolute; top:14%;">
			<div class="alert alert-info"><center><h2>Sillones</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Buscar..." id="filter"></label>
			<br />

		<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Imagen</th>
					<th>Producto</th>
					<th>Precio</th>
				
					<th>Stock</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = $connect->query("SELECT * FROM `producto` WHERE categoria='sillones' ORDER BY idproducto DESC") or die(mysqli_error());
					while($fetch = $query->fetch())
						{
						$id = $fetch['idproducto'];
				?>
				<tr class="del<?php echo $id?>">
					<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['imagen']?>" height = "70px" width = "80px"></td>
					<td><?php echo $fetch['producto']?></td>
					<td><?php echo $fetch['precio']?></td>


					<?php
					$query1 = $connect->query("SELECT * FROM `stock` WHERE idproducto='$id'") or die(mysqli_error());
					$fetch1 = $query1->fetch();

						$qty = $fetch1['cantidad'];
					?>

					<td><?php echo $fetch1['cantidad']?></td>
					<td style="width:220px;">
					<?php
					echo "<a href='admin_cart.php?id=".$id."&action=add'><input type='submit' class='btn btn-inverse' name='add' value='+'></a>" ;
           	?>
					</td>
				</tr>
				<?php
					}
				?>
				</tbody>
			</table>
		</div>
  <?php
  /* stock in */
  if(isset($_POST['stockin'])){

  $pid = $_POST['pid'];

 $result = $connect->query("SELECT * FROM `stock` WHERE idproducto='$pid'") or die(mysqli_error());
 $row = $result->fetch();

  $old_stck = $row['cantidad'];
  $new_stck = $_POST['new_stck'];
  $total = $old_stck + $new_stck;

  $que = $connect->query("UPDATE `stock` SET `cantidad` = '$total' WHERE `idproducto`='$pid'") or die(mysql_error());
  echo "<script>window.location = 'admin_running.php'</script>";
  //header("Location:admin_running.php");
 }

  /* stock out */
 if(isset($_POST['stockout'])){

  $pid = $_POST['pid'];

 $result = $connect->query("SELECT * FROM `stock` WHERE idproducto='$pid'") or die(mysqli_error());
 $row = $result->fetch();

  $old_stck = $row['qty'];
  $new_stck = $_POST['new_stck'];
  $total = $old_stck - $new_stck;

  $que = $connect->query("UPDATE `stock` SET `qty` = '$total' WHERE `idproducto`='$pid'") or die(mysqli_error());

  echo "<script>window.location = 'admin_running.php'</script>";
  //header("Location:admin_running.php");
 }
  ?>



</body>
</html>
<script type="text/javascript">
	$(document).ready( function() {

		$('.remove').click( function() {

		var id = $(this).attr("id");


		if(confirm("Are you sure you want to delete this product?")){


			$.ajax({
			type: "POST",
			url: "../function/remove.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$(".del"+id).fadeOut('slow', function(){ $(this).remove();});
			}
			});
			}else{
			return false;}
		});
	});

</script>
