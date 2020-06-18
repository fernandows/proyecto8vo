<?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$correo_faben='fabenmobiliaria@gmail.com'; // Business email ID
?>
<?php
	include("function/session.php");
	 include('db/database_connection.php');
?>
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
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>Salir</a></li>
				<li>Bienvenido:&nbsp;&nbsp;&nbsp;<a href="#profile"  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
			</ul>
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

	<form method="post" class="well"  style="background-color:#fff; overflow:hidden;">
	<table class="table" style="width:50%;">
	<label style="font-size:25px;">Orden de Pedidos </label>
		<tr>
			<th><h5>Cantidad</h5></td>
			<th><h5>Producto</h5></td>


			<th><h5>Precio</h5></td>

		</tr>

		<?php
		$t_id = $_GET['tid'];
		$query = $connect->query("SELECT * FROM venta WHERE idventa = '$t_id'") or die (mysqli_error());
		$fetch = $query->fetch();

		$amnt = $fetch['total'];
	    $ivva = $fetch['iva'];
	    $sub = $fetch['subtotal'];

		$t_id = $fetch['idventa'];

		$query2 = $connect->query("SELECT * FROM detalle_v LEFT JOIN producto ON producto.idproducto = detalle_v.idproducto WHERE detalle_v.idventa = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch()){

		$pname = $row['producto'];

		$pprice = $row['precio'];
		$oqty = $row['cantidad'];

		echo "<tr>";
		echo "<td>".$oqty."</td>";
		echo "<td>".$pname."</td>";

		echo "<td>".$pprice."</td>";
		echo "</tr>";
		}
		?>

	</table>
	<legend></legend>


	<center><h4>Subtotal      <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$sub; ?></h4></center>
		<legend></legend>
	<center><h4>Iva        <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$ivva; ?></h4></center>
		<legend></legend>
	<center><h4>TOTAL <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$amnt; ?></h4></center>






	</form>

	<div class='pull-right'>
<div class="">
    <form action="<?php echo $paypal_url ?>" method="post" >
    <input type="hidden" name="business" value="<?php echo $correo_faben; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value=" Faben Mobiliaria">
    <input type="hidden" name="item_number" value="<?php echo $t_id; ?>">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="<?php echo $amnt; ?>">
    <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="function/cancel.php">
    <input type="hidden" name="return" value="function/success.php">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
</div>
	</div>

	<div class='pull-right'>
<div class="">
		<form action="summary_tar.php" method="post" >
		<input type="hidden" name="business" value="<?php echo $correo_faben; ?>">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="item_name" value=" Faben Mobiliaria">
		<input type="hidden" name="idventa" value="<?php echo $t_id; ?>">
		<input type="hidden" name="credits" value="510">
		<input type="hidden" name="userid" value="1">
		<input type="hidden" name="total" value="<?php echo $amnt; ?>">
		<input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
		<input type="hidden" name="no_shipping" value="1">
		<input type="hidden" name="currency_code" value="PHP">
		<input type="hidden" name="handling" value="0">
		<input type="hidden" name="cancel_return" value="function/cancel.php">
		<input type="hidden" name="return" value="function/success.php">
		<input type="image"  border="0" name="submit" alt="Pago Tarjeta ">
		<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
</div>
	</div>




		<br />
		<br />
</div>
<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyrght &copy; <?php echo  Date("Y"); ?> </label>
			<p style="font-size:25px;">Faben Mobiliaria </p>
		</div>

			<div id="foot">
				<h4>Links</h4>
					<ul>
						<a href="http://www.facebook.com/Faben Mobiliaria"><li>Facebook</li></a>
						<a href="http://www.twitter.com/Faben Mobiliaria"><li>Twitter</li></a>
						<a href="http://www.pinterest.com/Faben Mobiliaria"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/Faben Mobiliaria"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
