<?php 
	require_once 'conexion.php';
	$username=$_POST['username'];
	$clave=$_POST['clave'];
	
	$respuesta = array();
	$loginer=mysql_query('select * from users where mail="'.$username.'"') or die(mysql_error());
	$loginer_num=mysql_num_rows($loginer);
	if ($loginer_num<=0){
		
		$respuesta['estado'] = false;
		$respuesta['mensaje'] = "El usuario ingresado no es correcto";

	}else{
		$row_loginer= mysql_fetch_assoc($loginer);
		if ($row_loginer['pass']!=md5($clave)){
			
			$respuesta['estado'] = false;
			$respuesta['mensaje']= "La contraseña ingresada no es correcta";

		}else{
			if ($row_loginer['estado']!=1){
			  
			  $respuesta['estado']=false;
			  $respuesta['mensaje'] = "El usuario ingresado no esta activo por favor revisa tu correo electronico";
			}else{
			session_start();
			$_SESSION['campeonato_id']=$row_loginer['id'];
			$_SESSION['campeonato_mail']=$row_loginer['mail'];


			
			$respuesta['estado']= true;
			$respuesta['mensaje']= "Ingresando";
			$respuesta['userid']= $_SESSION['campeonato_id'];

			}
			
		}

	}


	header('Content-type: application/json; charset=utf-8');
	echo json_encode($respuesta);
	exit();


?>