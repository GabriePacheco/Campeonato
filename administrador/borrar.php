<?php
 require_once('confi.php');
 mysql_query("DELETE FROM ".$_POST['tabla']." WHERE id='".$_POST['id']."'") or die (mysql_error());
 echo "Borrado con exito.";
?>