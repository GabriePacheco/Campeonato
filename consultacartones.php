<?php
	require_once ("conexion.php");


	$consulta = $_GET["carton"];
	$carton = mysql_query ("select * from cartones where id ='".$consulta."' ");
	$row_carton = mysql_fetch_array($carton);

	

?>
<h3>Consulta de cartones </h3>
<div class="row">
	<div class="col-md-12">
		<img class= "img-responsive"  src="imagenes/cartones/<?php echo $row_carton["id"];?>.png" >

		
	</div>
</div>