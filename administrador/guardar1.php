<?php
 require_once('conexion.php');

 mysql_query("UPDATE admin SET usuario='".$_POST['usuario']."' ,Nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."', estado='".$_POST['estado']."', mail='".$_POST['mail']."'  WHERE id='".$_POST['did']."'") or die(mysql_error());
 echo "Datos guardados con exito."   ;
     echo $_POST['estado'] ;
?>