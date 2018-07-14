<?php
require_once('confi.php');
$admin=mysql_query("SELECT * FROM admin");
$row_admin=mysql_fetch_assoc($admin);

?>
<input type="hidden" id="selecionado"  name="selecionado"  value=""> 
      <table class="mostrar">
        <tr>
          <th>Reg.</th>
          <th>Usuario</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Mail</th>
          <th>Ingreso</th>
          <th>Estado</th>         
        </tr>     
      <?php do { 
      $tes=mysql_query("SELECT * FROM estados WHERE valor ='".$row_admin['estado']."'")or die (mysql_error()) ;
      $row_tes=mysql_fetch_assoc($tes);
       ?>
         <tr  id="<?php echo $row_admin['id'];?>">
          <td><?php echo $row_admin['id'];?></td>
          <td><?php echo $row_admin['usuario'];?></td>
          <td><?php echo $row_admin['Nombre'];?></td>
          <td><?php echo $row_admin['apellido'];?></td>
          <td><?php echo $row_admin['mail'];?></td>
          <td><?php echo $row_admin['fecha_u_i'];?></td>
          <td><?php echo $row_tes['etiqueta'];?></td>       
         </tr>
      <?php }while($row_admin=mysql_fetch_assoc($admin)); ?>
      </table>
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
    emergente('eadmin', $('#selecionado').val());  
  });
})
</script>                      