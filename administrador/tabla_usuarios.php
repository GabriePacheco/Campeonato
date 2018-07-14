<?php
  require_once('confi.php');
  $usuarios=mysql_query("SELECT * FROM users");
  $total_usuarios=mysql_num_rows($usuarios);
  $tama_pagina=10;
  $tpaginas=  ceil($total_usuarios/$tama_pagina);
  
  if (isset($_POST['pagina'])){
    $pagina=$_POST['pagina'] ;
    $desde=($_POST['pagina']-1)*$tama_pagina;
  }else{
     $desde=0;
     $pagina=1;
  }
  if (isset($_POST['busqueda'])){
     $buscar=$_POST['busqueda'];
  }else{
    $buscar='';
  } 
  
  if (isset($_POST['ord'])){
     $ord=$_POST['ord'];
  }else{
    $ord='id';
  } 
  $user=mysql_query("SELECT * FROM users WHERE mail LIKE '%".$buscar."%' OR nombre LIKE '%".$buscar."%'  OR apellido LIKE '%".$buscar."%' ORDER BY '".$ord."' LIMIT ".$desde.", ".$tama_pagina) or die(mysql_error());
  $row_user=mysql_fetch_assoc($user);
  

?>
&nbsp;
<table class="mostrar">
  <tr >
    <th><a href="javascript:order('id')" style="text-decoration:none; color:#999;">Id</a></th>
    
    <th><a href="javascript:order('nombre')" style="text-decoration:none; color:#999;">Nombre</a></th>
    <th><a href="javascript:order('apellido')" style="text-decoration:none; color:#999;">Apellido</a></th>
    <th><a href="javascript:order('mail')" style="text-decoration:none; color:#999;">Mail</a></th>
    <th><a href="javascript:order('estado')" style="text-decoration:none; color:#999;">Estado</a></th>
  </tr>
  <?php do{
  $restadoa=mysql_fetch_assoc(mysql_query("SELECT * FROM estados WHERE valor='".$row_user['estado']."'")); 
   ?>
   <tr id="<?php echo $row_user['id']; ?>" >
      <td><?php echo $row_user['id']; ?></td>
   
      <td><?php echo $row_user['nombre']; ?></td>
      <td><?php echo $row_user['apellido']; ?></td>
      <td><?php echo $row_user['mail']; ?></td>
      <td><?php echo $restadoa['etiqueta']; ?></td>
      
      
   </tr> 
  <?php }while($row_user=mysql_fetch_assoc($user))  ;?> 
   
   
</table>
<script>
    $('tr').click(function (){
        $('tr').css({background: '#FFF'});
        $(this).css({background: '#FFFFCC'});
        
      
    });
    $('tr').dblclick(function (){
       var reg=$(this).attr('id');
       emergente('eusuario',reg)
      
    });
    
</script>

