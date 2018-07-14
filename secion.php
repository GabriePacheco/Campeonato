<?php
require_once "conexion.php";
  session_start();
  if (!isset($_SESSION['campeonato_id'])):
     
?>
<div class="col-md-2">
<div class="text-center"> <a class="btn btn-default" href="?navegador=/registo">Registrate</a></div>
</div>
<div class="col-md-4 col-md-offset-1 ">
  
  <form action="" id="login" class="form-horizontal" >
  <h5>Iniciar sesión.</h5>
    <div class="form-group">
      <input type="email" id="username" name="username" class="form-control" placeholder="Email" required>
    
      <input type="password" id="clave" name="clave"class="form-control" placeholder="Contraselña" required >
    
      <div class="row">
        <div class="col-md-6">
         
              <input type="checkbox" id="conectado"> Segiro conectado

        </div>
        <div class="col-md-6"> <a href="#">Si a olvidado su contraseña.</a></div>
      </div>
    </div>
    <div class="form-group text-right">
      <button type="submit" class="btn btn-default">Iniciar sesión </button>
    </div>
  </form>
</div>
 <div class="col-md-4  col-md-offset-1">
  <h4>&nbsp;</h4>
      <link rel="stylesheet" type="text/css" href="bootstrap-social/bootstrap-social.css">
                    <link href="bootstrap-social/assets/css/font-awesome.css" rel="stylesheet">
               
                    <a class="btn btn-block btn-social btn-facebook" id = "botonLoginFacebook"> <i class="fa fa-facebook"></i>Ingresa con facebook</a>
                 
                    <a class="btn btn-block btn-social btn-twitter"> <i class="fa fa-twitter"></i>Ingresa con twitter</a>
                    <a class="btn btn-block btn-social btn-google"> <i class="fa fa-google"></i>Ingresa con google +</a>
                  

</div>

<?php

  else:
   $usuario_enlinea= mysql_query("select * from users where id=".$_SESSION['campeonato_id']);
   $row_usuario_enlinea = mysql_fetch_array($usuario_enlinea);

 ?>

 <div class="col-md-2">
  &nbsp;
</div>
<div class="col-md-4 col-md-offset-1 ">
  
</div> 
<div class="col-md-4 col-md-offset-1 ">
      Tu perfil
      <h4><?php echo $row_usuario_enlinea['nombre']." ".$row_usuario_enlinea['apellido'] ; ?> <br><small><a href="#cuenta">Editar </a></small></h4>
      
      <div class="text-right">
        <a id= "logout"  class="btn btn-default text-right">Desconectar</a>   
      </div>
</div> 
<?php

  endif;
 ?>
