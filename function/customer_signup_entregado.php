<?php


	include('../db/database_connection.php');

	$t_id = $_GET['id'];

  $query3 = $connect->query("SELECT  cli.nombre,cli.apellido,cli.email ,tra.idventa FROM venta tra INNER JOIN clientes cli on tra.idcliente=cli.idcliente WHERE tra.idventa='$t_id'   ") or die (mysqli_error());
  $row3 = $query3->fetch();
  $nombre = $row3['nombre'];
  $apellido = $row3['apellido'];
  $email = $row3['email'];

   $base_url = "http://localhost/1/alphaware/function/";


function my_curl_fun($url) {
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 $data = curl_exec($ch);
 curl_close($ch);
 return $data;
}



$feed = 'http://localhost/1/alphaware/function/mensaje_entrega.html'; /* Insert URL here */
$data = my_curl_fun($feed);


$mail_body = $data;


$tr = $row3['idventa'];
$t_id = $_GET['id'];
$url = 'http://'.$_SERVER["SERVER_NAME"].'/1/alphaware/reportes/factura.php?idventa='.$t_id.' & codigo_facturacion ';
//$mail_body = "Estimado  <br /><br />Para continuar con el proceso de registro, es indispensable de click en la siguiente liga <a href='$url'>DESCARGAR FACTURA ADJUNTO</a>";
//$mail_body = " <a href='$url'>DESCARGAR FACTURA ADJUNTO</a>";

//  $mail_body =  "Link de activacion - ".$base_url."email_verification.php?email=".$email." ";

    require("lib/class.phpmailer.php");
     require("lib/class.smtp.php");


   $mail = new PHPMailer;
   $mail->IsSMTP();        //Sets Mailer to send message using SMTP
   $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
   $mail->Port = '587';        //Sets the default SMTP server port
   $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
   $mail->Username = 'fabenmobiliaria@gmail.com';     //Sets SMTP username
   $mail->Password = 'faben0402';     //Sets SMTP password
   $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
   $mail->From = 'info@webslesson.info';   //Sets the From email address for the message
   $mail->FromName = 'FABEN_MOBILIARIA';     //Sets the From name of the message
   $mail->AddAddress($email, $nombre);  //Adds a "To" address
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML
	 $mail->Subject = "MENSAJE DE ENTREGA,DESCARGAR FACTURA ADJUNTO EN EL LINK<a href='$url'>D</a> ";

	     //Sets the Subject of the message
   $mail->Body = $mail_body  ;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {
    $message = '

Su pago ha sido verificado, su producto se enviara de inmediato.

		';
   }







?>
