<?php
 require_once('confi.php');
 $juegos=mysql_query("SELECT * FROM juego ORDER BY estado, campeonato_id");
 $row_juegos=mysql_fetch_assoc($juegos);
 $tjuego=mysql_num_rows($juegos);
?>
<input type="hidden" id="selecionado"  name="selecionado"  value=""> 
<div>
     <table class="mostrar">
            <tr>
                <th>Reg.</th>
                <th>Campeonato.</th>
                <th>Estado</th>
                <th>Pago</th>
                <th>Precio / Costo </th>
                <th>Premio</th>
                <th>Acumulado</th>
                <th>Comisión</th>  
            </tr>
            <tr>
            <?php if($tjuego<1){ echo "<td colspan=6> No existen registros";} else{ ?>
             <?php do { 
                $row_capeonato=mysql_fetch_assoc(mysql_query("SELECT * FROM CAMPEONATOS WHERE id='".$row_juegos['campeonato_id']."'"));    
             ?>
             
              <tr id="<?php echo  $row_juegos['id']; ?>">
                  <td><?php echo  $row_juegos['id']; ?></td>  
                   <td><?php echo  $row_capeonato['nombre']; ?></td>
                   <td><?php  if($row_juegos['estado']==1){echo 'Activo';}else{echo 'Finalizado';} ?></td> 
                   <td><?php  if($row_juegos['pago']==1){echo 'SI';}else{echo 'No';} ?></td>  
                   <td><?php echo  $row_juegos['valor']; ?></td>
                   <td><?php echo  $row_juegos['premio']; ?></td>
                   <td><?php echo  $row_juegos['acumulado']; ?></td>
                   <td><?php echo  $row_juegos['comision']; ?></td>
                   
              </tr>
             
             <?php }while($row_juegos=mysql_fetch_assoc($juegos)); ?>
            
            
            <?php } ?>
            
            </tr>
     </table>
</div>

<script>
$(document).ready( function () {
 $('tr').click(function (){
        $('tr').css({background: '#FFF'});
        $(this).css({background: '#FFFFCC'});
        document.getElementById('selecionado').value=$(this).attr('id');
        var seleccionado = $(this).attr('id');  
        $('#bts').removeClass('inac');
        
      
 });
 
 
   
  $('tr').dblclick(function (){
    emergente('ejuego', $('#selecionado').val());  
  });
})
</script> 
