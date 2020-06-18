
<?php
error_reporting(E_ALL ^ E_NOTICE);
	include("function/session.php");
	 include('db/database_connection.php');
?>
<html>
<head>
	<title>Faben Mobiliaria</title>
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

	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



</head>
<body>

	<div id="header">
		<img src="img/logo.jpg">
		<label>Faben Mobiliaria</label>

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





	<br>
<div id="container">
	<div class="nav">
			 <ul>
				<li><a href="home.php"><font size="5">   <i class="icon-home"></i>Inicio</a></li>
				<li><a href="product1.php"> <font size="5">			 <i class="icon-th-list"></i>Productos</a></li>
				<li><a href="aboutus1.php">  <font size="5"> <i class="icon-bookmark"></i>Nosotros</a></li>
				<li><a href="contactus1.php"><font size="5"><i class="icon-inbox"></i>Contactos</a></li>
				<li><a href="privacy1.php"><font size="5"><i class="icon-info-sign"></i>Politica de privacidad</a></li>
				<li><a href="faqs1.php"><font size="5"><i class="icon-question-sign"></i>Compras Realizadas</a></li>
			</ul>
	</div>
<div class="container">


</div>
<?php
require_once("lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_Ax9YM8UMUQQUxHAeehKv9g");
\Conekta\Conekta::setApiVersion("2.0.0");

$token_id=$_POST["conektaTokenId"];
$total=$_POST['total'];
try {
  $customer = \Conekta\Customer::create(
    array(
      "name" => "Fulanito Pérez",
      "email" => "fulanito@conekta.com",
      "phone" => "+52181818181",
      "payment_sources" => array(
        array(
            "type" => "card",
            "token_id" => $token_id
        )
      )//payment_sources
    )//customer
  );
}
catch (\Conekta\ProccessingError $error){
  echo $error->getMesage();
} catch (\Conekta\ParameterValidationError $error){
  echo $error->getMessage();
} catch (\Conekta\Handler $error){
  echo $error->getMessage();
}




try{
  $order = \Conekta\Order::create(
    array(
      "line_items" => array(
        array(
          "name" => "Sillas",
          "unit_price" => 1000,
          "quantity" => 12
        )//first line_item
      ), //line_items
      "shipping_lines" => array(
        array(
          "amount" => 120,
           "carrier" => "FEDEX"
        )
      ), //shipping_lines - physical goods only
      "currency" => "MXN",
      "customer_info" => array(
        "customer_id" => $customer->id
      ), //customer_info
      "shipping_contact" => array(
        "address" => array(
          "street1" => "Calle 123, int 2",
          "postal_code" => "100103",
          "country" => "Ec"
        )//address
      ), //shipping_contact - required only for physical goods
      "metadata" => array("reference" => "12987324097", "more_info" => "lalalalala"),
      "charges" => array(
          array(
              "payment_method" => array(
                      "type" => "default"
              ) //payment_method - use customer's default - a card
                //to charge a card, different from the default,
                //you can indicate the card's source_id as shown in the Retry Card Section
          ) //first charge
      ) //charges
    )//order
  );
}
catch (\Conekta\ProcessingError $error){
  echo $error->getMessage();
} catch (\Conekta\ParameterValidationError $error){
  echo $error->getMessage();
} catch (\Conekta\Handler $error){
  echo $error->getMessage();
}

echo "ID: ". $order->id;
echo "<br>Estado: ". $order->payment_status;
echo "<br>$". $order->amount/100 . $total->currency;
echo "<br>Order";
echo $order->line_items[0]->quantity .
      "-". $order->line_items[0]->name .
      "- $". $order->line_items[0]->unit_price/100;
echo "<br>Payment info";
echo "<br>CODE:". $order->charges[0]->payment_method->auth_code;
echo "<br>Card info:" .
      "- ". $order->charges[0]->payment_method->name .
      "- ". $order->charges[0]->payment_method->last4 .
      "- ". $order->charges[0]->payment_method->brand .
      "- ". $order->charges[0]->payment_method->type;

// Response
// ID: ord_2fsQdMUmsFNP2WjqS
// $ 135.0 MXN
// Order
// 12 - Tacos - $10.0
// Payment info
// CODE: 035315
// Card info: 4242 - visa - banco - credit



?>


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
						<a href="http://www.facebook.com/Faben Mobiliaria"><li>Facebook</li></a>
						<a href="http://www.twitter.com/Faben Mobiliaria"><li>Twitter</li></a>
						<a href="http://www.pinterest.com/Faben Mobiliaria"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/Faben Mobiliaria"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
