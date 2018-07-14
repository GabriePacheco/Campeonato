<?php
  require_once('confi.php');
?>
<div class="ventana">            
  <form id="nfecha" action="?mm1=fechas" method="POST" > 
   <input type="hidden" id="formulario" name="formulario" value="fecha">                     
    <div class="titulos" >Programar Fechas</div>                                       
    <div class="subtitulos">Agregar partodos.</div>                   
    <div class="conten">
      <div>
          <select id="campeonato1" name="campeonato1"  class='caja' required>
          <option value="">Seleccione un campeonato...</option>
           <?php 
             $camp=mysql_query("SELECT * FROM campeonatos WHERE estado>0");
             $row_camp=mysql_fetch_assoc($camp);
             do{
             echo "<option value='".$row_camp['id']."'  >".$row_camp['nombre']." </option>";
             }while($row_camp=mysql_fetch_assoc($camp));     
           ?> 
          </select>
      </div>  
      <div>
        <select id="temporada" name="temporada" disabled="disabled" required class="caja" placeholder="Escojer temporada" >
        </select>
      </div>
      <div>
        <select id="fecha" name="fecha" disabled="disabled" required class="caja" placeholder="Escojer temporada" >
        </select>
      </div>
            
      <div>
        <h4>Partidos</h4>
        <div id="partidos"> </div>
      </div>
              
                                                        
                                                       
    </div>  
               
    <div class="v_pie">
      
      <div id="botones_t" class="inac">
          
      
  
            <a href="#" id="ad_partido" >(+)Add</a>
           <div id="bts" class="inac">
            <a href="#" id="borrar" >(x)Remove</a>
            <a href="#" id="editar"  >(e)Edit</a>
           </div>
          </div>
      
    </div>             
  </form>             
</div>
<script>

  $(document).ready(function (){
       
   $('#ad_partido').click(function(){
      $('#partidos').html('cargando..');
      $.ajax({
        type: 'POST',
        url: 'npartido.php',
        data: $('#nfecha').serialize(),
        success: function (pagina){
         $('#partidos').html(pagina); 
        }
      });
   }); 
   
   $('#campeonato1').change(function (){
     $('#fecha').html('<option>cargando..</option>');
      var data = "que=etapas&id="+ $('#campeonato1').val();
      $.ajax({
        url:'recuperar.php',
        type: 'get',
        data: data,
        success: function(lista){
          $('#temporada').removeAttr('disabled');
          $('#temporada').html(lista);
        }
      }); 
      
    });
       $('#temporada').change(function (){
         $('#fecha').html('<option>cargando..</option>');
         var data = "que=fechas&id="+ $('#temporada').val();
      $.ajax({
        url:'recuperar.php',
        type: 'GET',
        data: data,
        success: function(lista2){
          $('#fecha').removeAttr('disabled');
          $('#fecha').html(lista2);
        }
      });
      
    });
     $('#fecha').change(function (){
       $('#partidos').html('carganado..');
       var data2 =$('#nfecha').serialize();
      $.ajax({
        url:'recuperar_partidos.php',
        type: 'POST',
        data: data2,
        success: function(partidos){
          $('#partidos').removeAttr('disabled');
          $('#botones_t').removeClass('inac');
          $('#partidos').html(partidos);
        }
      });
      
    });
  
  
      
     $('#borrar').click(function (){
         
        $.ajax({
        url:'borrar.php',
        type: 'post',
        data: 'tabla=partidos&id='+$("#selecionado").val(),
        success:function (m){
          mensaje(m);
          reload();
          
        }
        });    
                
     }) ;
    
     
      
     $('#editar').click(function (){
         
        $.ajax({
        url:'epartido.php',
        type: 'post',
        data: 'tabla=partidos&id='+$("#selecionado").val(),
        success:function (m){
           $('#partidos').html(m); 
          
        }
        });    
                
     }) ;
     
     
     
     
     
  
  
    
  });
  
  
  function reload(page){   

     $.ajax({
        url:'recuperar_partidos.php',
        type: 'POST',
        data: $('#nfecha').serialize(),
        success:function (tabla){
          $('#partidos').html(tabla);
        }
     });
     
 }
  
</script>