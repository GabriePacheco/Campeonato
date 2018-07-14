<?php
  require_once('confi.php');
  $campeonatos =mysql_query("select * from campeonatos WHERE estado > 0");
  $row_campeonatos =mysql_fetch_assoc($campeonatos);
  $etapas=mysql_query("select * from etapas where estado > 0");
  $row_etapas=mysql_fetch_assoc($etapas);                 
  $fechas=mysql_query("select * from fechas where estado > 0 ");
  $row_fechas=mysql_fetch_assoc($fechas);
    
?>
<div class="ventana">
  <div class="titulos">Catones </div>
  <div class="subtitulos">Gestor cartones.</div>
  <div class="conten" id="conten">
  
    <div class="busqueda"><form id="cartonesb" name="cartonesb" >
                                                          
      <select id ="campeonatos" name="campeonatos">
              <option value="0">Selecciona un capeonato </option> 
              <?php
                   do {
                      echo "<option value='".$row_campeonatos['id']."'>".$row_campeonatos['nombre']."</option>";
                   }while($row_campeonatos =mysql_fetch_assoc($campeonatos)); 
              ?>                                                    
      </select>    
      <select  id="fechas" name = "fechas" >
                  <option value="0">Selecciona una etapa.</option>
                  <?php
                       do {
                             echo "<option value='".$row_fechas['id']."'>".$row_fechas['nombre_fecha']."</option>";
                       }while ($row_fechas=mysql_fetch_assoc($fechas)); 
                     
                  ?>
                           
      </select>
      <select id="ganador" name="ganador">
              <option value="0">No ganador</option >
              <option value="1">Ganador</option >
              
      </select>       
      <input id="usuario"  name="usuario"  placeholder="filtra por usuario">     
                                                      
     <input type="submit" id="bus" class="botons" value="Buscar"></form>
     &nbsp;
     </div> 
      
    <div id="tabla"><?php include_once('tabla_cartones.php'); ?></div>
  </div>
  <div class="v_pie">
   <div class="barra_pag">
    <?php
        for ($i=1;$i<=$total_cartones;$i++){
          
            echo "<div class='pag' ><a href='javascript:paginar(".$i.")'>".$i."</a></div>";
          
            
    }?>
   </div>
  </div>
  
</div>
<script>
 
 $(document).ready( function (){
  $("#cartonesb").submit(function (){

   $.post('tabla_cartones.php',
                               $( "#cartonesb" ).serialize(),
          function (x){
          $('#tabla').html(x) ;
          });
       
     return false;
  });
                                       

  
 
 });
  
  function paginar(m){
 $.post('tabla_cartones.php',
          {pagina: m, busqueda: $('#buscar').val()},
          function (x){
          $('#tabla').html(x) ;
          });
    
  
  }
  
  function order(y){
 $.post('tabla_cartones.php',
          { busqueda: $('#buscar').val(), ord:y},
          function (w){
          $('#tabla').html(w) ;
          });
    
  
  }
  function busq(){
  
          $.post('tabla_cartones.php',
          {busqueda: $('#buscar').val()},
          function (x){
          $('#tabla').html(x) ;
          });
  
  }
  
</script>

