<?php
require_once('confi_cuenta.php');
?>

      <div class="ventana">
               <form action="" id="mi_cuenta"> 
               <div class="titulos" >Mi Cuenta</div>
                   
                   <div class="subtitulos">Configuración de la cuenta.</div>
                   <div class="conten">
                    <div>
                      <label>Usuario</label>
                      <input type="textbox" id="usuario" name="usuario"   class="caja" value="<?php echo $row_user['usuario']; ?>" required />
                    </div>
                     <div>
                        <label>Nombre</label>
                        <input type="textbox" id="nombre" name="nombre"  class="caja"  value="<?php echo $row_user['Nombre']; ?>" required /> 
                    </div>
                
                    <div>
                        <label>Apellido</label>
                        <input type="textbox" id="apellido" name="apellido"  class="caja"  value="<?php echo $row_user['apellido']; ?>" required  placeholder="Nombre Completo" /> 
                    </div>
                
                    <div>
                         <input type="checkbox" id="estado" name="estado" class="switch" value="<?php echo $row_user['estado']; ?>"  <?php echo $check;?>  value="<?php echo $row_user['estado'] ;?>"/> Activo.
                         <label for="estado">&nbsp; Activo</label> 
                    </div>
                
              </div>
             <div class="v_pie"><input type="submit" class="boton" id="puti" value="Guardar"> </div>
             <input type="hidden" name="did" id="did" value="<?php echo $row_user['id']; ?>" >
             </form>
     
       </div>

     
<script>
       
  $(document).ready(function(){ 
       
    $('#estado').change(function (){
           if ($(this).attr('checked')==true){
             $(this).val(1);  
           }
    });
   
   $('#mi_cuenta').submit(function() {
      $.ajax({
        type: 'post',
        url: 'guardar1.php',
        data: $('#mi_cuenta').serialize(),
        success: function (data){
           mensaje(data);
             
                     
        }
      });
      return false;
   });     

  
   
        
   });
</script>
