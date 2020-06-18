<?php
//database_connection.php

$connect = new PDO('mysql:host=localhost;dbname=alphaware1', 'root', '');

//if($connect){session_start();}
if(!$connect){
		die("Fatal Error: Connection Error!");
	}

?>
