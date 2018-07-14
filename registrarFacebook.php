<?php 
	require "conexion.php";
	$respuesta = array();

	$email = $_POST['email'];
	$sql = "SELECT * FROM  users WHERE mail ='" . $email . "'";
	$usuario = mysql_query ($sql) ;
	$row_usuario = mysql_fetch_array($usuario);
	$nU = mysql_num_rows($usuario);
	if ($nU > 0){
		$respuesta['mensaje'] = 'Usuario ya registrado';
		$respuesta['user_id'] = $row_usuario['id'];
		inicioSession($_POST, $row_usuario, $respuesta);

	}else {
		mysql_query('INSERT INTO users (mail, facebook_id, nombre, apellido, fecha_n, estado ) VALUES ("'.$email.'", "'.$_POST['id'].'", "'.$_POST['first_name'].'", "'.$_POST['last_name'].'","'.date("Y/m/d", strtotime($_POST['birthday'])).'", "1" )')  or die (mysql_error());

		$respuesta['mensaje'] = 'Usuario registrado ';
		$respuesta['user_id'] = mysql_insert_id();
		$row = mysql_fetch_array(mysql_query ("SELECT * FROM users WHERE id = '".$respuesta['user_id']."'" ));
		inicioSession($_POST, $row, $respuesta);

	}

	function inicioSession ($post, $ru, $respuesta){
		session_start();
		$_SESSION['campeonato_id']=$ru['id'];
		$_SESSION['campeonato_mail']=$ru['mail'];
		$respuesta['estado']=true; 
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($respuesta);
		exit();
		
	}




?>