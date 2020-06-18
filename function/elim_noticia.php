admin_<?php
	    include('../db/database_connection.php');
 			include ("session.php");

				$id = $_SESSION['id'];
 				$noticiaid=$_POST['id'];

				$connect->query("DELETE FROM  noticia WHERE noticiaid='$noticiaid' ") or die (mysqli_error());

					header("location:../admin/admin_noti.php");


	?>
