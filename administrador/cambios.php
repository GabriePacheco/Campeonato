<?php
  require_once('confi.php');
   $accion =$_GET['getAccion'];
   switch ($accion){
          case 'activar':
               mysql_query('UPDAtE fechas SET programa=1 WHERE id='.$_GET['id']);
               echo 'Fecha activada para juego correctamenta';
          break;
          case 'finalizar':
               mysql_query('UPDAtE fechas SET programa=4 WHERE id='.$_GET['id']);
               echo 'Fecha Finalizado corectamente ';
          
          break;
          case 'suspender':
               mysql_query('UPDAtE fechas SET programa=6 WHERE id='.$_GET['id']);
               echo 'Fecha suapendida con exito ';
          
          break;
          
          case 'cerrar':
               //seleciono la fecha activa en juego
                $fecha=mysql_query("select * from fechas where id=".$_GET['id']);
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
                   // comparo si asierta todos los patidos de la fecha.
                   if ($row_aciertos['total']==$row_partidos['total_partidos']){
                      //cambio el campo ganador a 1(si) al carton.  
                      mysql_query("update cartones set ganador=1  where id=".$row_cartones['id']);           
                   }                                                    
                 }while ($row_cartones=mysql_fetch_assoc($cartones));
                 mysql_query("update fechas set programa=2 where id=".$_GET['id']);   
                 echo "Juego finalizado con exito";    
          break;
          
    }
?>