<?php
  require_once('confi.php');
  $campeonatos=mysql_query("SELECT * FROM campeonatos WHERE estado>0");
  $row_campeonatos=mysql_fetch_assoc($campeonatos);
  
 ?>
<div class="ventana">               
                
    <div class="titulos" >Gestro Campeonato.     
    </div>                                            
    <div class="subtitulos">
      <select id="campeonato" name="campeonato" class="cajas">
        <option value="">Seleccione campeonato</option>
        <?php do{
        echo "<option value='".$row_campeonatos['id']."' >".$row_campeonatos['nombre']."</option>" ;
        
        }while( $row_campeonatos=mysql_fetch_assoc($campeonatos));
        ?> 
      </select>   
    </div>                        
    <div class="conten" id="conteng" >  
                                                                
    </div>                  
    <div class="v_pie">      
     &nbsp;
    </div>                
            
</div>
<script>
  $(document).ready(function(){
    $('#campeonato').change(function (){
      $('#conteng').html('cargando..');
      $.ajax({
        url:'tabla_gestor.php',
        type: 'post',
        data:'id='+$('#campeonato').val(),
        success: function(resultado){
            $('#conteng').html(resultado);
        }
        
        
      });
    });



  });
  
  function agestor(){
      $('#conteng').html('cargando..');
        $.ajax({
        url:'tabla_gestor.php',
        type: 'post',
        data:'id='+$('#campeonato').val(),
        success: function(resultado){
            $('#conteng').html(resultado);
        }
      });
  };
      
 
</script>