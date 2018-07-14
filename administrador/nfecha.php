<?php
  require_once('confi.php');
?>
<div class="ventana">            
  <form id="nfecha" action="?mm1=fechas" method="POST" > 
   <input type="hidden" id="formulario" name="formulario" value="fecha">                     
    <div class="titulos" >Nuevo Fecha</div>                                       
    <div class="subtitulos">Agrega un nueva Fecha a un capeonato.</div>                   
    <div class="conten">
      <div>
          <select id="campeonato1" name="campeonato1"  class='caja' required>
          <option value="">Seleccione un campeonato...</option>
           <?php 
             $camp=mysql_query("SELECT * FROM campeonatos WHERE estado>0");
             $row_camp=mysql_fetch_assoc($camp);
             do{
             echo "<option value='".$row_camp['id']."'  >".$row_camp['nombre']." </option>";
             }while($row_camp=mysql_fetch_assoc($camp));     
           ?> 
          </select>
      </div>  
        <div>
        <select id="temporada" name="temporada" disabled="disabled" required class="caja" placeholder="Escojer temporada" >
        </select>
      </div>
      <div>
        <input type="text" id="nombre1" name="nombre1" required class="caja"  placeholder="nombre de la fecha.">
      </div>
      <div>
        <input type="date" id="fecha" name="fecha" required class="caja"  placeholder="ingresar fecha." >
      </div>
      
        
                                                          
                                                       
    </div>             
    <div class="v_pie">
      <input type="submit" class="boton" id="puti" value="Guardar"> 
    </div>             
  </form>             
</div>
<script>
  $(document).ready(function (){
  
   $('#campeonato1').change(function (){
   $('#temporada').html('<option>cargando..</option>');
      
      $.ajax({
        url:'recuperar.php',
        type: 'GET',
        data: 'id='+$('#campeonato1').val()+'&que=etapas',
        success: function(lista){
          $('#temporada').removeAttr('disabled');
          $('#temporada').html(lista);
        }
      });
      
    });
  
  
  
    $('#nfecha').submit(function (){
      $.ajax({
        url: 'in_campeonato.php',
        type: 'POST',
        data: $('#nfecha').serialize(),
        success: function (res){
         mensaje(res);
          
          
        }
      });
    });   
  });
  
</script>