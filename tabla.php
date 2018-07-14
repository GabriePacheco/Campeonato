<?php 
	/*require 'conexion.php';*/
	$tabla = array();

	$partidostabla = mysql_query("select * from partidos where id_campeonato=".$row_campeonato['id']) or die (mysql_error());
	$row_partidostabla = mysql_fetch_array($partidostabla);
	$toalpartidostabla= mysql_num_rows($partidostabla);

	do{

		$local= $row_partidostabla['equipo_local_id'];
		$visita= $row_partidostabla['equipo_visita_id'];
		
		if ($row_partidostabla['marcador_local'] > $row_partidostabla['marcador_visita'] ):
			if (!isset($tabla[$local])){
				$tabla[$local] =0;	
			}
			if (!isset($tabla[$visita])){
				$tabla[$visita] =0;	
			}

			$tabla[$local] += 3;
			$tabla[$visita] +=0;

		endif;
		if ($row_partidostabla['marcador_local'] < $row_partidostabla['marcador_visita'] ):
			if (!isset($tabla[$local])){
				$tabla[$local] =0;	
			}
			if (!isset($tabla[$visita])){
				$tabla[$visita] =0;	
			}
			$tabla[$local] += 0;
			$tabla[$visita] +=3;

		endif;
		if ($row_partidostabla['marcador_local'] == $row_partidostabla['marcador_visita'] ):
		if (!isset($tabla[$local])){
				$tabla[$local] =0;	
			}
			
			if (!isset($tabla[$visita])){
				$tabla[$visita] =0;	
			}
			$tabla[$local] += 1;
			$tabla[$visita] +=1;
		endif;

	}while ($row_partidostabla = mysql_fetch_array($partidostabla)) ;
	arsort($tabla);

if ($toalpartidostabla>0):
?>
 	<h3>Tabla de posisciones</h3>
 	<div class="table-responsive"> 
	<table class="table table-bordered">
		<thead>
			<tr class="active">
				<td> Pos. </td>
				<td colspan="2">Equipo </td>
				<td> Pu.</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			$x=0;
			foreach ($tabla as $equipo => $puntos) {
				$x++;
				$equip= mysql_fetch_array(mysql_query("select * from equipos where id = ".$equipo));

			?>
				<tr>
					<td width="1%" ><?php echo $x;?></td>
					<td width="10%" ><img src="imagenes/<?php echo $equip['log_equipo'];?>"  width="100%"></td>
					<td><?php echo $equip['descripcion_equipo'];?></td>
					<td><?php echo $puntos;?></td>
				</tr>
			<?php 	
			}
			 ?>
		</tbody>
		
	</table>
	</div>
<?php endif; ?>
