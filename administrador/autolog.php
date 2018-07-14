<?php
require_once('conexion.php');
$login=mysql_query("SELECT * FROM admin WHERE cookie='".$_POST['cok']."'");
$row_login=mysql_fetch_assoc($login);
$n=mysql_num_rows($login);
if ($n>=1){

    if($row_login["estado"]>0){
             
        mysql_query("UPDATE admin SET fecha_u_i='".date('Y/m/d H:i:s')."'") or die (mysql_error()); 
        session_start ();
        $_SESSION['id_usuario']=$row_login['id'];
        $_SESSION['n_usuario']=$row_login['usuario'];
        echo 1 ;      
               
    }else{
         echo "NO"; 
    }

  
}else{
 echo "NO";
}
?>  

