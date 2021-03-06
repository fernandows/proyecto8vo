<?php
	include("../function/session.php");

 include('../db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>PYE Collection</title>
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
		<img src="/proyecto8vo/img/banner1.jpg">
		<label>PyE Collection</label>

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


		<a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position:absolute;margin-left:270px; margin-top:180px; z-index:-1000;"></i>Realizar Modificaciones</a>
		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Parámetros...</h3>
			</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
					<center>
						<table>

								<td><input type="text" name="product_name" placeholder="Iva" style="width:250px;" required></td>
							<tr/>
							<tr>
								<td><input type="text" name="product_price" placeholder="Promo1" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="text" name="product_size" placeholder="Promo2" style="width:250px;" maxLength="2" required></td>
							</tr>

							<tr>
								<td><input type="hidden" name="category" value="parametro"></td>
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

					$product_name = $_POST['product_name'];
					$product_price = $_POST['product_price'];
					$product_size = $_POST['product_size'];




				$q1 = $connect->query("	UPDATE parametro SET iva='$product_name',promo1='$product_price',promo2='$product_size' WHERE parametro.idparametro=\"1\"  ");

				header ("location:parametro.php");

		}

				?>
				<div id="leftnav">
					<ul>
						<li><a href="admin_home.php" style="color:#333;">Inicio</a></li>
						<li><a href="admin_feature.php">Productos</a>
							<ul>
								
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
						<li><a href="parametro.php">Configuraciones</a>
							<ul>
								<li><a href="usuarios_priv.php"style="font-size:15px; margin-left:15px;">Usuarios y Privilegios</a></li>
							</ul>
						</li>
					</ul>
				</div>

	<div id="rightcontent" style="position:absolute; top:14%;">
			<div class="alert alert-info"><center><h2>Configuración</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Product here..." id="filter"></label>
			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>ID</th>
					<th>Iva</th>
					<th>Promo1</th>
					<th>Promo2</th>

					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = $connect->query("SELECT * FROM `parametro` ") or die(mysqli_error());
					while($fetch = $query->fetch())
						{
						$id = $fetch['idparametro'];
				?>
				<tr class="del<?php echo $id?>">

					<td><?php echo $fetch['idparametro']?></td>
					<td><?php echo $fetch['iva']?></td>
					<td><?php echo $fetch['promo1']?></td>
					<td><?php echo $fetch['promo2']?></td>


					<?php
					echo "<a href='stockin.php?id=".$id."' class='btn btn-success' rel='facebox'><i class='icon-plus-sign icon-white'></i> </a> ";
					echo "<a href='stockout.php?id=".$id."' class='btn btn-danger' rel='facebox'><i class='icon-minus-sign icon-white'></i> </a>";
					?>
					</td>
				</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>
			</div>

  <?php
  /* stock in */
  if(isset($_POST['stockin'])){

  $pid = $_POST['pid'];

 $result = $connect->query("SELECT * FROM `stock` WHERE product_id='$pid'") or die(mysqli_error());
 $row = $result->fetch();

  $old_stck = $row['qty'];
  $new_stck = $_POST['new_stck'];
  $total = $old_stck + $new_stck;

  $que = $connect->query("UPDATE `stock` SET `qty` = '$total' WHERE `product_id`='$pid'") or die(mysqli_error());

  echo "<script>window.location = 'admin_product.php'</script>";
  //header("Location:admin_product.php");
 }

  /* stock out */
 if(isset($_POST['stockout'])){

  $pid = $_POST['pid'];

 $result = $connect->query("SELECT * FROM `stock` WHERE product_id='$pid'") or die(mysqli_error());
 $row = $result->fetch();

  $old_stck = $row['qty'];
  $new_stck = $_POST['new_stck'];
  $total = $old_stck - $new_stck;

  $que = $connect->query("UPDATE `stock` SET `qty` = '$total' WHERE `product_id`='$pid'") or die(mysqli_error());

  echo "<script>window.location = 'admin_product.php'</script>";
  //header("Location:admin_product.php");
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
			$(".del"+id).fadeOut(2000, function(){ $(this).remove();});
			}
			});
			}else{
			return false;}
		});
	});

</script>
