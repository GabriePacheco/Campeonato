<div class="ventana">            
  <form id="ncampeonato" action="?mm1=campeonatos" method="POST" > 
   <input type="hidden" id="formulario" name="formulario" value="campeonato">                     
    <div class="titulos" >Nuevo campeonato
    </div>                                       
    <div class="subtitulos">Agrega un nuevo campeonato activo a la tabla.
    </div>                   
    <div class="conten">                                                      
      <div>                      
        <input type="text" id="c_nombre" name="c_nombre"  class="caja" required  placeholder="Nombre de campeonato" />                                             
        <input type="text" id="obser" name="obser"  class="caja" required  placeholder="descriptción" />                                            
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