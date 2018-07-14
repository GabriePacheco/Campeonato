<?php
	//
	require 'config.php';


	$res= array();
	$fecha_impresion = date("Y/m/d H:i:s");
	$sql = "INSERT INTO cartones (user_id, fecha_id, campeonato_id, fecha_impresion) VALUES ('".$_POST['user_id']."','".$_POST['fecha_id']."', '".$_POST['campeonato_id']."', '".$fecha_impresion."' )" ;
		if (mysql_query ($sql)){
			$res["estado"] = true;
			$lastInsert= mysql_insert_id();
			$res["carton"] = $lastInsert;
			$res["mensaje"] = "EL cartón ha sido creado con exito";
			$fecha_id = $_POST['fecha_id'];
			$cpar= $_POST;
			unset($cpar['user_id'], $cpar['fecha_id'],  $cpar['campeonato_id']);
			$crear  = count($cpar['partido_id']);
			for($i = 0 ; $i< $crear;$i++){
				$sql = "INSERT INTO cpartidos (carton_id, fecha_id, partido_id, local_m, visita_m ) ";
				$sql .= " VALUES ('".$lastInsert."', '".$fecha_id."', '".$cpar['partido_id'][$i]."','".$cpar['local_m'][$i]."', '".$cpar['visita_m'][$i]."' )";
				if (mysql_query($sql) ){
					$res['mensaje'] .= " \n se guardo el partido nº  " .$cpar['partido_id'][$i];				
				}else{

					$res["estado"] = false;	
					$res['mensaje'] .= " \n ocurrio un error al guardar el  partidos nº " .$cpar['partido_id'][$i]. mysql_error();
				}
			}

		}else{

				$res["estado"] = flase;
				$res["carton"] = NaN;
				$res["mensaje"] = "Ocurrio un error : " . mysql_error();	
		}


		dibujarCarton($lastInsert);
		
		//DIBUJAR CARTON 
		function dibujarCarton ($id){
			$carton= mysql_query ("SELECT * FROM  cartones INNER JOIN users  on cartones.id = '$id' and users.id = cartones.user_id INNER JOIN fechas on fechas.id = cartones.fecha_id ") or die (mysql_error());
			$row_carton = mysql_fetch_array($carton);

			$row_campeonato = mysql_fetch_array(mysql_query("SELECT * FROM campeonatos WHERE id = '".$row_carton['campeonato_id']."'"));

			$partidos = mysql_query("SELECT * FROM cpartidos INNER JOIN partidos on cpartidos.carton_id = '$id'  and partidos.id= cpartidos.partido_id ") or die (mysql_error());
			$row_partidos = mysql_fetch_array($partidos);
	
			// Crear la imagen 
			$im = imagecreatetruecolor(1200, 1200); 
			//$im=imagecreatefrompng("imagenes/cartones/publifondo.png");
			// Crear algunos colores 
			$blanco = imagecolorallocate($im, 255,255,255);
			$azul = imagecolorallocate($im, 4, 119, 180); 
			$azulClaro = imagecolorallocate($im, 7, 169, 249);
			$gris   = imagecolorallocate($im, 0, 66, 96); 
			$negro  = imagecolorallocate($im, 4, 81, 119); 
			
			imagefilledrectangle($im, 0, 0, 1200, 1400, $azul); 

			
			// Reemplaze la ruta con su propio ruta a la fuente 
			$fuente = 'bootstrap/fonts/GROBOLD.ttf'; 
			$fuente2 = 'bootstrap/fonts/Durango Western Eroded Demo.otf';
			$tamFuenteAuxiliar = 12;
			$tamFuente = 15;
			$tamFuenteTitulo = 25;
			//  ******* CABECERA ****** 
			imagettftext($im, $tamFuenteAuxiliar, 0,5,20, $blanco,$fuente, "Cartón Nº " . $id);//numero de cartón
			imagettftext($im, $tamFuenteAuxiliar, 0,600 - (strlen("Usuario : " . $row_carton['mail'])*$tamFuenteAuxiliar)/2 , 20 , $blanco,$fuente, "Usuario : " . $row_carton['mail']);// usuario
			imagettftext($im, $tamFuenteAuxiliar, 0, 1280 - (strlen("Precio del cartón : $" . $row_campeonato['precio_carton'])*$tamFuenteAuxiliar) , 20 , $blanco,$fuente, "Precio del cartón : $" . $row_campeonato['precio_carton']);//precio del carton 
			imagettftext($im, $tamFuenteAuxiliar, 0, 1330 - (strlen("Fecha de impresión : " . $row_carton['fecha_impresion'])*$tamFuenteAuxiliar) , 40 , $blanco,$fuente, "Fecha de impresión : " . $row_carton['fecha_impresion']);//fecha de impresión 

			imagettftext($im, $tamFuenteTitulo, 0, 600 - (strlen($row_campeonato['nombre']) * $tamFuenteTitulo)/2,80,$blanco, $fuente, $row_campeonato['nombre']);// Titulo del campeonato. 

			imagettftext($im, $tamFuente, 0, 650 - (strlen("Pedicción de la fecha :".$row_carton['nombre_fecha'])*$tamFuente)/2,110, $blanco, $fuente, "Predicción de la fecha :" .$row_carton['nombre_fecha']);

			imagettftext($im, $tamFuente, 0, 200 - (strlen("Local")*$tamFuente)/2, 160, $azulClaro, $fuente, "Local");
			imagettftext($im, $tamFuente, 0, 600 - (strlen("Marcador")*$tamFuente)/2, 160, $azulClaro, $fuente, "Marcador" );
			imagettftext($im, $tamFuente, 0, 1000 - (strlen("Visitante")*$tamFuente)/2, 160, $azulClaro, $fuente, "Visitante");

			$y = 200;	
			$espacio = 1000 /mysql_num_rows($partidos);
			$espacio = $espacio - 145 -$tamFuente - $tamFuente  ;

			do {
				//almaceno los datos de los equipos 
				$row_local = mysql_fetch_array(mysql_query("SELECT * FROM equipos where id = '".$row_partidos['equipo_local_id']."'" ));
				$logo_local = imagecreatefrompng("imagenes/" . $row_local["log_equipo"]); //logo del equipo  Local 

				$row_visita = mysql_fetch_array(mysql_query("SELECT * FROM equipos where id = '".$row_partidos['equipo_visita_id']."'" ));// logo del equipo visitante 
				$logo_visita = imagecreatefrompng("imagenes/". $row_visita['log_equipo']);

				// imprimo los datos del equipo local 
				imagettftext($im, $tamFuente, 0, 200-((strlen($row_local['descripcion_equipo'])*$tamFuente)/2), $y,$blanco,$fuente, $row_local['descripcion_equipo'] ); //nombre LOCAL
				imagecopyresized($im, $logo_local, 200-(160/2), $y + $tamFuente/2, 0,0, 140,140, imagesx($logo_local), imagesy($logo_local));// Logo del Local 

				imagefilledrectangle($im,410,$y ,590, $y+130, $negro); //Recuadro local 
				
				imagefilledrectangle($im, 610,$y ,790, $y+130, $negro);// Recuador visita
				imagefilledellipse($im, 600, $y+(140/2), 50,50, $azul);// Esfera  
				imagettftext($im,$tamFuenteTitulo+2,0, 500, $y+70 ,$blanco, $fuente, $row_partidos['local_m'] );	//marcador local
				imagettftext($im,$tamFuenteTitulo+2,0, 700, $y+70 ,$blanco, $fuente, $row_partidos['visita_m'] );	//marcador local
				imagettftext($im, $tamFuente, 0, 589, $y+(140/2)+6, $azulClaro,$fuente, "VS");


				//visitante 
				// imprimo los datos del equipo local 
				imagettftext($im, $tamFuente, 0, 1000-((strlen($row_visita['descripcion_equipo'])*$tamFuente)/2), $y,$blanco,$fuente, $row_visita['descripcion_equipo'] ); //nombre LOCAL
				imagecopyresized($im, $logo_visita, 1000-(160/2), $y + $tamFuente/2, 0,0, 140,140, imagesx($logo_visita), imagesy($logo_visita));// Logo del Local 

				$y = $y + (145 + $tamFuente + $tamFuente )  + $espacio;


			}while ($row_partidos = mysql_fetch_array($partidos));

		
			// Usar imagepng() resulta en texto más claro, en comparación con imagejpeg() 
			imagepng($im,"imagenes/cartones/".$id.".png"); 
			imagedestroy($im); 


		}

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($res);
	exit();
 ?>