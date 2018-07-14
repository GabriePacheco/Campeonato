<?php
  require_once('confi.php');
  
  $tamañopagina=25;
  $totalr=mysql_num_rows(mysql_query("SELECT * FROM fechas"));
  if (isset($_POST['page'])){
    $pagina=$_POST['page'];
    $inicio=($pagina-1)* $tamañopagina;
    if ($inicio<0){
      $inicio=0;
      $pagina=1;
      
    }    
  }else{
   $inicio=0;
   $pagina=1;
  }
  
  $total_paginas=ceil($totalr/$tamañopagina);
  
   
  $fechas=mysql_query("SELECT * FROM fechas LIMIT ".$inicio.",".$tamañopagina) or die(mysql_error());  
  $row_fechas=mysql_fetch_assoc($fechas);
  if (mysql_num_rows($fechas)>0){
  
?>            
<input type="hidden" id="selecionado"  name="selecionado"  value="">                           
<table class="mostrar">                    
  <tr>                              
    <th>id</th>                                                    
    <th>Nombre Fecha</th> 
    <th>Campeonato</th>  
    <th>Temporada</th>
    <th>Fecha</th>                            
    <th>Estado</th>
    <th>Programa</th>                                   
  </tr>                    
  <?php do {
  $row_programa=mysql_fetch_assoc(mysql_query("SELECT * FROM  programa WHERE id='".$row_fechas['programa']."'"));
  ?>     
                     
    <tr id="<?php echo $row_fechas['id']; ?>" >      
    <td><?php echo $row_fechas['id']; ?></td>
    <td><?php echo $row_fechas['nombre_fecha']; ?></td>  
    <td><?php $row_ecamp=mysql_fetch_assoc(mysql_query("SELECT * FROM campeonatos WHERE id='".$row_fechas['id_campeonato']."'")); 
            echo $row_ecamp['nombre']; 
    ?></td>
    <td><?php
        $row_temporada=mysql_fetch_assoc(mysql_query("SELECT * FROM etapas WHERE id='".$row_fechas['etapa_id']."'")) ;
        echo $row_temporada['nombre_etapa'];
       ?></td>
       
       <td><?php echo $row_fechas['fecha'];?></td>
    <td><?php
     $row_estadoa=mysql_fetch_assoc(mysql_query("SELECT * FROM estados WHERE valor='".$row_fechas['estado']."'"));
     echo $row_estadoa['etiqueta']          ?> </td> 
     
     <td  class="<?php echo $row_programa['clase'];?>">
      <?php 
         
        echo $row_programa['etiqueta'];
      ?>
     </td>                               
  </tr>                     
  <?php }while($row_fechas= mysql_fetch_assoc($fechas)); ?>               
</table>   
<?php }else{
  echo "No existen fechas ingresadas..";
}?>                    
<script>        
    $('tr').click(function (){
        $('tr').css({background: '#FFF'});
        $(this).css({background: '#FFFFCC'});
        document.getElementById('selecionado').value=$(this).attr('id');
        var seleccionado = $(this).attr('id');
        $('#bts').removeClass('inac');  
        
      
    });
</script>      
