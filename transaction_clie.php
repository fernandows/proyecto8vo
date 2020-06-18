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


		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Agregar Producto...</h3>
			</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
					<center>
						<table>
							<tr>
								<td><input type="file" name="product_image" required></td>
							</tr>
							<?php include("random_id.php");
							echo '<tr>
								<td><input type="hidden" name="product_code" value="'.$code.'" required></td>
							<tr/>';
							?>
							<tr>
								<td><input type="text" name="product_name" placeholder="Product Name" style="width:250px;" required></td>
							<tr/>
							<tr>
								<td><input type="text" name="product_price" placeholder="Price" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="text" name="product_size" placeholder="Size" style="width:250px;" maxLength="2" required></td>
							</tr>
							<tr>
								<td><input type="text" name="brand" placeholder="Brand Name	" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="number" name="qty" placeholder="No. of Stock" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="hidden" name="category" value="basketball"></td>
							</tr>
						</table>
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="add" value="Add">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
			</div>
		</div>

		<?php
			if (isset($_POST['add']))
				{
					$product_code = $_POST['product_code'];
					$product_name = $_POST['product_name'];
					$product_price = $_POST['product_price'];
					$product_size = $_POST['product_size'];
					$brand = $_POST['brand'];
					$category = $_POST['category'];
					$qty = $_POST['qty'];
					$code = rand(0,98987787866533499);

								$name = $code.$_FILES["product_image"] ["name"];
								$type = $_FILES["product_image"] ["type"];
								$size = $_FILES["product_image"] ["size"];
								$temp = $_FILES["product_image"] ["tmp_name"];
								$error = $_FILES["product_image"] ["error"];

								if ($error > 0){
									die("Error uploading file! Code $error.");}
								else
								{
									if($size > 30000000000) //conditions for the file
									{
										die("Format is not allowed or file size is too big!");
									}
									else
									{
										move_uploaded_file($temp,"../photo/".$name);


				$q1 = $connect->query("INSERT INTO product ( product_id,product_name, product_price, product_size, product_image, brand, category)
				VALUES ('$product_code','$product_name','$product_price','$product_size','$name', '$brand', '$category')");

				$q2 = $connect->query("INSERT INTO stock ( product_id, qty) VALUES ('$product_code','$qty')");

				header ("location:admin_product.php");
			}}
		}

				?>

	<div id="leftnav">
		<ul>
			<li><a href="admin_home.php" style="color:#333;">Inicio</a></li>
			<li><a href="admin_home.php">Productos</a>
				<ul>
					<li><a href="admin_feature.php "style="font-size:15px; margin-left:15px;">Más Vendidos</a></li>
					<li><a href="admin_product.php "style="font-size:15px; margin-left:15px;">Sillas</a></li>
					<li><a href="admin_football.php" style="font-size:15px; margin-left:15px;">Mesas</a></li>
					<li><a href="admin_running.php"style="font-size:15px; margin-left:15px;">Sillones</a></li>
				</ul>
			</li>
			<li><a href="transaction.php">Transacciones</a></li>
			<li><a href="customer.php">Clientes</a></li>
			<li><a href="message.php">Mensajes</a></li>
			<li><a href="order.php">Compras</a></li>
				<li><a href="facturas_adqui.php">Facturas de Adquisiciones</a></li>
				<li><a href="proveedor.php">Proveedor</a></li>
		</ul>
	</div>

	<div id="rightcontent" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Transacciones	</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Transactions here..." id="filter"></label>
			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:16px;">
					<th>ID</th>
					<th>Fecha</th>
					<th>Nombre</th>
					<th>Total </th>
					<th>Pedido</th>
					<th>Acción</th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = $connect->query("SELECT * FROM transaction tra INNER JOIN customer cli ON cli.customerid = tra.customerid ORDER by tra.order_date desc") or die(mysqli_error());
					while($fetch = $query->fetch())
						{
						$id = $fetch['transaction_id'];
						$amnt = $fetch['amount'];
						$o_stat = $fetch['order_stat'];
						$o_date = $fetch['order_date'];

						$name = $fetch['firstname'].' '.$fetch['lastname'];
				?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $o_date; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $amnt; ?></td>
					<td><?php echo $o_stat; ?></td>


					<td><a href="receipt.php? tid=<?php echo $fetch['transaction_id']?> & estado=<?php echo $fetch['order_stat'] ?>">Ver</a>


					<?php
					if($o_stat == 'Confirmed'){

					}elseif($o_stat == 'Cancelled'){

					}else{
					echo '| <a class="btn btn-mini btn-info" href="confirm.php?id='.$id.'">Confirmar</a> ';
					echo '| <a class="btn btn-mini btn-danger" href="cancel.php?id='.$id.'">Cancelar</a></td>';
					}
					?>
				</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>
			</div>


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
