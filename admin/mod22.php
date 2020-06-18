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
				<li>Bienvenido :&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>

	<br>


		<a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position:absolute;margin-left:270px; margin-top:180px; z-index:-1000;"><i class="icon-plus-sign icon-white"></i>Agregar Productos</a>
		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Agregar Nuevo Usuario...</h3>
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
							<td><input type="hidden" name="noticiaid" value="'.$code.'" required></td>
						<tr/>';
						?>
						<tr>
							<td><input type="text" name="titulo" placeholder="Titulo Noticia" style="width:250px;" required></td>
						<tr/>
						<tr>
							<td><input type="text" name="contenido" placeholder="Contenido" style="width:250px; height:100px;" required></td>
						</tr>

						<tr>
							<td><select name="categoria">
						<option  value="Sin Categoria">Seleccione Una Categoria</option>
						<option value="Nuevos Productos">Nuevos Productos</option>
						<option  value="Modelos Actuales">Modelos Actuales </option>
						<option  value="Nuevas tecnologias en Zapatos">Nuevas tecnologias en Zapatos </option>
						<option  value="Productos de Interes">Productos de Interes</option>

					</select></td>
						</tr>
						</table>
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="add" value="Agregar">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					</form>
			</div>
		</div>

		<?php
			if (isset($_POST['add']))
				{
					$noticiaid = $_POST['noticiaid'];
					$titulo = $_POST['titulo'];
					$contenido = $_POST['contenido'];
					$categoria = $_POST['categoria'];
					$code = rand(0,98987787866533499);

								$imagen = $code.$_FILES["imagen"] ["name"];
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

												move_uploaded_file($temp,"../noticia/".$name);

				$q1 = $connect->query("INSERT INTO noticia ( noticiaid,titulo, contenido, imagen, categoria)
				VALUES ('$noticiaid','$titulo','$contenido','$imagen', '$categoria')");
       header ("location:mod22.php");
			}}
		}

				?>

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
						<li><a href="reportes.php">Reportes</a>
							<ul>
								<li><a href="../reportes_g/grafico0.php" style="font-size:15px; margin-left:15px;">Mes Anterior</a></li>
								<li><a href="../reportes_g/grafico1.php" style="font-size:15px; margin-left:15px;">Año mas ventas</a></li>
								<li><a href="../reportes_g/grafico2.php"style="font-size:15px; margin-left:15px;">Clientes</a></li>
								<li><a href="../reportes_g/grafico3.php"style="font-size:15px; margin-left:15px;">Productos</a></li>
								<li><a href="../reportes_g/grafico4.php"style="font-size:15px; margin-left:15px;">No Ventas</a></li>
							</ul>


						</li>
						<li><a href="parametro.php">Configuraciones</a></li>
					</ul>
				</div>





	<div id="rightcontent" style="position:absolute; top:14%;">
			<div class="alert alert-info"><center><h2> Noticias</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Buscar..." id="filter"></label>
			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Cod</th>
					<th>Foto</th>
					<th>Titulo</th>

					<th>Categoria</th>
					<th><center><h4></h4></center></th>
					<th><center><h4>Accion</h4></center></th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = $connect->query("SELECT * FROM `noticia`  ORDER BY noticiaid DESC") or die(mysqli_error());
					while($fetch = $query->fetch())
						{
						$id = $fetch['noticiaid'];
				?>
				<tr class="del<?php echo $id?>">
					<td><?php echo $fetch['noticiaid']?></td>
					<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['imagen']?>" height = "70px" width = "80px"></td>

					<td><?php echo $fetch['titulo']?></td>
					<td><?php echo $fetch['categoria']?></td>

					<td>
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
			</div>





</body>
</html>
