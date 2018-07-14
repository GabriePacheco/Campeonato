<?php
require_once('conexion.php');
$user=$_POST['usr'];
$calve=$_POST['clave'];
$login=mysql_query("SELECT * FROM admin WHERE usuario='".$user."'");
$row_login=mysql_fetch_assoc($login);
$n=mysql_num_rows($login);
if ($n>=1){
  if ($row_login['clave']==md5($calve)){
    if($row_login["estado"]>0){
      
        session_start ();
        $_SESSION['id_usuario']=$row_login['id'];
        $_SESSION['n_usuario']=$user;  
         
       if($_POST['rem']==1){
         setcookie ("campeonato_interno", md5($_SESSION['id_usuario']), time()*60*60*360 );
        mysql_query("UPDATE admin SET fecha_u_i='".date('Y/m/d H:i:s')."', cookie='".md($_SESSION['id_usuario'])."' WHERE id='".$_SESSION['id_usuario']."'") or die (mysql_error());
      }else{
        mysql_query("UPDATE admin SET fecha_u_i='".date('Y/m/d H:i:s')."' WHERE id='".$_SESSION['id_usuario']."'  ") or die (mysql_error()); 
      }
            
               
    }else{
         echo "m_error. este usuario no esta activo."; 
    }
  }else{
  echo "m_error. La contrasela ingrresada no es correcta.";
  }
  
}else{
 echo "m_error. El usuario ingresado no es correcto";
}
?>