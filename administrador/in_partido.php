<?php
  require_once('confi.php')   ;
mysql_query("INSERT INTO partidos (id_campeonato, etapa_id, fecha_id, equipo_local_id, equipo_visita_id, horario) VALUES ('".$_POST['incampeonato']."','".$_POST['inetapa']."','".$_POST['infecha']."','".$_POST['inlocal']."','".$_POST['invisita']."','".$_POST['inhora']."')")or  die(mysql_error());
echo "Partido insertado con exito.";
  
?>