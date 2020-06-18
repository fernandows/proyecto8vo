<?php

	include('../db/database_connection.php');

$id = $_POST['id'];

	$connect->query("DELETE FROM producto WHERE idproducto = '$id'") or die(mysqli_error());

?>
