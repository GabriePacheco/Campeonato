<?php
   require_once('confi.php');
   mysql_query("UPDATE partidos SET marcador_local='".$_GET['mlocal']."', marcador_visita='".$_GET['mvisita']."' WHERE id='".$_GET['reg']."'") or die (mysql_error());
   echo 1;
    
?>