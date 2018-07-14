<?php
require_once('confi.php');
$ecampeonato=mysql_query("SELECT * FROM campeonatos WHERE id='".$_GET['id']."'")or die(mysql_error());
$row_ecampeonato=mysql_fetch_assoc($ecampeonato);
?>
<div class="ventana">               
  <form id="ecampeonato" action="?mm1=campeonatos" method="POST" >
  <input type="hidden" id="formulario" name="formulario" value="campeonato">                      
    <div class="titulos" >Editar campeonato     
    </div>                                            
    <div class="subtitulos">Cambia los parametros del registro.     
    </div>                        
    <div class="conten2" >  
      <div><label>Registro: <?php echo $row_ecampeonato['id']; ?>  <input type="hidden" id="reg" name="reg" value="<?php echo $row_ecampeonato['id']; ?>"> </label></div>                                                         
      <div>                                    
        <input type="text" id="c_nombre" name="c_nombre"  class="caja" required  placeholder="Nombre de campeonato"  value="<?php echo $row_ecampeonato['nombre'];?>"/>
      </div>
        
        <div>      
                                   
          <select id="estado" name="estado"  class="caja">
              <?php
                do{
                
                if ($row_ecampeonato['estado']!=$row_estados['valor']){
                echo "<option value='".$row_estados['valor']."' >".$row_estados['etiqueta']."</option>";
                  }else{
                 echo "<option value='".$row_estados['valor']."' selected='selected'>".$row_estados['etiqueta']."</option>" ;
                }
                }while($row_estados=mysql_fetch_assoc($estados)); 
              ?>
          </select>
      </div>     
      
      <div>                                                        
        <input type="text" id="obser" name="obser"  class="caja" required  placeholder="descriptción"  value="<?php echo $row_ecampeonato['descripcion'];?>" />                                                   
      </div>
      <div>
           <input type="checkbox"  id="defa" name="defa" <?php if ($row_ecampeonato['defa']==1){echo "checked";} ?> value="<?php echo $row_ecampeonato['defa'] ;?>" class="switch">
           <label for="defa">Mostrar por defecto.</label>
      </div>  
       <div>
            <input type="checkbox"  id="pago" name="pago" <?php if ($row_ecampeonato['pago']==1){echo "checked";} ?> value="<?php echo $row_ecampeonato['pago'] ;?>" class="switch">
           <label for="pago">Campeonato de pago.</label>
            
       </div> 
       <div>
            <input type="text" id="precio_carton" name="precio_carton" value="<?php echo $row_ecampeonato['precio_carton'];?>" class="numero">$ Precion del carton.

       </div>   
       <div>
            <input type="text" id="acumulado" name="acumulado" value="<?php echo $row_ecampeonato['acumulado'];?>" class="numero">$ Valor acumulado.     
       </div>
       <div>
            <input type="text" id="premio_inicial" name="premio_inicial" value="<?php echo $row_ecampeonato['premio_inicial'];?>" class="numero">$ Premio inicial.
       </div> 
       <div>
            <input type="text" id="comicion" name="comision" value="<?php echo $row_ecampeonato['comision'];?>" class="numero">% comicion.
       </div>             
                                                             
    </div>                  
    <div class="v_pie">      
      <input type="submit" class="boton" id="puti" value="Guardar">      
    </div>                
  </form>              
</div>
<script>
  $(document).ready(function (){
  
    $('#defa').change(function (){
      if ($('#defa').attr('checked')==true){
        $(this).val(1);

      } else{
        $(this).val(0);
      }                              
         
    });
     
       $('#pago').change(function (){
      
        if ($('#pago').attr('checked')==true){
          $("#pago").val(1);

      } else{
        $("#pago").val(0);
      } 
                                           
    });

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