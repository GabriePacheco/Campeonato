<?php
require_once('confi.php');

$eequipo=mysql_query("SELECT * FROM equipos WHERE id='".$_GET['id']."'")or die(mysql_error());
$row_eequipo=mysql_fetch_assoc($eequipo);
?>
<div class="ventana">               
  <form id="eequipo" action="?mm1=equipos" method="POST" >
  <input type="hidden" id="formulario" name="formulario" value="equipo">                      
    <div class="titulos" >Editar Equipo     
    </div>                                            
    <div class="subtitulos">Cambia los parametros del registro.     
    </div>                        
    <div class="conten" >  
      <label> Registro: <?php echo $row_eequipo['id']; ?> </label>
       <input type="hidden" id="reg" name="reg" value="<?php echo $row_eequipo['id']; ?>"> </label>
           <div class="form-imagen">
         <div class="form-imagen-celda" >
         <div id="upload_button">Cambiar imagen.</div>
          <div id="lista"><img src="../imagenes/<?php echo $row_eequipo['log_equipo'] ?>" vidth="10em"></div>
        
          
         </div>
        <div class="form-imagen-celda">                     
         <input type="text" id="c_nombre" name="c_nombre"  class="caja" required  placeholder="Nombre del Equipo"  value="<?php echo $row_eequipo['nombre_equipo']; ?>"/>
         <input type="text" id="img" name="img"  class="caja" required value="<?php echo $row_eequipo['log_equipo']; ?>"  placeholder="url imagen" readonly  />                                   
         <input type="text" id="obser" name="obser"  class="caja" required  placeholder="descriptción" value="<?php echo $row_eequipo['descripcion_equipo']; ?>"/>
         <select id="estado" name="estado"  class="caja">
              <?php
                do{
                if ($row_eequipo['estado']!=$row_estados['valor']){
                echo "<option value='".$row_estados['valor']."' >".$row_estados['etiqueta']."</option>";
                  }else{
                 echo "<option value='".$row_estados['valor']."' selected='selected'>".$row_estados['etiqueta']."</option>" ;
                }
                }while($row_estados=mysql_fetch_assoc($estados)); 
              ?>
          </select>                                            
        </div>
      </div>
       
       
    </div>                 
    <div class="v_pie">      
      <input type="submit" class="boton" id="puti" value="Guardar">      
    </div>                
  </form>              
</div>
<script language="javascript" src="ajaxupload.min.js"></script>
<script>
  $(document).ready(function (){
  
        /***boton subir**/
    var button = $('#upload_button'), interval;
    new AjaxUpload('#upload_button', {
        action: 'upload.php',
        onSubmit : function(userfile , ext){
        if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
            // extensiones permitidas
            alert('Error: Solo se permiten imagenes');
            // cancela upload
            return false;
        } else {
            button.text('Cargando...');
            this.disable();
        }
        },
        onComplete: function(file, response){
            button.text('Cambiar imagen');
            // enable upload button
            this.enable();          
            // Agrega archivo a la lista
            $('#lista').html('<img src=../imagenes/'+response+' width=90%>');
            $('#img').val(response);
            
            
        }   
    });    
   /**subir**/
  
  
    $('#eequipo').submit(function (){
     
      $.ajax({
        url: 'editar.php',
        type: 'POST',
        data:   $('#eequipo').serialize(),
        success: function (res){

        mensaje(res);
        
          
        }
      });
      
            
    });   
    
   
    
    
  });
  
</script>