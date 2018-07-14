<?php
     require_once('confi.php');
     $car1=mysql_query("select * from cartones where id=".$_GET['id']) or die (mysql_error());

    $row_car1=mysql_fetch_assoc($car1);
?>
<a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:cerrar()" ><b>x</b></a>
<div>   
        &nbsp;                                   
<table >
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
          $row_user1=mysql_fetch_assoc(mysql_query("select * from users where id=".$row_car1['user_id']));  
          $row_fecha1=mysql_fetch_assoc(mysql_query("select * from fechas where id=".$row_car1['fecha_id']));
          $row_campeonato1=mysql_fetch_assoc(mysql_query("select * from campeonatos where id=".$row_car1['campeonato_id']));
    ?>
         <tr id="<?php echo $row_car1['id'];?>">
             <td> <?php echo $row_car1['id'];?> </td> 
             <td> <?php echo $row_user1['mail'];?> </td>
             <td> <?php echo $row_fecha1['nombre_fecha'];?> </td> 
             <td> <?php echo $row_campeonato1['nombre'];?> </td>
             <td> <?php if ($row_car1['estado']==1){ echo "Activo ";}else{echo "no disponible";}?> </td> 
             <td> <?php if  ($row_car1['ganador']==1){echo "Si";}?> </td>
             
         </tr>
    <?php     
         } while( $row_car1=mysql_fetch_assoc($car1)); 
    ?>
</table>
<?php 
      $partidos=mysql_query("select partido_id, lacal_m, visita_m from cpartidos  inner join partidos on partidos.fecha_id='".$row_car1['fecha_id']."'") or die (mysql_error());
      $row_partidos=mysql_fetch_assoc($partidos);
?>

<table>
       <?php do {?>
         <tr>
             <td><?php echo "id".$row_partidos['id']  ;?> </td>
             <td><?php echo "local_id".$row_partidos['id']  ;?> </td>
             <td><?php echo "local_id".$row_partidos['id']  ;?> </td>
         </tr>
       <?php }while ($row_partidos=mysql_fetch_assoc($partidos));?>
</table>