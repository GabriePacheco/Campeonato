&nbsp;
<h3>Demuesta cuanto sabes de Futbol</h3>
<div class="panel panel-warning"> 
 <div class="panel-heading"><b>HAZ TU PREDICCIÓN!</b><br> Completa el marcador <b>¿Podras hacertar en todos los resultados?</b>  </div>
 <div class="panel-body"> 
  <table class="table">
   <thead>
    <tr >
     <th colspan="2" class="text-center">Local </th>
     <th colspan="2" class="text-center"> <b>Marcador </b></th>
     <th colspan="2" class="text-center"> Visita </th>
    </tr> 
   </thead>
   <tbody>
    <?php 
    do  {
      $row_l=mysql_fetch_array(mysql_query("select * from equipos where id= '".$row_par['equipo_local_id']."' ")) ;
      $row_v=mysql_fetch_array(mysql_query("select * from equipos where id= '".$row_par['equipo_visita_id']."' ")) ;
      ?>
      <tr>
        <td width="10%"> <img src="imagenes/<?php echo $row_l['log_equipo'];?>"  class="img-responsive"></td>
        <td width="30%" class="text-left"> <?php echo $row_l['descripcion_equipo'] ;?></td>
        <td width="10%" >
          <select class="form-control">
            <?php 
              
              for ($con1 = -1; $con1<=10; $con1++){
            ?>
              <option vallue ="<?php echo $con1;?> " <?php if ($con1==-1 ) echo "selected" ;?> )> <?php if ($con1==-1): echo "-"; else: echo $con1; endif; ?> </option>
            <?php }?>  
          </select>
        <td width="10%"><input class="form-control" type="number" min="0" ></td>
        <td width="30%" class="text-right"> <?php echo $row_v['descripcion_equipo'] ; ?></td>
        <td width="10%"> <img src="imagenes/<?php echo $row_v['log_equipo'];?>"  class="img-responsive"></td>

      </tr>  
      <?php 
    }while ( $row_par=mysql_fetch_array($par));
    ?>
      
   </tbody>

 </table>
 </div>
<div class="panel-footer"></div>
</div>
