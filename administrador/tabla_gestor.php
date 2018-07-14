<?php
  require_once('confi.php');
  $id=$_POST['id'] ;
  $temporadas=mysql_query("SELECT * FROM etapas WHERE  estado>0 AND id_campeonato='".$id."'");
  $row_temporadas=mysql_fetch_assoc($temporadas);
  $fecha=mysql_query("SELECT * FROM fechas  WHERE id_campeonato='".$_POST['id']."' ORDER BY etapa_id, programa,fecha") ;
  $row_fecha=mysql_fetch_assoc($fecha);   
  echo "<div class='lis'>" ;
  $cont=0;
  do{ 
    $cont++;
    $partidos=mysql_query("SELECT * FROM partidos WHERE fecha_id='".$row_fecha['id']."' ORDER BY programa");
    $row_partidos=mysql_fetch_assoc($partidos);
    $row_programf=mysql_fetch_assoc(mysql_query("SELECT * FROM programa WHERE id='". $row_fecha['programa']."'"));
    if ($cont>2){echo "</div> <div 'class='lis'>";
    $cont=0; 
    }
   
?> 
    <div class='box' >
    <div><a href="javascript:emergente('efecha1',<?php echo $row_fecha['id'];?> )"><?php echo $row_fecha['nombre_fecha'];?></a></div>

    <table class='mostrar2'>
    <tr>
    <th colspan="2">Local.</th>
    <th colspan="2"><a href="javascript:emergente('marcador2',<?php echo $row_fecha['id'];?> )">Marcador</a></th>
    
    <th colspan="2">Visita.</th>
    </tr>
      <?php 
      do{
        $row_local=mysql_fetch_assoc(mysql_query("SELECT * FROM equipos WHERE id='".$row_partidos['equipo_local_id']."'"));
        $row_visita=mysql_fetch_assoc(mysql_query("SELECT * FROM equipos WHERE id='".$row_partidos['equipo_visita_id']."'"));
        $row_programap=mysql_fetch_assoc(mysql_query("SELECT * FROM programa WHERE id='". $row_partidos['programa']."'"));
       
      ?>  
        <tr id='<?php echo $row_partidos['id']; ?>' title="<?php echo $row_programap['etiqueta']." ".date('H:i:s',strtotime($row_partidos['horario'])) ;?>">
          <td width="10%"><img src='../imagenes/<?php echo $row_local['log_equipo']; ?>' width="15em" title="<?php echo $row_local['nombre_equipo'];?>" ></td>
          <td width="30%"><?php echo $row_local['descripcion_equipo']; ?></td>
          <td width="10%" align="center"><?php if (is_null($row_partidos['marcador_local'])){echo '-';}else{echo $row_partidos['marcador_local'];} ?></td>
          <td width="10%"align="center"><?php if (is_null($row_partidos['marcador_visita'])){echo '-';}else{echo $row_partidos['marcador_visita'];} ?></td>
          <td width="30%"align="right"><?php echo $row_visita['descripcion_equipo']; ?></td>
          <td width="10%"><img src='../imagenes/<?php echo $row_visita['log_equipo']; ?>' width="15em"  title="<?php echo $row_visita['nombre_equipo'];?>"></td>
        </tr>
      <?php      
      }while($row_partidos=mysql_fetch_assoc($partidos)); ?>
    </table>
    &nbsp;
    <div><?php echo"Evento: ".$row_programf['etiqueta'];?>&nbsp;<?php echo "Fecha: ".date('d-M-Y',strtotime($row_fecha['fecha']));?> </div>
    
    </div>
   
<?php }while($row_fecha=mysql_fetch_assoc($fecha));

  echo "</div>" ;
 ?>


 <script>
 $(document).ready(function (){
       $('tr').dblclick(function(){
        emergente('epartido2',$(this).attr('id'));  
       });
      
 });
 </script>
 