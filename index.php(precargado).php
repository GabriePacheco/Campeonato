<?php
  session_start(); 
  
 ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charse" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Prueva de login con Facebook</title>
   <!-- Internet Explorer HTML5 enabling code: -->
        
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        
        <style type="text/css">
        .clear {
          zoom: 1;
          display: block;
        }
        </style>

        
        <![endif]-->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">        
<link href="estilo.css" rel="stylesheet" type="text/css">

</head>

<body>
	<section id="pagina" >
       <section>	
    	<header>
        	<aside> <h2>Campani-Logo</h2 ></aside>
           	<aside id="loginer">
            	<nav>
              
               <?php include "secion.php";?>
                    
            	</nav>
            </aside>
        </header>
       </section>
       <section id="menu">
       		<aside >
            	<nav>
                	<ul>
                    	<li><a href="#">Campeonato</a></li>
                        <li><a href="#">Noticias</a></li>
                        
                    </ul>
                </nav>
            </aside>
            
       		<aside id="redes">
            	<nav>
                   <ul>	
                  	<li><a href="#"><img src="logofacebook.png"  width="16em"></a></li>
                    <li><a href="#"><img src="logotwitter.png"  width="16em"></a></li>
                    <li><a href="#"><img src="logoinstagram.png"  width="16em"></a></li>
                   </ul> 
                </nav>
            </aside>
            
       </section>
       <section id="contenido">
       		<section id="publicidad_1"></section>
           	<section id="partidos">
              
            	<?php
                if (!isset($_GET['page'])): 
                  include_once('partidos.php');
                endif; 
              ?>
            
            </section>
       		<aside>
            	<article><h2>Prediccion o cartones</h2> </article>                            
            </aside>
            <aside> Acumulado/ comentarios </aside>
            <section>Proximas fechas</section>
       </section>
       
       <section>
     	<footer>Pie de pagina</footer>
       </section> 
	</section>
  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<script type="text/javascript" src="funciones.js"></script>
    
</body>
</html>
