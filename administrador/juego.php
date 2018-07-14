<div class="ventana">
     <div class="Titulos">Juego</div>
     <div class="subtitulos">Configuración de juego.</div>
     <div class="conten" id="conten">
              <?php include_once('tabla_juegos.php'); ?>
     </div>
     <div class="v_pie">
          <div id="botones_t">
            <a href="#" id="add1">(+)Add</a>
            <div id="bts" class="inac">
               <a href="#" id="borrar" >(x)Remove</a>
                <a href="#"id=editar  >(e)Edit</a>
            </div>
          </div>  
     </div>
</div>


    <script> 
        
    
        $('#add1').click(function (){
          
          emergente('njuego', 1 );  
                               
     });  
        
     $('#editar').click(function (){
          
          emergente('ejuego', $('#selecionado').val() );  
                               
     });   
     $('#borrar').click(function (){
         
        $.ajax({
        url:'borrar.php',
        type: 'post',
        data: 'tabla=juego&id='+$("#selecionado").val(),
        success:function (m){
          mensaje(m);
          reload();
          
        }
        });    
                
     })
     
     
     function reload(page){   

     $.ajax({
        url:'tabla_juegos.php',
        type: 'POST',
        data: "page="+page,
        success:function (tabla){
          $('#conten').html(tabla);
        }
     });
     
 } 
     </script>