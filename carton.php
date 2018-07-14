&nbsp;
<h3>Demuesta cuanto sabes de Futbol</h3>
<div class="panel panel-warning"> 
 <div class="panel-heading"><b>HAZ TU PREDICCIÓN!</b><br> Completa el marcador <b>¿Podras hacertar en todos los resultados?</b>  </div>
 <div class="panel-body"> 
  <div>
    <div class="row text-center">
      <div class="col-xs-3">Local</div>
      <div class="col-xs-6">Marcador</div>
      <div class="col-xs-3">Visita</div>
    </div>
    <form class="form-horizontal" id = "n_carton"> 
      <input type="hidden" name="campeonato_id"  id = "campeonato_id" value="<?php echo $row_campeonato['id']; ?>">
      <input type="hidden" name="fecha_id"  id = "fecha_id" value = "<?php echo $row_fechaJ['id']; ?>">
      <input type="hidden" name="user_id"  id = "user_id" value = "<?php if (isset($row_usuario_enlinea['id'])){echo $row_usuario_enlinea['id'] ;} else {echo ""; }?>">
      <input type="hidden" name="pago" id = "pago" value = "<?php echo $row_campeonato['pago'];?>">
     
    <?php 
    do  {
      $row_l=mysql_fetch_array(mysql_query("select * from equipos where id= '".$row_par['equipo_local_id']."' ")) ;
      $row_v=mysql_fetch_array(mysql_query("select * from equipos where id= '".$row_par['equipo_visita_id']."' ")) ;
      ?>
     <div class="row text-center">
      <div class="col-xs-3 col-lg-4">
        <div class="row">
          <div class="col-lg-4 col-md-12"> <img src="imagenes/<?php echo $row_l['log_equipo'];?>"  class="img-responsive"></div>
          <div class="col-lg-8 col-md-12"><?php echo $row_l['descripcion_equipo'] ;?></div>
        </div>
      </div>
      <div class="col-xs-6 col-lg-4">
          <input type="hidden" name="partido_id[]" id = "partido_id[]?>" value = "<?php echo $row_par['id'];?>" >
          <div class="row">
            <div class="col-xs-6">
            <select class="form-control" required id="local_m[]" name = "local_m[]">
              <option value =""> - </option>
              <?php 
                
                for ($con1 = 0; $con1<=10; $con1++){
              ?>
                <option value ="<?php echo $con1;?> " )> <?php if ($con1==-1): echo "-"; else: echo $con1; endif; ?> </option>
              <?php }?>  
            </select>
            </div>
            <div class="col-xs-6">            
              <select class="form-control" required id="visita_m[]"  name="visita_m[]">
                <?php 
                  
                  for ($con1 = -1; $con1<=10; $con1++){
                ?>
                  <option vallue ="<?php echo $con1;?> " <?php if ($con1==-1 ) echo "selected" ;?> )> <?php if ($con1==-1): echo "-"; else: echo $con1; endif; ?> </option>
                <?php }?>  
              </select>
            </div>

          </div>
      </div>
      <div class="col-xs-3 col-lg-4">
        <div class="row">
          <div class="col-lg-8 col-md-12 hidden-xs hidden-md"><?php echo $row_v['descripcion_equipo'] ;?></div>
          <div class="col-lg-4 col-md-12"><img src="imagenes/<?php echo $row_v['log_equipo'];?>"  class="img-responsive"></div>
          <div class="col-lg-8 col-md-12 hidden-lg"><?php echo $row_v['descripcion_equipo'] ;?></div>
        </div>
      </div>
    </div>
    <?php 
    }while ( $row_par=mysql_fetch_array($par));
    ?>
    <button class = "btn btn-default" id = "add_carton" type="submit"> Enviar </button>
  </form>
  </div>
  
  

 
 </div>
<div class="panel-footer"> </div>
</div>
