<?php 
require_once('confi.php');
 
?>

<script type="text/javascript" src="jquery-te-1.4.0.min.js"  charset="utf-8" ></script>
<link type="text/css" rel="stylesheet" href="jquery-te-1.4.0.css">
  <div class="ventana">
  
  <div class="titulos">Términos y Condiciones</div>
  <div class="subtitulos">Condiciones y términos legales </div>
  <div >&nbsp;</div>
    <textarea id="terminos" name="terminos" class="caja" placeholder="Introdusca el texto">
      <?php echo utf8_decode($row_confi['condiciones']);?>
    </textarea>
    <div class="v_pie"><input type="button" class="boton" value="Guardar" id='guardar'> </div>
  </div>
  
  
<script>
	$('#terminos').jqte();
	
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
          {formulario: 'terminos', terminos:$('#terminos').val()},
          function (x){
          mensaje(x);
          $('#guardar').val('Guardar')
          });
    
  });
  

</script>


