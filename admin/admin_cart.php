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


		<a href="proveedor.php" role="button" class="btn btn-info"  style="position:absolute;margin-left:270px; margin-top:180px; z-index:-1000;"><i class="icon-plus-sign icon-white"></i>Agregar Proveedor</a>
		<br />
			<label  style="padding:5px; float:left;;">

         <input type="text"  value="Nombre" name="nombre" placeholder=" Empresa"   ></label>


		<br />
		<br />
		<br />



		<?php


				?>

				<div id="leftnav">
					<ul>
						<li><a href="admin_home.php" style="color:#333;">Inicio</a></li>
						<li><a href="admin_feature.php">Productos</a>
							
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

			<div class="alert alert-info"><center><h2>ADQUISICION DE PRODUCTOS</h2></center></div>
			<br /><h5>Ruc</h5>
				<label  style="padding:5px; float:left;"><input type="text" name="ruc" placeholder="Ruc" value="<?php echo $_GET['ruc']; ?>"  ></label>
				<br />	<br />

				 <h5>Empresa</h5>
				 <label  style="padding:5px; float:left;"><input type="text" name="empresa" placeholder="Empresa" value="<?php echo $_GET['nombre']; ?>"   ></label>
     	<br />	<br />

		 <h5>Representante</h5>
		 	<br />
				<label  style="padding:5px; float:left;"><input type="text" name="representante" placeholder="Representante"  value="<?php echo $_GET['representante']; ?>"  ></label>
			<br />
			<br /><h5>Direccion</h5>


  	<label  style="padding:5px; float:left;"><input type="text" name="direccion" placeholder="Direccion"  value="<?php $ruc ?>"   ></label>
		<br />
	<br />
		<br />


			<br />



					<form method="post" class="well" style="background-color:#fff;">
					<a href='admin_feature.php' class='btn btn-inverse btn-lg'>Agregar Productos</a>


			<table class="table table-hover" style="background-color:;">
				<thead>

					<tr>

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
						//	echo "<td><h4><img height='70px' width='70px' src='photo/".$image."'></h4></td>";
						echo "<td><h4><input type='hidden' required value='".$id."' name='pid[]'> ".$name."</h4></td>";
						echo "<td><h4><a href='admin_cart.php?id=".$id."&action=add'><i class='icon-plus-sign'></i></a></td>";
						echo "<td><h4><a href='admin_cart.php?id=".$id."&action=remove'><i class='icon-minus-sign'></i></a></td>";

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
							echo "<font color='#111' class='alert alert-error' style='float:right'>Agregue Productos </font>";


					?>





				</thead>


			</table>
			<div class='pull-right'>


			<?php echo "<button name='pay_now' type='submit' class='btn btn-inverse btn-lg' >Confirmar Adquisicion</button>";

					echo "<td><a class='btn btn-danger btn-sm pull-right' href='admin_cart.php?id=".$id."&action=empty'><i class='fa fa-trash-o'></i>Realizar nueva Adquisicion </a></td>";
  include ("../function/paypal_admin.php");
			?>
			</form>

			</div>
			</div>

  <?php

  ?>
	  <?php

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
