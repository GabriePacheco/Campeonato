<?php
  require_once('confi.php');
?>
 <div class="ventana">
      <div class="titulos" >Campeonatos</div>            
      <div class="subtitulos">Lista de campeonatos ingresados.</div>
      <div  id="conten" class="conten">
       <?php include_once('tabla_campeonatos.php');?>
      </div>
      <div class="v_pie">     
          <div id="botones_t">
          <?php
                for ($i=1;$i<=$total_paginas;$i++){  
                echo "<a href='javascript:reload(".$i.")' >".$i."</a>";
           } 
          ?>
            <a href="?mm1=ncampeonato">(+)Add</a>
            <div id="bts" class="inac">
            <a href="#" id="borrar" >(x)Remove</a>
            <a href="#"id=editar " >(e)Edit</a>
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
        data: 'tabla=campeonatos&id='+$("#selecionado").val(),
        success:function (m){
          mensaje(m);
          reload();
          
        }
        });    
                
     })
     
     
     
     
     
            
     
        
     $('#editar').click(function (){
         
        document.location.href="inicio.php?mm1=ecampeonato&id="+$("#selecionado").val();    
     })
    
    
    
  });
  
  
  
function reload(page){   

     $.ajax({
        url:'tabla_campeonatos.php',
        type: 'POST',
        data: "page="+page,
        success:function (tabla){
          $('#conten').html(tabla);
        }
     });
     
 } 
 
 
</script>
