<?php 
	session_start()	;
	require_once('connections/conexion1.php');
	if (!$_SESSION['id_campeonato']){
		header('location: index.php?no=campeonato');
	}else{
		$usuario_id =$_SESSION['id_campeonato'];	
		echo "usurio_id :". $usuario_id;
	}
	$user=mysql_query('SELECT * FROM  usuarios WHERE id="'.$usuario_id.'"')or die(mysql_error());
	$row_usuario=mysql_fetch_assoc($user);
	

		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>dentro del programa</title>
</head>

<body>
<?php  echo "Hola ".$row_usuario['nombre'] ;?>
</body>
</html>