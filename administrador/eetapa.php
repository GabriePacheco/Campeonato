<?php
require_once('confi.php');

$eetapas=mysql_query("SELECT * FROM etapas WHERE id='".$_GET['id']."'")or die(mysql_error());
$row_eetapas=mysql_fetch_assoc($eetapas);
?>
<div class="ventana">               
  <form id="ecampeonato" action="?mm1=etapas" method="POST" >
  <input type="hidden" id="formulario" name="formulario" value="etapa">                      
    <div class="titulos" >Editar campeonato     
    </div>                                            
    <div class="subtitulos">Cambia los parametros del registro.     
    </div>                        
    <div class="conten" >  
      <label>Registro: <?php echo $row_eetapas['id']; ?>  <input type="hidden" id="reg" name="reg" value="<?php echo $row_eetapas['id']; ?>"> </label>                                                         
      <div>                                    
        <input type="text" id="c_nombre" name="c_nombre"  class="caja" required  placeholder="Nombre de la ecampeonato"  value="<?php echo $row_eetapas['nombre_etapa'];?>"/>
      </div>
      
      <div>
         <select id="etcampeonato" name="etcampeonato"  class="caja">
              <?php
                $ecampeonato=mysql_query("SELECT * FROM campeonatos")or die(mysql_error());
                $row_ecampeonato=mysql_fetch_assoc($ecampeonato);
                do{
                  if ($row_ecampeonato['id']!=$row_eetapas['id_campeonato']){
                  echo "<option  value='".$row_ecampeonato['id']."'>".$row_ecampeonato['nombre']."</option>";
                  }else{
                  echo "<option value='".$row_ecampeonato['id']."' selected='selected'>".$row_ecampeonato['nombre']."</option>";
                  }
                  
                }while($row_ecampeonato=mysql_fetch_assoc($ecampeonato));
              ?>
          </select>
      
      </div>
        
        <div>                                
           <select id="estado" name="estado"  class="caja">
              <?php
                do{
                if ($row_eetapas['estado']!=$row_estados['valor']){
                echo "<option value='".$row_estados['valor']."' >".$row_estados['etiqueta']."</option>";
                  }else{
                 echo "<option value='".$row_estados['valor']."' selected='selected'>".$row_estados['etiqueta']."</option>" ;
                }
                }while($row_estados=mysql_fetch_assoc($estados)); 
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
    $('#ecampeonato').submit(function (){
     
      $.ajax({
        url: 'editar.php',
        type: 'POST',
        data:   $('#ecampeonato').serialize(),
        success: function (res){
        mensaje(res);
        
          
        }
      });
      
            
    });   
  });
  
</script>