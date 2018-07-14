<?php
  require_once('confi.php');
  
  $tamañopagina=25;
  $totalr=mysql_num_rows(mysql_query("SELECT * FROM campeonatos"));
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
  
   
  $campeonatos=mysql_query("SELECT * FROM campeonatos  LIMIT ".$inicio.",".$tamañopagina) or die(mysql_error());  
  $row_campeonatos=mysql_fetch_assoc($campeonatos);
  
?>       
<input type="hidden" id="selecionado"  name="selecionado"  value="culo">                      
<table class="mostrar">
        <tr>
          <th>id</th>
          <th>Nombre campeonato</th>
          <th>Estado</th>
          <th>Descripcion</th>
          <th>Acumulado</th>
          
        </tr>
        <?php do {?>
        <tr id="<?php echo $row_campeonatos['id']; ?>">
          <td> <?php echo $row_campeonatos['id']; ?></td>
          <td><?php echo $row_campeonatos['nombre']; ?></td>
         <td>
               <?php
                $row_estadoa=mysql_fetch_assoc(mysql_query("SELECT * FROM estados WHERE valor='".$row_campeonatos['estado']."'"));
                echo $row_estadoa['etiqueta'];
              ?>
         
         </td>
          <td><?php echo $row_campeonatos['descripcion']; ?> <small style="color: #1f9; text-align: right;"><?php if ($row_campeonatos['defa']==1){echo "defa";}?></small></td>
           <td><?php echo $row_campeonatos['acumulado']; ?></td>
         </tr>
         <?php }while($row_campeonatos= mysql_fetch_assoc($campeonatos)); ?>
       </table>   
       
   
   <script>        
    $('tr').click(function (){
        $('tr').css({background: '#FFF'});
        $(this).css({background: '#FFFFCC'});
        document.getElementById('selecionado').value=$(this).attr('id');
        var seleccionado = $(this).attr('id'); 
        $('#bts').removeClass('inac'); 
        
      
    });
      </script> 