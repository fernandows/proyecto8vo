<?php
	include("function/session.php");
	 include('db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faben Mobiliaria</title>
	<link rel="icon" href="img/logo.jpg" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header">
		<img src="img/logo.jpg">
		<label>Faben Mobiliaria</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch ();
			?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
			</ul>
	</div>

	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">My Account</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id'];

								$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysqli_error());
								$fetch = $query->fetch();
						?>
						<center>
					<form method="post">
						<center>
							<table>
								<tr>
									<td class="profile">Name:</td><td class="profile"><?php echo $fetch['nombre'];?>&nbsp;<?php echo $fetch['apellido'];?></td>
								</tr>
								<tr>
									<td class="profile">Address:</td><td class="profile"><?php echo $fetch['address'];?></td>
								</tr>
								<tr>
									<td class="profile">Country:</td><td class="profile"><?php echo $fetch['country'];?></td>
								</tr>
								<tr>
									<td class="profile">ZIP Code:</td><td class="profile"><?php echo $fetch['zipcode'];?></td>
								</tr>
								<tr>
									<td class="profile">Mobile Number:</td><td class="profile"><?php echo $fetch['mobile'];?></td>
								</tr>
								<tr>
									<td class="profile">Telephone Number:</td><td class="profile"><?php echo $fetch['telephone'];?></td>
								</tr>
								<tr>
									<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['idcliente']; ?>"><input type="button" class="btn btn-success" name="edit" value="Editar"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
					</form>
			</div>




	<br>
<div id="container">
	<div class="nav">
			 <ul>
				<li><a href="home.php"><font size="5">   <i class="icon-home"></i>Inicio</a></li>
				<li><a href="product1.php"> <font size="5">			 <i class="icon-th-list"></i>Productos</a></li>
				<li><a href="aboutus1.php">  <font size="5"> <i class="icon-bookmark"></i>Nosotros</a></li>
				<li><a href="contactus1.php"><font size="5"><i class="icon-inbox"></i>Contactos</a></li>
				<li><a href="privacy1.php"><font size="5"><i class="icon-info-sign"></i>Politica de privacidad</a></li>
				<li><a href="faqs1.php"><font size="5"><i class="icon-question-sign"></i>Compras Realizadas</a></li>
			</ul>
	</div>

	<br />
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






	<div class='pull-right'>

	<div class="add"><a onclick="javascript:printDiv('printablediv')" name="print" style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"></i> Imprimir Recibo</a></div>
	<br>



</div>

</form>

<a href="#add" role="button" class="btn btn-info" data-toggle="modal"><i class="icon-plus-sign icon-white"></i>Subir Deposito</a>
<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Agregar Deposito...</h3>
	</div>
		<div class="modal-body">
			<form method="post" enctype="multipart/form-data">
			<center>
				<table>
					<tr>
						<td><input type="file" name="imagen" required></td>
					</tr>
					<?php include("admin/random_id.php");
					echo '<tr>
						<td><input type="hidden" name="product_code" value="'.$code.'" required></td>
					<tr/>';
					?>
					<tr>
						<td><input type="text" name="producto" placeholder="Producto" style="width:250px;" required></td>
					<tr/>

				</table>
			</center>
		</div>
	<div class="modal-footer">
		<input class="btn btn-primary" type="submit" name="add" value="Subir">

		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>


			</form>


	</div>

</div>

</div>


</div>



<div>



	<?php
		$t_id = $_GET['tid'];

		if (isset($_POST['add']))
			{


				$product_name = $_POST['producto'];

				$code = rand(0,98987787866533499);

							$name2 = $code.$_FILES["imagen"] ["name"];
							$type = $_FILES["imagen"] ["type"];
							$size = $_FILES["imagen"] ["size"];
							$temp = $_FILES["imagen"] ["tmp_name"];
							$error = $_FILES["imagen"] ["error"];

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
									move_uploaded_file($temp,"photo/".$name2);


			$q2 = $connect->query("UPDATE venta SET deposito='$name2' WHERE idventa='$t_id' ");

			//header ("location:receip_clie.php");
		}}
	}
		?>





<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyrght &copy; <?php echo  Date("Y"); ?> </label>
			<p style="font-size:25px;">Faben Mobiliaria </p>
		</div>

			<div id="foot">
				<h4>Links</h4>
					<ul>
						<a href="http://www.facebook.com/alphaware"><li>Facebook</li></a>
						<a href="http://www.twitter.com/alphaware"><li>Twitter</li></a>
						<a href="http://www.pinterest.com/alphaware"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/alphaware"><li>Tumblr</li></a>
					</ul>
			</div>

	</div>


</body>
</html>
