<?php
     require_once('confi.php');
     //seleciono la fecha activa en juego
     $fecha=mysql_query("select * from fechas where programa=1");
     $row_fecha=mysql_fetch_assoc($fecha);
     
     //cuento cuantos partidos tiene esta fecha.
     $partidos=mysql_query("select count(*)  as total_partidos from partidos where fecha_id=".$row_fecha['id']);
     $row_partidos=mysql_fetch_assoc($partidos);
     
     
     //selecciono todos los cartones creados en esta fecha 
     $cartones=mysql_query('select * from cartones where fecha_id='.$row_fecha['id']);
     $row_cartones=mysql_fetch_assoc($cartones);
     
     
     
    //recoremos todos los cartones 
     do {
         //cuento cuantos acierto tiene *cada carton* 
         $aciertos=mysql_query("SELECT *,count(carton_id) as total  FROM cpartidos Inner JOIN partidos ON cpartidos.local_m=marcador_local and cpartidos.visita_m=marcador_visita and cpartidos.fecha_id=".$row_fecha['id']."  and cpartidos.fecha_id=partidos.fecha_id and cpartidos.partido_id=partidos.id and cpartidos.carton_id=".$row_cartones['id']) ;
         $row_aciertos=mysql_fetch_assoc($aciertos);
         // comparo si aciesta todos los patidos de la fecha.s
         if ($row_aciertos['total']==$row_partidos['total_partidos']){
           //cambio el campo ganador a 1(si) al carton.  
           mysql_query("update cartones set ganador=1  where id=".$row_cartones['id']); 
            
         }                                                    
           
     }while ($row_cartones=mysql_fetch_assoc($cartones));
     
      
?>