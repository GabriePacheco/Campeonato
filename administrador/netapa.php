<?php
  require_once('confi.php');
?>
<div class="ventana">            
  <form id="ncampeonato" action="?mm1=etapas" method="POST" > 
   <input type="hidden" id="formulario" name="formulario" value="etapa">                     
    <div class="titulos" >Nuevo Etapa
    </div>                                       
    <div class="subtitulos">Agrega un nuevo etapa activa a la tabla.
    </div>                   
    <div class="conten">                                                      
      <div>                      
        <input type="text" id="c_nombre" name="c_nombre"  class="caja" required  placeholder="Nombre de temporada" />  
      </div>
       <div>                                            
        <select id="etcampeonato" name="etcampeonato"  class="caja">
              <?php
                $ecampeonato=mysql_query("SELECT * FROM campeonatos WHERE estado>0")or die(mysql_error());
                $row_ecampeonato=mysql_fetch_assoc($ecampeonato);
                do{
                 
                  echo "<option  value='".$row_ecampeonato['id']."'>".$row_ecampeonato['nombre']."</option>";
                 
                  
                }while($row_ecampeonato=mysql_fetch_assoc($ecampeonato));
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
    $('#ncampeonato').submit(function (){
      $.ajax({
        url: 'in_campeonato.php',
        type: 'POST',
        data: $('#ncampeonato').serialize(),
        success: function (res){
          mensaje(res);
        }
      });
    });   
  });
  
</script>