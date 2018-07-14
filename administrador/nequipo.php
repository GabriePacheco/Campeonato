<div class="ventana">            
  <form id="nequipo" action="?mm1=equipos" method="POST" > 
   <input type="hidden" id="formulario" name="formulario" value="equipo">                     
    <div class="titulos" >Nuevo Equipo
    </div>    
    
                                          
    <div class="subtitulos">Agrega un nuevo equipo activo a la tabla.
    </div>                   
    <div class="conten">                                                      
      <div class="form-imagen">
         <div class="form-imagen-celda" >
         <div id="upload_button">Cargar imagen.</div>
          <div id="lista"></div>
          
          
         </div>
        <div class="form-imagen-celda">                     
         <input type="text" id="c_nombre" name="c_nombre"  class="caja" required  placeholder="Nombre del Equipo" />
         <input type="text" id="img" name="img"  class="caja" required  placeholder="url imagen" readonly />                                   
         <input type="text" id="obser" name="obser"  class="caja" required  placeholder="descriptción" />                                            
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
  
  
  
    $('#nequipo').submit(function (){
      $.ajax({
        url: 'in_campeonato.php',
        type: 'POST',
        data: $('#nequipo').serialize(),
        success: function (res){
          mensaje(res);
        }
      });
    });   
  });
  
</script>