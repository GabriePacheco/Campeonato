<?php
 $servidor="localhost";
 $base="campeonato";
 $usuario="root";
 $clave="";
 $conexion1=mysql_connect($servidor,$usuario, $clave);
 mysql_select_db($base,$conexion1); 
?>