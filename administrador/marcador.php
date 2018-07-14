<script language="javascript" src="jquery-1.11.1.min.js"></script>

<?php
include_once('confi.php');

$xfechas=mysql_query("SELECT * FROM fechas WHERE id='".$_GET['id']."'")or die(mysql_error());
$row_xfechas=mysql_fetch_assoc($xfechas);
$xpartidos=mysql_query("SELECT * FROM partidos WHERE fecha_id='".$_GET['id']."'")or die(mysql_error()) ;
$row_partidos=mysql_fetch_assoc($xpartidos);
?>
<a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:agestor2()" ><b>x</b></a>
<div class="ventana">               
    <div class="titulos"  >Marcador</div>                                            
    <div class="subtitulos"><?php echo $row_xfechas['nombre_fecha'];?></div>                        
    <div class="conten" >  
      
      
      
    <div>  
    <table class="marcador">
    <tr>
    <th colspan="2">Local.</th>
    <th colspan="2">Marcador</th>   
    <th colspan="2">Visita.</th>
    <td colspan="2" align="right">Guardar</td>
    </tr>
      <?php $cont2=0; 
      do{
        $row_local=mysql_fetch_assoc(mysql_query("SELECT * FROM equipos WHERE id='".$row_partidos['equipo_local_id']."'"));
        $row_visita=mysql_fetch_assoc(mysql_query("SELECT * FROM equipos WHERE id='".$row_partidos['equipo_visita_id']."'"));
        $row_programap=mysql_fetch_assoc(mysql_query("SELECT * FROM programa WHERE id='". $row_partidos['programa']."'"));
        $cont2++;
      ?>  
        <tr id='<?php echo $row_partidos['id']; ?>' title="<?php echo $row_programap['etiqueta']." ".date('H:i:s',strtotime($row_partidos['horario'])) ;?>">
          <td width="5%"><img src='../imagenes/<?php echo $row_local['log_equipo']; ?>' width="18em" title="<?php echo $row_local['nombre_equipo'];?>" ></td>
          <td width="30%"><?php echo $row_local['descripcion_equipo']; ?></td>
          <td width="5%" align="center"><input max="9" min="0" type="number" id="local_<?php echo  $row_partidos['equipo_local_id'];?>" PLACEHOLDER="-" value="<?php echo $row_partidos['marcador_local'];?>"></td>
          <td width="5%"align="center"><input max="9" min="0" type="number" id="local_<?php echo  $row_partidos['equipo_visita_id'];?>" PLACEHOLDER="-" value="<?php echo $row_partidos['marcador_visita'];?>"></td>
          <td width="30%"align="right"><?php echo $row_visita['descripcion_equipo']; ?></td>
          <td width="5%"><img src='../imagenes/<?php echo $row_visita['log_equipo']; ?>' width="25em"  title="<?php echo $row_visita['nombre_equipo'];?>"></td>
          <td width="10%">&nbsp;</td>
          <td width="10%">&nbsp;<a href="#" id="guardado"> ok </a></td>
        </tr>
      <?php      
      }while($row_partidos=mysql_fetch_assoc($xpartidos)); ?>
    </table>
     </div> 
     
      
      
    
                                                            
    </div>                  
    <div class="v_pie">      
    
    </div>                
  </form>              
</div>
<script>
  $(document).ready(function {
    $('#guardado').click(function (){
    alert("va a guardar");
    });
  });
</script>
  
   