<?php 
require_once('confi.php');
 
?>
<script type="text/javascript" src="jquery-te-1.4.0.min.js" charset="utf-8"></script>
<link type="text/css" rel="stylesheet" href="jquery-te-1.4.0.css">
  <div class="ventana">
  
  <div class="titulos">La empresa</div>
  <div class="subtitulos">Pagina de descripción de la empresa(Nosotros).</div>
  <div >&nbsp;</div>
    <textarea id="nosotros" name="nosotros" class="caja" placeholder="Introdusca el texto">
      <?php echo utf8_decode($row_confi['nosotros']);?>
    </textarea>
    <div class="v_pie"><input type="button" class="boton" value="Guardar" id='guardar'> </div>
  </div>
  
  
<script>
	$('#nosotros').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
  


  $('#guardar').click(function (){
  
    $(this).val('Guardando');
    $.post('editar.php',
          {formulario: 'nosotros', nosotros:$('#nosotros').val()},
          function (x){
          mensaje(x);
          $('#guardar').val('Guardar')
          });
    
  });
  

</script>


