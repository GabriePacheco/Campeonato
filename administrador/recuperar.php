<?php
 require_once('confi.php');
 $que=$_GET['que'];
 
  switch ($que){
    case 'etapas':
    $etapasr=mysql_query('SELECT * FROM etapas WHERE id_campeonato='.$_GET['id'].' AND estado=1');
    $row_etapasr=mysql_fetch_assoc($etapasr);
    echo  "<option>Seleccione una etapa..</option>"  ;
      do {
        echo  "<option value='".$row_etapasr['id']."'>".$row_etapasr['nombre_etapa']."</option>"  ;
      }while($row_etapasr=mysql_fetch_assoc($etapasr));
     break;
     
     case 'fechas':
    $fechasr=mysql_query('SELECT * FROM fechas WHERE etapa_id='.$_GET['id'].' AND estado=1   ORDER BY programa');
    $row_fechasr=mysql_fetch_assoc($fechasr);
    echo  "<option>Seleccione una fecha..</option>"  ;
      do {
        $row_programa=mysql_fetch_assoc(mysql_query("SELECT * FROM programa WHERE id='".$row_fechasr['programa']."'"));
        
        echo  "<option value='".$row_fechasr['id']."' class='".$row_programa['clase']."'>".$row_fechasr['nombre_fecha']." &nbsp;  &nbsp;(".$row_fechasr['fecha'].")</option>"  ;
      }while($row_fechasr=mysql_fetch_assoc($fechasr));
     break;
    
    
  }

?>