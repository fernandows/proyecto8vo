<?php
include 'mail.php';
if(isset($_POST["nombre"]) && isset($_POST["mensaje"])) {
  $correo = new Correo();
  $correo->enviarCorreoContactanos($_POST["nombre"], $_POST["mensaje"]);
}
header("Location: contactus.php");
?>
