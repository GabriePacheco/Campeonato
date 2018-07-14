<?php  
  require 'conexion.php' ;
  if (!isset($_GET['registro'])):
      $sql = "select * from campeonatos where defa =1";  
  else:   
       $sql = "select * from campeonatos where id =".$_GET['registro'];
  endif;
      $campeonato = mysql_query($sql);
      $row_campeonato = mysql_fetch_array($campeonato);

  $fechas = mysql_query("select * from fechas where id_campeonato = '".$row_campeonato['id']."' order by programa");
  $row_fechas = mysql_fetch_array($fechas);

  
  $campeonatos=mysql_query("select * from campeonatos where estado > 0");
  $row_campeonatos = mysql_fetch_assoc($campeonatos);

  $fechaJ=mysql_query("select * from fechas where programa=1 and id_campeonato=".$row_campeonato['id']);
  $row_fechaJ=mysql_fetch_assoc($fechaJ);

  $par=mysql_query("select * from partidos where fecha_id='".$row_fechaJ['id']."' order by programa,horario");
  $row_par=mysql_fetch_array($par);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Marca Gool Gana</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    body{
      background: #888;
    }

  </style>
</head>
<body>
   
  <div id="warper">
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Marcagoolgana</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          
      
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $row_campeonato['nombre'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php do {  ?>
                    <li><a href="?registro=<?php echo $row_campeonatos['id'];?>"><?php echo $row_campeonatos['nombre'];?></a></li>
                <?php }while ( $row_campeonatos = mysql_fetch_assoc($campeonatos));?>
                
              </ul>
            </li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> </span> <span class="caret"></span></a>
              <ul class="dropdown-menu"> 
                <div class="container ">
                  <div class="row" id = "secion">
                    <?php include 'secion.php';?>
                  </div>
                </div> 
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
 
    <div class="row">
      <?php if (!isset($_GET['navegador'])): ?>
        <?php include "partidos.php"; ?>
      <?php endif; ?>
       <div class="col-md-10 col-md-offset-1 panel panel-default">
          <div class="row">
            <div class="col-md-8">
              <div class="row"> 
                  <div class="col-md-12">                   
                    <?php
                      if (!isset($_GET['navegador'])):
                        include 'carton.php';
                      else:
                        if ($_GET['navegador']=="/registo"):
                            include "registro.php";
                        endif;
                        if ($_GET['navegador']=="/cartones"):
                            include "consultacartones.php";

                        endif;


                      endif;

                      ?>
                </div>
                 
              </div>
            </div>
            <div class="col-md-4">
                <?php 
                     if ($_GET['navegador']=="/cartones"):
                               include "carton.php";      
                      endif;
                ?> 
              <?php require_once 'tabla.php';?>
            </div>
          </div>
       </div>

      

    </div>
  </div>
 

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="funciones.js"></script>



</body>
</html>
