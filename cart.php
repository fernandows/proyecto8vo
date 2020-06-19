<?php
	include("function/session.php");
 include('db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>PYE Collection</title>
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
		<img src="img/banner1.jpg">
		<label>PyE Collection</label>

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

	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Mi Cuenta</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id'];

								$query = $connect->query ("SELECT * FROM clientes WHERE idcliente = '$id' ") or die (mysqli_error());
								$fetch = $query->fetch ();
						?>
						<center>
							<form method="post">
								<center>
									<table>
										<tr>
											<td class="profile">Name:</td><td class="profile"><?php echo $fetch['nombre'];?>&nbsp;&nbsp;<?php echo $fetch['apellido'];?></td>

										</tr>
										<tr>
											<td class="profile">Address:</td><td class="profile"><?php echo $fetch['ciudad'];?></td>
										</tr>
										<tr>
											<td class="profile">Country:</td><td class="profile"><?php echo $fetch['pais'];?></td>
										</tr>
										<tr>
											<td class="profile">Mobile Number:</td><td class="profile"><?php echo $fetch['cedula'];?></td>
										</tr>
										<tr>
											<td class="profile">Telephone Number:</td><td class="profile"><?php echo $fetch['celular'];?></td>
										</tr>
										<tr>
											<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
										</tr>
									</table>
								</center>
							</div>
						<div class="modal-footer">
							<a href="account.php?id=<?php echo $fetch['idcliente']; ?>"><input type="button" class="btn btn-success" name="edit" value="Editar"></a>
							<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
						</div>
							</form>	</div>



	<br>
<div id="container">
	<div class="nav">

			 <ul>
				<li><a href="index.php"><font size="5"><i class="icon-home"></i>Inicio</font>  </a></li>
				<li><a href="product.php"><font size="5"><i class="icon-th-list"></i>Productos</font></a>
				<li><a href="aboutus.php"><font size="5"><i class="icon-bookmark"></i>Nosotros</font></a></li>
				<li><a href="contactus.php"><font size="5"><i class="icon-inbox"></i>Contactanos</font></a></li>
				<li><a href="privacy.php"><font size="5"><i class="icon-info-sign"></i>Acerca de</font></a></li>
<li><a href="Galeria.php"><font size="5"><i class="icon-info-sign"></i>Galeria</font></a></li>


	<li><a href="/proyecto8vo/admin/admin_noticia.php"><font size="5"><i class="icon-info-sign"></i>Noticias</font></a></li>
			</ul>
	</div>

	<form method="post" class="well" style="background-color:#fff;">
	<table class="table">
	<label style="font-size:25px;">Mi Carrito</label>
		<tr>
			<th><h3>Imagen</h3></td>
			<th><h3>Producto</h3></th>
			<th><h3>Agregar</h3></th>
			<th><h3>Eliminar</h3></th>

			<th><h3>Cantidad</h3></th>
			<th><h3>Precio</h3></th>

			<th><h3>Importe</h3></th>
		</tr>

<?php


	if (isset($_GET['id']))
	$id=$_GET['id'];
	else
	$id=1;
	if (isset($_GET['action']))
	$action=$_GET['action'];
	else
	$action="empty";

	switch($action)
	{

		case "view":
			if (isset($_SESSION['cart'][$id]))
			$_SESSION['cart'][$id];
		break;
		case "add":
			if (isset($_SESSION['cart'][$id]))
			$_SESSION['cart'][$id]++;
			else
			$_SESSION['cart'][$id]=1;
		break;
		case "remove":
			if (isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]--;
				if ($_SESSION['cart'][$id]==0)
				unset($_SESSION['cart'][$id]);
			}
		break;
		case "empty":
			unset($_SESSION['cart']);
		break;
	}
if (isset($_SESSION['cart']))
	{


	$total1=0;
	$total=0;
	$iva3=0;

	foreach($_SESSION['cart'] as $id => $x)
	{
	$result=$connect->query("Select * from producto where idproducto=$id");
	$myrow=$result->fetch();

	$result1=$connect->query("Select * from parametro");
	$iva=$result1->fetch();
	$iva1=$iva['iva'];
	$iva2=$iva1/100;
	$name=$myrow['producto'];
	$name=substr($name,0,40);
	$price=$myrow['precio'];
	$image=$myrow['imagen'];

	$line_cost=$price*$x;
	$total1=$total1+$line_cost;
	$iva3=	$total1*$iva2;

	$total=$iva3+$total1;

		echo "<tr class='table'>";
		echo "<td><h4><img height='70px' width='70px' src='photo/".$image."'></h4></td>";
		echo "<td><h4><input type='hidden' required value='".$id."' name='pid[]'> ".$name."</h4></td>";
		echo "<td><h4><a href='cart.php?id=".$id."&action=add'><i class='icon-plus-sign'></i></a></td>";
		echo "<td><h4><a href='cart.php?id=".$id."&action=remove'><i class='icon-minus-sign'></i></a></td>";

		echo "<td><h4><input type='hidden' required value='".$x."' name='qty[]'> ".$x."</h4></td>";
		echo "<td><h4>".$price."</h4></td>";



		echo "<td><strong><h3> ".$line_cost."</h3></strong>";
		echo "</tr>";
		}

		echo"<tr>";


		echo "<td><h3>Subtotal:</h3></td>";
		echo "<td><strong><input type='hidden' value='".$total1."' required name='subtotal'><h3 class='text-danger'> ".$total1."</h3></strong></td>";


		echo "<td><h3>Iva:</h3></td>";
		echo "<td><strong><input type='hidden' value='".$iva3."' required name='iva'><h3 class='text-danger'>".$iva3."</h3></strong></td>";
		echo "<td></td>";


		echo "<td><h3>TOTAL:</h3></td>";
		echo "<td><strong><input type='hidden' value='".$total."' required name='total'><h3 class='text-danger'> ".$total."</h3></strong></td>";
		echo "<td></td>";


		echo "</tr>";
	}
 	else
		echo "<font color='#111' class='alert alert-error' style='float:right'>Carrito Vacio</font>";

?>
	</table>


	<div class='pull-right'>
	<a href='home.php' class='btn btn-inverse btn-lg'>Continuar Comprando</a>

	<?php echo "<button name='pay_now' type='submit' class='btn btn-inverse btn-lg' >Confirmar Compra</button>";
        echo "<td><a class='btn btn-danger btn-sm pull-right' href='cart.php?id=".$id."&action=empty'><i class='fa fa-trash-o'></i>Vaciar Carrito </a></td>";
	include ("function/paypal.php");
	?>
	</form>
	</div>

		<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Mode Of Payment</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="image" src="images/button.jpg" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"  />
						<br/>
						<br/>
						<button class="btn btn-lg" >Cash</button>
					</center>
				</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
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
						<a href="http://www.facebook.com/alphaware"><li>Facebook</li></a>
						<a href="http://www.twitter.com/alphaware"><li>Twitter</li></a>
					</ul>
			</div>
			<div id="foot">
				<h4>Links</h4>
					<ul>
						<a href="http://www.pinterest.com/alphaware"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/alphaware"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
