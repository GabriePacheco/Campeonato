<?php 
	$respuesta = array();
	session_start();
	session_unset();
	session_destroy();
	$respuesta['estado']= true;
	$respuesta['mensaje']= "Tu secion a sido cerrada";
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($respuesta);

?>