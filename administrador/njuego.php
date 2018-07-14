<?php 
     require_once('confi.php');
     $campeonato_n = mysql_query("SELECT * FROM campeonatos WHERE estado >0") or die (mysql_error());
     $row_campeonaton = mysql_fetch_assoc($campeonato_n);
?>
  <a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:cerrar()" ><b>x</b></a>

  <div class="titulos">Nuevo Juego</div>
  <div class="subtitulos">Agrega un juego a la tabla</div>
  <div class="conten2">
       <form id="njuego"  >
      <input type="hidden" id="formulario" name="formulario"  value="njuego">
       
       <div>
                <select id="campeonato_n" name="campeonato_n" class="caja" required>
                    <option value="">Seleciona una opción </option>
                    <?php
                         do{ 
                     ?>
                            <option value="<?php echo $row_campeonaton['id'];?>">  <?php echo $row_campeonaton['nombre'];?></option>                 
                       
                     <?php      
                         }while($row_campeonaton = mysql_fetch_assoc($campeonato_n));
                     ?>
               
             </select>
             
       </div>
       <div > 
            <input type="checkbox" id="pagon" name="pagon"  class="switch">
            <label for="pagon">Juego de pago</label>
              
       </div>  
       <div>   
               <input type="text" id="coston" name="coston" placeholder="Costo carton" >$
               
       </div>
        <div>   
               <input type="text" id="premion" name="premion" placeholder="Premion inicial" >$
               
       </div >
       
      <div>   
               <input type="text" id="comision" name="comision"  placeholder="Comision porcentaje">%
               
       </div>
         <div>   
               <input type="hidden" id="acumulado" name="acumulado" > 
               
       </div>
       <div>
            <input type="submit" value="Guaradar" class="boton">
       </div>
      </form>
  </div>
<script>
        $('#pagon').change(function (){
                                    
                   if ($(this).attr('checked') == true){
                      $(this).val('1');
         
                   }else{
                        $(this).val('0');
                   }                
        });
         $('#premion').change(function (){
                     $('#acumulado').val($(this).val());                  
                  
        });
        $('#njuego').submit(function (){
                      $.ajax({
                         type: 'post',
                         url: 'in_campeonato.php',
                         data: $('#njuego').serialize(),
                         success: function (data){
                         mensaje(data);
                         reload();  
                         cerrar();                               
                             }
                          });                
                     
                  
                     return false               
        });
        
        
</script>  
