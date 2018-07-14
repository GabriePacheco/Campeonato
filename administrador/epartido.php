<?php
  require_once('confi.php');
  $row_epartido=mysql_fetch_assoc(mysql_query("SELECT * FROM partidos WHERE id='".$_POST['id']."'"));
  $locales=mysql_query("SELECT * FROM equipos WHERE estado>0");
  $row_locales=mysql_fetch_assoc($locales);
  $visita=mysql_query("SELECT * FROM equipos WHERE estado>0");
  $row_visita=mysql_fetch_assoc($visita);
  $prog=mysql_query('SELECT * FROM programa ');
  $row_prog=mysql_fetch_assoc($prog);
?>
<div>
  <h4>Editar Partido</h4>
   <label>Registro:<?php echo $row_epartido['id'];?></label>
    <form id="epartido" name="epartido">
     <input type="hidden" id="eid" name="eid"  value="<?php echo $row_epartido['id'];?>">
     <input type="hidden" id="formulario" name="formulario"  value="epartido">
     <select id="elocal"  name="elocal">
       
     <?php
      do {
        if ($row_locales['id']==$row_epartido['equipo_local_id']){
            echo "<option value='".$row_locales['id']."' selected>".$row_locales['descripcion_equipo']."</option>";
        }else{
            echo "<option value='".$row_locales['id']."' >".$row_locales['descripcion_equipo']."</option>";
        }
      }while($row_locales=mysql_fetch_assoc($locales) ); 
     ?>
     </select>
     <select id="evisita"  name="evisita">
       
     <?php
      do {
        if ($row_visita['id']==$row_epartido['equipo_visita_id']){
            echo "<option value='".$row_visita['id']."' selected>".$row_visita['descripcion_equipo']."</option>";
        }else{
            echo "<option value='".$row_visita['id']."' >".$row_visita['descripcion_equipo']."</option>";
        }
      }while($row_visita=mysql_fetch_assoc($visita) ); 
     ?>
     </select>
     
     <input type="datetime" id="ehora" name="ehora" value="<?php echo $row_epartido['horario'];?>" >
     <select id="eprograma"  name="eprograma">
       
     <?php
      do {
        if ($row_prog['id']==$row_epartido['programa']){
            echo "<option value='".$row_prog['id']."' selected>".$row_prog['etiqueta']."</option>";
        }else{
            echo "<option value='".$row_prog['id']."' >".$row_prog['etiqueta']."</option>";
        }
      }while($row_prog=mysql_fetch_assoc($prog) ); 
      
      
     ?>
     </select>
     <input type="button" id="e_prog" value="Guardar" class="boton" > 
    </form>
  
</div>
<script>
$('#e_prog').click(function (){
     
      $.ajax({
        url: 'editar.php',
        type: 'POST',
        data:   $('#epartido').serialize(),
        success: function (res){
        mensaje(res);
        reload();
        
          
        }
      });
      
            
});
</script> 
    
    
     