<?php
  require_once('confi.php');
?>
 <div class="ventana">
      <div class="titulos" >Fechas</div>            
      <div class="subtitulos">Detalle de los días y horas a jugarse partidos.</div>
      <div  id="conten" class="conten">
       <?php include_once('tabla_fechas.php');?>
      </div>
      <div class="v_pie">     
          <div id="botones_t">
          <?php
                for ($i=1;$i<=$total_paginas;$i++){  
                echo "<a href='javascript:reload(".$i.")' >".$i."</a>";
           } 
          ?>
            <a href="?mm1=nfecha">(+)Add</a>
            <div id="bts" calss="inac">
            <a href="#" id="borrar" >(x)Remove</a>
            <a href="#" id="editar" >(e)Edit</a>
            </div>
          </div>
      </div>
               
</div>

<script>
  $(document).ready(function (){
    
    $('tr').click(function (){
        $('tr').css({background: '#FFF'});
        $(this).css({background: '#FFFFCC'});
        var seleccionado = $(this).attr('id');
        $("#selecionado").val($(this).attr('id')); 
    });
    
  
 
       
     
        
     $('#borrar').click(function (){
         
        $.ajax({
        url:'borrar.php',
        type: 'post',
        data: 'tabla=fechas&id='+$("#selecionado").val(),
        success:function (m){
          mensaje(m);
          reload();
          
        }
        });    
                
     })
     
     
     
     
     
            
     
        
     $('#editar').click(function (){
       
        document.location.href="inicio.php?mm1=efecha&id="+$("#selecionado").val();    
     })
    
    
    
  });
  
  
  
function reload(page){   

     $.ajax({
        url:'tabla_fechas.php',
        type: 'POST',
        data: "page="+page,
        success:function (tabla){
          $('#conten').html(tabla);
        }
     });
     
 } 
 
 
</script>
