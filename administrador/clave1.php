<?php
  require_once('conexion.php');
  mysql_query("UPDATE admin SET clave='".md5($_POST['clave'])."' WHERE usuario='".$_POST['usr']."'") or die ( mysql_error() );
  echo "Calve cabiada  con exito.";
?>