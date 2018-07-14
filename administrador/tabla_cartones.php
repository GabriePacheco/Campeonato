<?php
     require_once('confi.php');
     $cartones=mysql_query('select * from cartones');
     $row_cartones=mysql_fetch_assoc($cartones);
     $total_cartones =mysql_num_rows($cartones);
     $tamaño_pagina=20;
     if (isset($_POST['pagina'])){
      $pagina=$_POST['pagina'] ;
      $desde=($_POST['pagina']-1)*$tamaño_pagina;
     }else{                                                                            
      $desde=0;
      $pagina=1;
    }
     $order="fecha_id";
     if (isset($_POST['campeonatos'])){
        $cam=" and campeonato_id = ".$_POST['campeonatos'];
     }else{
        $cam=" ";
     }
     if (isset($_POST['fechas'])){
        $fecha=" or fecha_id = ".$_POST['fechas'];
     }else{
        $fecha=" ";
     }
     if (isset($_POST['ganador'])){
        $ganador=" or ganador = ".$_POST['ganador'];
     }else{
        $ganador=" ";
     }
    
            
    $car=mysql_query("select * from cartones WHERE estado > 0 ".$cam."  ".$fecha." ORDER BY ".$order." LIMIT ".$desde.",".$tamaño_pagina) or die (mysql_error());
    $row_car=mysql_fetch_assoc($car);
    if (mysql_num_rows($car)):   
?>

<div>                                      
<table class="mostrar">
       <tr>
           <th>Carton N</th>
           <th>Usuario</th>

           <th>fecha</th>
           <th>campeonato</th>
           <th>Estado</th>
           <th>Ganador</th>
       </tr>
    <?php
         do {
          $row_user=mysql_fetch_assoc(mysql_query("select * from users where id=".$row_car['user_id']));  
          $row_fecha=mysql_fetch_assoc(mysql_query("select * from fechas where id=".$row_car['fecha_id']));
          $row_campeonato=mysql_fetch_assoc(mysql_query("select * from campeonatos where id=".$row_car['campeonato_id']));
    ?>
         <tr id="<?php echo $row_car['id'];?>">
             <td> <?php echo $row_car['id'];?> </td> 
             <td> <?php echo $row_user['mail'];?> </td>
             <td> <?php echo $row_fecha['nombre_fecha'];?> </td> 
             <td> <?php echo $row_campeonato['nombre'];?> </td>
             <td> <?php if ($row_car['estado']==1){ echo "Activo ";}else{echo "no disponible";}?> </td> 
             <td> <?php if  ($row_car['ganador']==1){echo "Si";}?> </td>
             
         </tr>
    <?php     
         } while( $row_car=mysql_fetch_assoc($car)); 
    ?>
</table>
</div>
<?php endif ?> 
<script>
    $('tr').click(function (){
        $('tr').css({background: '#FFF'});
        $(this).css({background: '#FFFFCC'});
        
      
    });
    $('tr').dblclick(function (){
       var reg=$(this).attr('id');
       emergente('vercarton',reg)
      
    });
    
</script>

 