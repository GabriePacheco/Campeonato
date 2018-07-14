
      <div class="ventana">                        
      <div class="titulos" >Administradores</div>       
      <div class="subtitulos">Configuracion de administradores.</div>
      <div class="conten" id="conten">
         
      </div>
      <div class="v_pie">
        <div id="botones_t">
          
            <a href="#" id="add">(+)Add</a>
            <div id="bts" class="inac">
            <a href="#" id="rp" >(x)Reset pass</a>
            <a href="#" id="borrar" >(x)Remove</a>
            <a href="#"id=editar  >(e)Edit</a>
            </div>
          </div>
      
      </div>
      </div>

<script> 

$(document).ready(function (){
  
  $('#conten').load('tabla_administradores.php')   ;
  $('#rp').click(function (){
    $.post('editar.php', 
    {id: $('#selecionado').val(),formulario:'pasword' }, 
    function (m){
      mensaje(m);
  
    } );
  });

  
  $("#borrar").click( function (){
    
   $.post('borrar.php',
    { tabla: 'admin', id: $('#selecionado').val()},
     function(datos) {
        reload();
    });                           
  });
  

  $('#editar').click(function (){
    emergente('eadmin', $('#selecionado').val());  
  });
  $('#add').click(function (){
      emergente('nadmin', $('#selecionado').val());  
  
  } );

  
  
  
  
    
    
});
 
  
  
 function reload(page){ 
    $('#emergente').addClass('no-visible');  
      $.ajax({
        url:'tabla_administradores.php',
        type: 'POST',
        data: "page="+page,
        success:function (tabla){
          $('#conten').html(tabla);
        }
     });
     
 }   

 
</script>    

       