<?php

 include('../db/database_connection.php');

$message = '';

if(isset($_GET['email']))
{
 $query = "
  SELECT * FROM clientes
  WHERE email = :email
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':email'   => $_GET['email']
  )
 );
 $no_of_row = $statement->rowCount();

 if($no_of_row > 0)
 {
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   if($row['activo'] == '0')
   {
    $update_query = "
    UPDATE clientes
    SET activo = '1'
    WHERE idcliente = '".$row['idcliente']."'
    ";
    $statement = $connect->prepare($update_query);
    $statement->execute();
    $sub_result = $statement->fetchAll();
    if(isset($sub_result))
    {
     $message = '<label class="text-success">Su dirección de correo electrónico se ha verificado correctamente<br />
	 Puedes Ingresar  desde aqui - <a href="../product.php">Faben</a>



		 </label>';
    }
   }
   else
   {
    $message = '<label class="text-info">Tu cuenta está activado</label>';
   }
  }
 }
 else
 {
  $message = '<label class="text-danger">Dirección no Válida</label>';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>>>> Activacion de Cuenta Faben</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body class="bg-image">





  <div class="container" style="width:100%; max-width:1200px">

   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
      <div class="container">
   <h1 align="center">Faben _Mobiliaria </h1>
     <h3 align="center">Página de Activación de Cuenta Faben </h3>
 <center>  <h3><?php echo $message; ?></h3></center>

      <li><a id="login" onclick="window.location.href = '../product.php#login';">Faben</a></li>
     <li><a href="#login"       data-toggle="modal">Ingresar</a></li>
  </div>

   </div>
  </div>

 </body>

</html>
