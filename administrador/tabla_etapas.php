<?php
  require_once('confi.php');
  
  $tamañopagina=25;
  $totalr=mysql_num_rows(mysql_query("SELECT * FROM etapas"));
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
  
   
  $etapas=mysql_query("SELECT * FROM etapas  LIMIT ".$inicio.",".$tamañopagina) or die(mysql_error());  
  $row_etapas=mysql_fetch_assoc($etapas);
  if (mysql_num_rows($etapas)>0){
  
?>            
<input type="hidden" id="selecionado"  name="selecionado"  value="">                           
<table class="mostrar">                    
  <tr>                              
    <th>id                    
    </th>                              
                                
    <th>Nombre Etapa                    
    </th> 
     <th>Campeonato                    
    </th>                             
    <th>Estado                    
    </th>                               
  </tr>                    
  <?php do {?>                        
  <tr id="<?php echo $row_etapas['id']; ?>">          <td>                             
      <?php echo $row_etapas['id']; ?></td>                  <td>                                          
      <?php echo $row_etapas['nombre_etapa']; ?>                       </td>
      
       <td>              
<?php
            $row_ecamp=mysql_fetch_assoc(mysql_query("SELECT * FROM campeonatos WHERE id='".$row_etapas['id_campeonato']."'")) ; 
            echo $row_ecamp['nombre'];
                                         ?>               </td>
                <td>     
<?php
                $row_estadoa=mysql_fetch_assoc(mysql_query("SELECT * FROM estados WHERE valor='".$row_etapas['estado']."'"));
                echo $row_estadoa['etiqueta'];
                                            ?>                  </td>                                
  </tr>                     
  <?php }while($row_etapas= mysql_fetch_assoc($etapas)); ?>               
</table>   
<?php }else{
  echo "No existen etapas..";
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