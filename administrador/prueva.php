<?php
    require_once('confi.php'); 
   $fechas=mysql_query('select id from fechas where programa =1');
   $row_fechas=mysql_fetch_assoc($fechas);
   $ganadores=mysql_query("SELECT *,count(carton_id) as ganador  FROM cpartidos Inner JOIN partidos ON cpartidos.local_m=marcador_local and cpartidos.visita_m=marcador_visita and cpartidos.fecha_id=".$row_fechas['id']."  and cpartidos.fecha_id=partidos.fecha_id and cpartidos.partido_id=partidos.id ");
   $row_ganadores=mysql_fetch_assoc($ganadores);
   do {
        echo "id = ".$row_ganadores['id']." ";
        echo "fecha: ".$row_ganadores['fecha_id'];
        echo "Carton: ".$row_ganadores['carton_id']."";
       echo "local ".$row_ganadores['local_m']." ";
       echo "visita ".$row_ganadores['visita_m']."</br>";
  echo $row_ganadores['ganador']."</br> "     ;
   }while($row_ganadores=mysql_fetch_assoc($ganadores));
   
                                        
?>