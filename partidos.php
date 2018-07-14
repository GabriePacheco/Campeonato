<?php 
  $partidos=mysql_query("select * from partidos where fecha_id='".$row_fechas['id']."' order by programa,horario");
  $row_partidos= mysql_fetch_array($partidos);
  $totalpartidos= mysql_num_rows($partidos);
 
?>
<div class="col-md-10 col-md-offset-1 panel panel-default">
    <h3 class="text-center"><?php echo $row_campeonato['nombre']  ," Resultados ",   $row_fechas['nombre_fecha'];?></h3>
  <div class="row panel-body">
    <?php

    if ($totalpartidos>0):

      do{
          $local= mysql_query("select * from equipos where id=".$row_partidos['equipo_local_id']);
          $row_local= mysql_fetch_assoc($local);
           $visita= mysql_query("select * from equipos where id=".$row_partidos['equipo_visita_id']);
          $row_visita= mysql_fetch_assoc($visita);
    ?>
    <div class="col-md-2 col-sm-2 col-lg-2 col-xs-12 panel panel-default">
          <div class="row">
            <div class="col-md-6  col-xs-6">
             <small class="hidden-xs hidden-sm"><small><small ><?php echo $row_local['descripcion_equipo'] ?></small></small></small>
              <div class="row"> 
                  <div class="col-md-8 col-xs-6 text-center"><img src="imagenes/<?php echo $row_local['log_equipo']?>" width="100%"></div>
                  <div class="col-md-2  col-xs-6  text-center"><h2><small><?php if ($row_partidos['marcador_local'] == null ):echo "-";else:echo $row_partidos['marcador_local'] ; endif; ?></small></h2></div>

              </div>
            </div>
            <div class="col-md-6  col-xs-6 ">
               <small class="hidden-xs hidden-sm"><small><small><?php echo $row_visita['descripcion_equipo'] ?></small></small></small>
                <div class="row"> 
                  
                  <div class="col-md-2 col-xs-6 text-center"><h2><small><?php if ($row_partidos['marcador_local'] == null ):echo "-";else:echo $row_partidos['marcador_visita'] ; endif; ?></small></h2></div>
                  <div class="col-md-8 col-xs-6"><img src="imagenes/<?php echo $row_visita['log_equipo']?>" width="100%"></div>

              </div>
            </div>
          </div>
          <div class="text-center"> <small> <span class="glyphicon glyphicon-calendar"></span> <?php echo date("d/m/Y",strtotime($row_partidos['horario'])); ?> <span class="glyphicon glyphicon-time"></span> <?php echo date("H:i",strtotime($row_partidos['horario'])); ?></small></div>
          <div class="text-center text-success">
            <small> <b>
          <?php 
            $programa=mysql_query("select * from programa where id=".$row_partidos['programa']);
            $row_programa=mysql_fetch_array($programa);
            echo $row_programa['etiqueta'];
          ?>
        </b>
         </small>
        </div>
    </div>
    <?php }while( $row_partidos= mysql_fetch_array($partidos) );
    else:
      echo "No hay partidos programados";
    endif;
    ?>
    

  </div>
</div>
