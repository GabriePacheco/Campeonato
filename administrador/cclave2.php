<?php
  require_once('confi.php');
?>

      <div class="ventana">
               <form action="" id="contraseña"> 
               <div class="titulos" >Cambiar contraseña.</div>
                   
                   <div class="subtitulos">Cambia la contraseña del usuario.</div>
                   <div class="conten">
                
                
                    <div>
                      <input type="password" id="clave" name="calve"  class="caja" required  placeholder="Contrasela Actual" />
                      <label>&nbsp;</label>
                      <input type="password" id="pwd1" name="pwd1"  class="caja" required  placeholder="Nueva Contraseña" />
                      <input type="password" id="pwd2" name="pwd2"  class="caja" required  placeholder="Confirmar la contraseña" /> 
                    </div>
                
                    
              </div>
             <div class="v_pie"><input type="submit" class="boton" id="puti" value="Guardar"> </div>
             <input type="hidden" name="did" id="did" value="<?php echo $row_user['id']; ?>" >
             </form>
     
       </div>

     
<script>
     
    var checkPasswordValidity = function() {
      if (password1.value != password2.value) {
       password2.setCustomValidity('Contraseñas no coinciden.');
      }else{
           password2.setCustomValidity('');
        }   
        
        $.ajax({
        type: 'POST',
        url:'login.php',
        data: 'usr=@gp13&clave='+password3.value,
        success: function (data){
                   if (data != false ) {
                   password3.setCustomValidity(data);
                  }else{
                     password3.setCustomValidity('');
                 }   
        }
        
        });
            
    } ;
  
  
    password1.addEventListener('change', checkPasswordValidity, false);
    password2.addEventListener('change', checkPasswordValidity, false);
    password3.addEventListener('change', checkPasswordValidity, false);
  
$(document).ready(function (){
    $('#contraseña').submit( function (){
    
      
                  
    var password1 = document.getElementById('pwd1');
    var password2 = document.getElementById('pwd2');
    var password3 = document.getElementById('clave');
 
     
        checkPasswordValidity();   
       if (!this.checkValidity()) {
            event.preventDefault();                 
            password1.focus();
        }
        
             
      return false;
    
    });
    



    
    
    
    
    
    
    
})
  
 
  
    
        
</script>
