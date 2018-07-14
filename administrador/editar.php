<?php
 require_once('confi.php');
  $form=$_POST['formulario'];
  switch ($form){
    case 'campeonato': 
         mysql_query("UPDATE campeonatos SET  defa='".$_POST['defa']."', nombre='".$_POST['c_nombre']."', estado='".$_POST['estado']."', descripcion='".$_POST['obser']."',  pago='".$_POST['pago']."', precio_carton='".$_POST['precio_carton']."', acumulado='".$_POST['acumulado']."', premio_inicial='".$_POST['premio_inicial']."', comision='".$_POST['comision']."' WHERE id='".$_POST['reg']."'") or die(mysql_error()); 
  echo "Campeonato guardado con exito.";
  echo $_POST['pago'];
  break;
  case 'etapa':
  mysql_query("UPDATE etapas SET nombre_etapa='".$_POST['c_nombre']."', estado='".$_POST['estado']."', id_campeonato='".$_POST['etcampeonato']."' WHERE id='".$_POST['reg']."'") or die(mysql_error()); 
  echo "Etapa guardada con exito.";
      
  
   case 'fecha':
  mysql_query("UPDATE fechas SET nombre_fecha='".$_POST['nombre1']."', id_campeonato='".$_POST['campeonato1']."', estado='".$_POST['estado']."', etapa_id='".$_POST['etapa']."', fecha='".$_POST['fecha']."', programa='".$_POST['programa']."' WHERE id='".$_POST['reg']."'") or die(mysql_error()); 
  echo "Etapa guardada con exito.";
  break;
  
   case 'equipo':
  mysql_query("UPDATE equipos SET nombre_equipo='".$_POST['c_nombre']."', log_equipo='".$_POST['img']."', estado='".$_POST['estado']."',  descripcion_equipo='".$_POST['obser']."'  WHERE id='".$_POST['reg']."'") or die(mysql_error()); 
  echo "Etapa guardada con exito.";
  break;  
  
  case 'epartido':
   
  mysql_query("UPDATE partidos SET equipo_local_id='".$_POST['elocal']."', equipo_visita_id='".$_POST['evisita']."', horario='".$_POST['ehora']."',  programa='".$_POST['eprograma']."'  WHERE id='".$_POST['eid']."'") or die(mysql_error()); 
  echo "Partido guardada con exito .";
  break;
  
  case 'pasword' :
  mysql_query("UPDATE admin SET clave='".md5('123')."' WHERE id='".$_POST['id']."'");
  echo "Clave follada."; 
  break;
     
     
  case 'terminos' :
  mysql_query("UPDATE configuracion SET condiciones='".$_POST['terminos']."' WHERE id='1'") or die(mysql_error());
  echo "Teminos y condiciones guardados."; 
  break; 
  
  case 'nosotros' :
  mysql_query("UPDATE configuracion SET nosotros='".$_POST['nosotros']."' WHERE id='1'") or die(mysql_error());
  echo "Descripción de la empresa guardada."; 
  break;  
  
  case 'ejuego' :  
  mysql_query("UPDATE juego SET  campeonato_id='".$_POST['campeonato2']."', estado='".$_POST['estado']."', pago='".$_POST['pago']."', valor='".$_POST['valor']."', premio='".$_POST['premio']."', comision='".$_POST['comision']."'  WHERE id='".$_POST['did']."'") or die(mysql_error());
  echo "Juego Guardadado"; 
  break;  
          
     
     
   
  }
  
  
?>                                              