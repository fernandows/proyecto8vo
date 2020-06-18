<?php


	include('db/database_connection.php');
	if (isset($_POST['signup']))
{
	$firstname=$_POST['nombre'];

	$lastname=$_POST['apellido'];
	$address=$_POST['ciudad'];
	$country=$_POST['pais'];
	$fecha = date("Y/m/d");
	$mobile=$_POST['cedula'];
	$telephone=$_POST['celular'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password2=md5($password);
	$activo="0";
	$query = $connect->query("SELECT * FROM `clientes` WHERE `email` = '$email'");
	$check = $query;
		if($check == '1')
			{
				echo "<script>alert('El correo ya existe')</script>";
			}

			else
				{

					$query= "INSERT INTO clientes (idcliente,nombre, apellido, ciudad, pais, cedula, celular, email, password,activo,fecha)
					VALUES (:idcliente,:nombre,:apellido, :ciudad, :pais, :cedula, :celular,:email, :password,:activo,:fecha) ";

					$statement = $connect->prepare($query);
					$statement->execute(array(
						    ':idcliente' => 'NULL',
								':nombre' => $firstname,
                ':apellido'   => $lastname,
								':ciudad' => $address,
								':pais' => $country ,
                ':cedula'  => $mobile,
								':celular' => $telephone,
								':email' => $email,
								':password' => $password2,
						     ':activo' => $activo,
                 ':fecha' => $fecha
						       ));

					  $result = $statement->fetchAll();
  if(isset($result))
  {
   $base_url = "http://localhost/1/alphaware/function/";
   $email = $_POST['email'];

function my_curl_fun($url) {
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 $data = curl_exec($ch);
 curl_close($ch);
 return $data;
}

$feed = 'http://localhost/1/alphaware/function/mensaje.html'; /* Insert URL here */
$data = my_curl_fun($feed);



	  $mail_body = $data;


	// $mail_body = file_get_contents("mensaje.html");
  // $mail_body =  "Link de activacion - ".$base_url."email_verification.php?email=".$email." ";

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
   $mail->AddAddress($_POST['email'], $_POST['nombre']);  //Adds a "To" address
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML
   $mail->Subject = "Link de activacion - <a href=".$base_url."email_verification.php?email=".$email.">link<a/> ";

	     //Sets the Subject of the message
   $mail->Body = $mail_body  ;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {
    $message = '<label class="text-success">Registro Exitoso, Por favor revise su correo.


	" ;

	</label>';
   }
  }



}
}

?>
