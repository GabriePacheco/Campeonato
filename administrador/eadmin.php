<?php
  require_once('confi.php');
  $user=mysql_query("SELECT * FROM admin WHERE id='".$_GET['id']."'") or die (mysql_error());
  $row_user=mysql_fetch_assoc($user);
    if ($row_user['estado']==1){$check="checked";}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:cerrar()" ><b>x</b></a>

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
                        <label>Mail</label>
                        <input type="email" id="mail" name="mail"  class="caja"  value="<?php echo $row_user['mail']; ?>" required  placeholder="Nombre Completo" />
                    </div>
                    
                
                    <div>
                         <input type="checkbox" id="estado" name="estado"    value="<?php echo $row_user['estado']; ?>"  <?php if ($row_user['estado']==1){echo 'checked';}?>  value="<?php echo $row_user['estado'] ;?>"/> Activo. 
                    </div>
                
              </div>
             <div class="v_pie"><input type="submit" class="boton" id="puti" value="Guardar"> </div>
             <input type="hidden" name="did" id="did" value="<?php echo $row_user['id']; ?>" >
             </form>
     
       </div>

     
<script>
  $(document).ready(function(){ 
 
    $('#estado').click(function (){
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
        reload();                                 
        }
      });
      return false;
   });     

  
   
        
   });
</script>
