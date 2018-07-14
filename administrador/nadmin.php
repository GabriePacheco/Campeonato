<a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:cerrar()" ><b>x</b></a>

      <div class="ventana">
               <form action="" id="mi_cuenta"> 
               <input type="hidden" name="formulario" id="formulario" value="admin" >
               <div class="titulos" >Mi Cuenta</div>
                   
                   <div class="subtitulos">Configuración de la cuenta.</div>
                   <div class="conten">
                    <div>
                      
                      <input type="textbox" id="usuario" name="usuario"   class="caja" value="<?php echo $row_user['usuario']; ?>" required  placeholder="Usuario" />
                    </div>
                     <div>
                      
                        <input type="textbox" id="nombre" name="nombre"  class="caja"  value="<?php echo $row_user['Nombre']; ?>" required  placeholder="Nombre"/> 
                    </div>
                
                    <div>
                       
                        <input type="textbox" id="apellido" name="apellido"  class="caja"  value="<?php echo $row_user['apellido']; ?>" required  placeholder="Apellido" /> 
                    </div>
                    <div>
                        
                        <input type="email" id="mail" name="mail"  class="caja"  value="<?php echo $row_user['mail']; ?>" required  placeholder="E mail" />
                    </div>
                    
                
                
              </div>
             <div class="v_pie"><input type="submit" class="boton" id="puti" value="Guardar"> </div>
             <input type="hidden" name="did" id="did" value="<?php echo $row_user['id']; ?>" >
             </form>
     
       </div>

     
<script>
  $(document).ready(function(){ 
 
  
   
   $('#mi_cuenta').submit(function() {
      $.ajax({
        type: 'post',
        url: 'in_campeonato.php',
        data: $('#mi_cuenta').serialize(),
        success: function (data){
        reload();   
        mensaje(data); 
                     
        }
      });
      return false;
   });     

  
   
        
   });
</script>
