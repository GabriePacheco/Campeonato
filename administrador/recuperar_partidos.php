<?php
 require_once('confi.php');
 $partidos=mysql_query("SELECT * FROM partidos WHERE id_campeonato='".$_POST['campeonato1']."' and etapa_id='".$_POST['temporada']."' and fecha_id='".$_POST['fecha']."'") or die (mysql_error());
 $row_partidos=mysql_fetch_assoc($partidos);
 $total_partidos=mysql_num_rows($partidos);
 if ($total_partidos<=0){
  echo "No se encontraron partidos..";
 }else{
?>
  <div>
    <input type="hidden" id="selecionado"  name="selecionado"  >      
    <table class="mostrar" >
      <th colspan="2">Local</th>
      <th colspan="2">Marcador</th>
      <th colspan="2">visitnate</th>
      <th >Fecha/hora</th>
      <th >Programa</th>
      
      <?php do{
      
          $row_local=mysql_fetch_assoc(mysql_query("SELECT * FROM equipos WHERE id='".$row_partidos['equipo_local_id']."'"));
          $row_visita=mysql_fetch_assoc(mysql_query("SELECT * FROM equipos WHERE id='".$row_partidos['equipo_visita_id']."'"));
          $row_programa=mysql_fetch_assoc(mysql_query("SELECT * FROM programa WHERE id='".$row_partidos['programa']."'"));          
      
      
      ?>
        <tr id="<?php echo $row_partidos['id']; ?>"  >
        
          <td>
           <img src='../imagenes/<?php echo $row_local['log_equipo'];?>'  width='25em' />   
          </td>
          <td><?php echo $row_local['descripcion_equipo'] ;?></td>
          <td align="center"> <?php   if(is_null($row_partidos['marcador_local'])){echo "-";}else{echo $row_partidos['marcador_local'];}  ?> </td>
          <td align="center"> <?php   if(is_null($row_partidos['marcador_visita'])){echo "-";}else{echo $row_partidos['marcador_visita'];}  ?> </td>
          <td><?php echo $row_visita['descripcion_equipo'] ;?></td>
          <td><img src='../imagenes/<?php echo $row_visita['log_equipo'];?>'  width='25em' /> </td>
          <td><?php  echo   $row_partidos['horario']; ?></td>
          <td class="<?php echo $row_programa['clase'];?>"><?php  echo  $row_programa['etiqueta']; ?></td>
          
        </tr>
      <?php   
      }while($row_partidos=mysql_fetch_assoc($partidos)) ?>
    </table>
  </div>

<?php }?>


<script>        
    $('tr').click(function (){
        $('tr').css({background: '#FFF'});
        $(this).css({background: '#FFFFCC'});
        document.getElementById('selecionado').value=$(this).attr('id');
        var seleccionado = $(this).attr('id');  
        $('#bts').removeClass('inac');
        
      
    });
</script>      