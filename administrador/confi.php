<?php
   require_once("conexion.php");

    $confi=mysql_query('SELECT * FROM configuracion ');
    $row_confi=mysql_fetch_assoc($confi);
  
  /*if ($row_user['estado']==1){$check="checked";}*/
  $estados=mysql_query('SELECT * FROM estados') ;
  $row_estados=mysql_fetch_assoc($estados);
  header('Content-Type: text/html; charset=iso-8859-1');      
  
?>

 