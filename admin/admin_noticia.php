<?php
	include("../function/session.php");
	 include('../db/database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>P Y E</title>
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
		<img src="../img/banner1.jpg">
		<label>P Y E</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = $connect->query ("SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch ();
			?>

			s
	</div>

	<br>


		
		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			
				
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="add" value="Add">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					</form>
			</div>
		</div>

		<?php
			if (isset($_POST['add']))
				{
					$product_code = $_POST['noticiaid'];
					$product_name = $_POST['titulo'];
					$product_price = $_POST['contenido'];


					$category = $_POST['categoria'];

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


				$q1 = $connect->query("INSERT INTO noticia ( noticiaid,titulo, contenido, imagen, categoria)
				VALUES ('$product_code','$product_name','$product_price','$name', '$category')");



				header ("location:admin_noticia.php");
			}}
		}

				?>

				





	<div id="rightcontent" style="position:absolute; top:14%;">
			<div class="alert alert-info"><h2> Noticias</h2></div>
		
			
			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
						
					<th></th>
					<th>Titulo</th>
					<th>Contenido</th>

					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = $connect->query("SELECT * FROM `noticia` ORDER BY noticiaid DESC") or die(mysqli_error());
					while($fetch = $query->fetch())
						{
						$id = $fetch['noticiaid'];
				?>
				<tr class="">
					
					<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['imagen']?>" height = "800px" width = "800spx"></td>
					<td><?php echo $fetch['titulo']?></td>
					<td><?php echo $fetch['contenido']?></td>

					
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
