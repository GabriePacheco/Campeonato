<?php
  require_once('confi.php');
  
  $tamañopagina=25;
  $totalr=mysql_num_rows(mysql_query("SELECT * FROM equipos"));
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
  
   
  $equipos=mysql_query("SELECT * FROM equipos LIMIT ".$inicio.",".$tamañopagina) or die(mysql_error());  
  $row_equipos=mysql_fetch_assoc($equipos);
  if (mysql_num_rows($equipos)>0){
  
?>            
<input type="hidden" id="selecionado"  name="selecionado"  value="">                           
<table class="mostrar">                    
  <tr>                              
    <th>id</th>                                                    
    <th>Nombre Equipo</th> 
    <th>Logo</th>
    <th>Descripcion</th>                           
    <th>Estado</th>                                   
  </tr>                    
  <?php do {?>                        
    <tr id="<?php echo $row_equipos['id']; ?>" >
           
    <td><?php echo $row_equipos['id']; ?></td>
    <td><?php echo $row_equipos['nombre_equipo']; ?></td>         
    <td> <?php echo "<img src=../imagenes/".$row_equipos['log_equipo']." width='60em' />";?> </td> 
    <td><?php echo $row_equipos['descripcion_equipo']; ?></td>  
       
    <td><?php
     $row_estadoa=mysql_fetch_assoc(mysql_query("SELECT * FROM estados WHERE valor='".$row_equipos['estado']."'"));
     echo $row_estadoa['etiqueta']          ?> </td> 
     
                                    
  </tr>                     
  <?php }while($row_equipos= mysql_fetch_assoc($equipos)); ?>               
</table>   
<?php }else{
  echo "No existen equipos ingresadas..";
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