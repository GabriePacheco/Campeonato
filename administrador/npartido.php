<?php
require_once('confi.php');
$campeonato= $_POST['campeonato1'];
$etapa= $_POST['temporada'];
$fecha= $_POST['fecha'];
echo "campeonato ".$campeonato." Etapa ".$etapa." Fecha ".$fecha;
$nequipo=mysql_query("SELECT * FROM equipos  WHERE estado > 0 ORDER BY nombre_equipo ");
$row_local=mysql_fetch_assoc($nequipo);
$nequipo2=mysql_query("SELECT * FROM equipos  WHERE estado > 0 ORDER BY nombre_equipo ");
$row_visita=mysql_fetch_assoc($nequipo2);
$row_fecha=mysql_fetch_assoc(mysql_query('SELECT * FROM fechas WHERE id="'.$fecha.'" '));
                                                                                         
?>
<div >
  <form id="inpartido" name="inpartido">
    <input type="hidden" id="incampeonato" name="incapeonato" value="<?php echo $campeonato; ?>" >
    <input type="hidden" id="inetapa" name="inetapa" value="<?php echo $etapa; ?>" >
    <input type="hidden" id="infecha" name="infecha" value="<?php echo $fecha; ?>" >
    <select id="inlocal" name="inlocal" >
      <option value="">Local</option>
      <?php
        do{
            echo "<option value='".$row_local['id']."'>".$row_local['descripcion_equipo']."</option>";
        }while($row_local=mysql_fetch_assoc($nequipo)); 
      ?>
    </select>
     <select id="invisita" name="invisita" >
      <option value="">Visitante</option>
      <?php
        do{
            echo "<option value='".$row_visita['id']."'>".$row_visita['descripcion_equipo']."</option>";
        }while($row_visita=mysql_fetch_assoc($nequipo2)); 
      ?>
    </select>
     <input type="datetime-local" id="inhora" name="inhora"  value="<?php echo $row_fecha['fecha']."00:00:00";  ?>"  >
    
    
    
    
    
    
    <input type="button"  id="in_partido"  name="in_partido" value="Insertar"  >
  </form>
</div>
<script>
  $(document).ready(function (){
   
    $('#in_partido').click(function (){
     var datos='incampeonato='+ $('#incampeonato').val();
          datos=datos+'&inetapa='+$('#inetapa').val();
          datos=datos+'&infecha='+$('#infecha').val();
          datos=datos+'&inlocal='+$('#inlocal').val();
          datos=datos+'&invisita='+$('#invisita').val();
          datos=datos+'&inhora='+$('#inhora').val();
     
     
     $.ajax({
        url: 'in_partido.php',
        type: 'POST',
        data: datos ,
        success: function (res){
        reload();
         mesajes(res);
         
        }
      });
     
   
    });
  });
  
  
</script>


