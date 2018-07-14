

<?php
 require_once('confi.php');
  $form=$_POST['formulario'];
  switch ($form){   
    case 'campeonato': 
         mysql_query("INSERT INTO campeonatos (nombre,descripcion) VALUES ('".$_POST['c_nombre']."','".$_POST['obser']."')")or  die(mysql_error());
  echo "Campeonato ingresado con exito";
  break;
  
  
  case 'etapa':
          mysql_query("INSERT INTO etapas (nombre_etapa,id_campeonato) VALUES ('".$_POST['c_nombre']."','".$_POST['etcampeonato']."')")or  die(mysql_error());
  echo "Etapa ingresada con exito";
  break;
      

  
  case 'fecha':
  
  mysql_query("INSERT INTO fechas (id_campeonato, etapa_id, nombre_fecha, fecha) VALUES ('".$_POST['campeonato1']."','".$_POST['temporada']."', '".$_POST['nombre1']."', '".$_POST['fecha']."')")or  die(mysql_error());
  echo "Etapa ingresada con exito";
  break;
  
  case 'equipo':
    mysql_query("INSERT INTO equipos (nombre_equipo,log_equipo, descripcion_equipo) VALUES ('".$_POST['c_nombre']."','".$_POST['img']."','".$_POST['obser']."' )")or  die(mysql_error());
  echo "Equipo ingresado con exito";
  break;
      
  case 'admin':
    mysql_query("INSERT INTO admin (usuario, Nombre, apellido, clave, mail) VALUES ('".$_POST['usuario']."', '".$_POST['nombre']."','".$_POST['apellido']."', '".md5('123')."','".$_POST['mail']."' )")or  die(mysql_error());
  echo "Equipo ingresado con exito";
  break;
  
  case 'njuego':
      
        mysql_query('INSERT INTO juego (campeonato_id,pago,valor,premio,acumulado,comision) VALUE ("'.$_POST['campeonato_n'].'","'.$_POST['pagon'].'","'.$_POST['premion'].'","'.$_POST['coston'].'","'.$_POST['acumulado'].'","'.$_POST['comision'].'" )')or die(mysql_error());       
        echo "juego creado";
   break;   
      
  } 
  
  
?>