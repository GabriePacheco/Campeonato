<?php
require_once('confi.php');

$efechas=mysql_query("SELECT * FROM fechas WHERE id='".$_GET['id']."'")or die(mysql_error());
$row_efechas=mysql_fetch_assoc($efechas);
?>
<div class="ventana">               
  <form id="efecha" action="?mm1=fechas" method="POST" >
  <input type="hidden" id="formulario" name="formulario" value="fecha">                      
    <div class="titulos" >Editar Fecha     
    </div>                                            
    <div class="subtitulos">Cambia los parametros del registro.     
    </div>                        
    <div class="conten" >  
      <label> Registro: <?php echo $row_efechas['id']; ?> </label>
       <input type="hidden" id="reg" name="reg" value="<?php echo $row_efechas['id']; ?>"> </label>
      <div>
        <input type="text" id="nombre1" name="nombre1" required class="caja"  placeholder="nombre de la fecha." value="<?php echo $row_efechas['nombre_fecha'];?>">
      </div>                                                         
      <div>
          <select id="campeonato1" name="campeonato1"  class='caja' required>
           <?php 
             $camp=mysql_query("SELECT * FROM campeonatos WHERE estado>0");
             $row_camp=mysql_fetch_assoc($camp);
             do{
              if ($row_camp['id']==$row_efecha['id_campeonato']){
                echo "<option value='".$row_camp['id']."' selected='selected' >".$row_camp['nombre']." </option>";
               }else{
               echo "<option value='".$row_camp['id']."'    >".$row_camp['nombre']." </option>";
               }
             }while($row_camp=mysql_fetch_assoc($camp));     
           ?> 
          </select>
      </div>
      <div>
      
        <select id="etapa" name="etapa"  class='caja' required>
        
           <?php 
           
             $etap=mysql_query("SELECT * FROM etapas WHERE estado>0 AND id_campeonato='".$row_efechas['id_campeonato']."'");
             $row_etap=mysql_fetch_assoc($etap);
             do{
              if ($row_etap['id']==$row_efechas['etapa_id']){
                echo "<option value='".$row_etap['id']."' selected='selected' >".$row_etap['nombre_etapa']." </option>";
               }else{
                echo "<option value='".$row_etap['id']."'    >".$row_etap['nombre_etapa']." </option>";
               }
             }while($row_etap=mysql_fetch_assoc($etap));     
           ?> 
          </select>
          
      </div>  
      
      
      <div>
        <input type="date" id="fecha" name="fecha" required class="caja"  placeholder="ingresar fecha."  value="<?php echo $row_efechas['fecha'];?>">
      </div>
      <div>
       <select id="estado" name="estado"  class="caja">
              <?php
                do{
                if ($row_efechas['estado']!=$row_estados['valor']){
                echo "<option value='".$row_estados['valor']."' >".$row_estados['etiqueta']."</option>";
                  }else{
                 echo "<option value='".$row_estados['valor']."' selected='selected'>".$row_estados['etiqueta']."</option>" ;
                }
                }while($row_estados=mysql_fetch_assoc($estados)); 
              ?>
          </select>
      </div>
      
           <div>
          <select id="programa" name="programa"  class='caja' required>
           <?php 
             $prog=mysql_query("SELECT * FROM programa ");
             $row_prog=mysql_fetch_assoc($prog);
             do{
                  if ($row_prog['id']==$row_efechas['programa']){
                   echo "<option value='".$row_prog['id']."'   selected='selected'>".$row_prog['etiqueta']." </option>";
                  }else{
                    echo "<option value='".$row_prog['id']."'  >".$row_prog['etiqueta']." </option>";
                  }
             }while($row_prog=mysql_fetch_assoc($prog));     
           ?> 
          </select>
      </div>       
              
                                                            
    </div>                  
    <div class="v_pie">      
      <input type="submit" class="boton" id="puti" value="Guardar">      
    </div>                
  </form>              
</div>
<script>
  $(document).ready(function (){
    $('#efecha').submit(function (){
     
      $.ajax({
        url: 'editar.php',
        type: 'POST',
        data:   $('#efecha').serialize(),
        success: function (res){
        
        mensaje(res);
         
          
        }
      });
      
            
    });   
    
     $('#campeonato1').change(function (){
     $('#etapa').html('<option>cargando..</option>');
      
      $.ajax({
        url:'recuperar.php',
        type: 'post',
        data: 'id='+$('#campeonato1').val()+'&que=etapas',
        success: function(lista){
          $('#etapa').removeAttr('disabled');
          $('#etapa').html(lista);
        }
      });
      
     });
    
    
  });
  
</script>