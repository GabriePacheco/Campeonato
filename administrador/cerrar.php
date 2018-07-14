<?php
    require_once("conexion.php");
   session_start ();
   mysql_query("UPDATE admin SET cookie='' WHERE id='".$_SESSION['id_usuario']."'") or die(mysql_error());
   unset($_COOKIE['campeonato_interno']);
   session_unset();
    echo 1;
?>