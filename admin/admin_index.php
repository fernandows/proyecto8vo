<!DOCTYPE html>
<html>
<head>
	<title>PYE Collection</title>
	<link rel="icon" href="img/logo.jpg" />
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
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
</head>
<body>
	<div id="header">
		<img src="/proyecto8vo/img/banner1.jpg">
		<label> <a href="/proyecto8vo/index.php"></a> PyE Collection</label>
	</div>

		<?php include('../function/admin_login.php');?>
	<div id="admin">
		<form method="post" class="well">
			<center>
				<legend>Administrator</legend>
					<table>
						<tr>
							<input type="text" name="username" placeholder="Usuario">
						</tr>
						<tr>
							<input type="password" name="password" placeholder="Contraseña">
						</tr>
						<br>
						<br>
							<input type="submit" name="enter" value="Enter" class="btn btn-primary" style="width:200px;">
							<br>
							<br>
							<a href="/proyecto8vo/index.php"> Principal</a> 
					</table>
			</center>
		</form>
	</div>




</div>

</body>
</html>
