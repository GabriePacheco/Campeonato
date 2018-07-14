<?php
include_once('confi.php'); 
$fecham=mysql_query("SELECT * FROM fechas WHERE id='".$_GET['id']."'")or die(mysql_error());
$row_fecham=mysql_fetch_assoc($fecham);
$partidosm=mysql_query("SELECT * FROM partidos WHERE fecha_id='".$_GET['id']."'") or die (mysql_error());
$row_partidosm=mysql_fetch_assoc($partidosm);
$row_programa_fecha=mysql_fetch_assoc(mysql_query("SELECT * FROM programa WHERE id='".$row_fecham['programa']."'"));
$row_campeonatoxfecha=mysql_fetch_assoc(mysql_query("select * from campeonatos where id=".$row_fecham['id_campeonato']));
$row_cvendidos=mysql_fetch_assoc(mysql_query('select count(*) as tcartones from cartones  where fecha_id='.$row_fecham['id']));


?>

<a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:agestor2()" ><b>x</b></a>

<div class="<?php echo $row_programa_fecha['clase'];?>">
  <h4><?php echo $row_fecham['nombre_fecha'];?></h4>
  <table class="marcador">
  <tr>
  <th colspan="2">Local</th>
  <th colspan="2">Marcador</th>
  <th colspan="2">Visita</th>
  <td  align="right">Guardar</td>
  </tr>
  <?php do{
  $row_localm=mysql_fetch_assoc(mysql_query("SELECT * FROM equipos WHERE id='".$row_partidosm['equipo_local_id']."'"));
  $row_visitam=mysql_fetch_assoc(mysql_query("SELECT * FROM equipos WHERE id='".$row_partidosm['equipo_visita_id']."'"));
  $row_programa_partido=mysql_fetch_assoc(mysql_query("SELECT * FROM programa WHERE id='".$row_partidosm['programa']."'"));
   
  ?>
    
   <tr id="<?php echo $row_partidosm['id'];?>" class="<?php echo $row_programa_partido['clase'];?>">
    <td width="10%"><img src="../imagenes/<?php echo  $row_localm['log_equipo']; ?>" width="18em" /> </td>
    <td width="25%"><?php echo  $row_localm['descripcion_equipo']; ?></td>
    <td width="5%"><input id="ml_<?php echo $row_partidosm['id'];?>" type="number" class="goles" min="0" max="9" value="<?php echo $row_partidosm['marcador_local']; ?>"  PLACEHOLDER="-" ></td>
    <td width="5%"><input id="mv_<?php echo $row_partidosm['id'];?>" type="number" class="goles" min="0" max="9" value="<?php echo $row_partidosm['marcador_visita']; ?>" PLACEHOLDER="-" ></td>
    <td width="25%" align="right"><?php echo  $row_visitam['descripcion_equipo']; ?></td>
    <td width="10%" align="right"><img src="../imagenes/<?php echo  $row_visitam['log_equipo']; ?>" width="18em" /> </td>
    <td width="15%" align="right"><img  id="<?php echo "i_".$row_partidosm['id'];?>" src="ok.png" width="15em"></td>
    
     
   </tr> 
 <?php }while($row_partidosm=mysql_fetch_assoc($partidosm));?>

  </table>
  
  
</div>
<div  class="pie_marcador">
      <ul>
          <li><a href ="javascript:actons(<?php echo $row_fecham['id']; ?>, 'activar')">Activar juego</a></li>
          <li><a  href ="javascript:cerrarjuego(<?php echo $row_fecham['id']; ?>)">Finalizar juego</a></li>
          <li><a href = "javascript:actons(<?php echo $row_fecham['id']; ?>, 'finalizar')">Finalizar fecha</a></li>
        <li><a href = "javascript:actons(<?php echo $row_fecham['id']; ?>, 'suspender')">Suspender</a></li>
          <li><a> <small>C. vendidos: <?php echo $row_cvendidos['tcartones']; ?> </small></a></li>
          <li><small><a>Acumulado:<?php echo $row_campeonatoxfecha['acumulado'];?></a></small></li>
          <li><small><a>Ganancia: <?php echo ($row_campeonatoxfecha['acumulado']*$row_campeonatoxfecha['comision'])/100;?> </a> </small></li>
          
      </ul>
</div>

<script>
$(document).ready(function (){
  $('input').change(function (){
     var n=$(this).attr('id').split('_')[1];
     $('#i_'+n).attr('src','ok2.png');       
   
  });
  $('img').click(function (){
                        
    var id=$(this).attr('id').split('_')[1];
    $.get('pr.php',
    { reg:id, mlocal: $('#ml_'+id).val(), mvisita: $('#mv_'+id).val()},
     function(datos) {
                     
        if (datos==1){
     
          $('#i_'+id).attr('src','ok3.png');        
        }
    });
  
  });
});
    
function actons(n,a){       
  var conf= confirm( "Estas seguro que quieres "+a+" la fecha "+n+" para juego" );   
  
  if (conf==true){
     $.get( "cambios.php", { id: n , getAccion: a }, function( data ) {
              mensaje(data);
     }) ;
     
  } 
}       
function cerrarjuego(n){

  var conf= confirm( "Estas seguro que quieres cerrar el juego" );   
  
  if (conf==true){
     $.get( "cambios.php", { id: n , getAccion: 'cerrar'}, function( data ) {
              mensaje(data);
     }) ;
     
  } 
}
  
    
    
</script>