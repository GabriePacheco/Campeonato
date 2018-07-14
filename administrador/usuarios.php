<?php
  require_once('confi.php');
?>
<div class="ventana">
  <div class="titulos">Usuarios</div>
  <div class="subtitulos">Gestor usuarios externos(clientes).</div>
  <div class="conten" id="conten">
    <div class="busqueda"><form action="javascript:busq()"><input type="textbox" id="buscar" name="buscar"  placeholder="Buscar mail, nombre o usuario"> <input type="button" id="bus" class="botons" value="Buscar"></form></div>  
    <div id="tabla"><?php include_once('tabla_usuarios.php'); ?></div>
  </div>
  <div class="v_pie">
   <div class="barra_pag">
    <?php
        for ($i=1;$i<=$tpaginas;$i++){
          
            echo "<div class='pag' ><a href='javascript:paginar(".$i.")'>".$i."</a></div>";
          
            
    }?>
   </div>
  </div>
  
</div>
<script>
 
 $(document).ready( function (){
  $("#bus").click(function (){
   $.post('tabla_usuarios.php',
          {busqueda: $('#buscar').val()},
          function (x){
          $('#tabla').html(x) ;
          });
    
  });
  

  
 
 });
  
  function paginar(m){
 $.post('tabla_usuarios.php',
          {pagina: m, busqueda: $('#buscar').val()},
          function (x){
          $('#tabla').html(x) ;
          });
    
  
  }
  
  function order(y){
 $.post('tabla_usuarios.php',
          { busqueda: $('#buscar').val(), ord:y},
          function (w){
          $('#tabla').html(w) ;
          });
    
  
  }
  function busq(){
  
          $.post('tabla_usuarios.php',
          {busqueda: $('#buscar').val()},
          function (x){
          $('#tabla').html(x) ;
          });
  
  }
  
</script>

