<?php
  require_once("conexion.php");
    /*session_start();*/
  $user=mysql_query("SELECT * FROM admin WHERE id='".$_SESSION['id_usuario']."'") or die (mysql_error());
  $row_user=mysql_fetch_assoc($user);
  if ($row_user['estado']==1){$check="checked";}
  $estados=mysql_query('SELECT * FROM estados') ;
  $row_estados=mysql_fetch_assoc($estados);
  
?>

 