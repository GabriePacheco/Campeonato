<?php 
	require "conexion.php";
	$config = mysql_query ("SELECT * FROM configuracion WHERE  estado = 1") OR die(mysql_error());
	$row_config = mysql_fetch_array($config);
	header('Content-Type: text/html; charset=UTF-8');
?>

