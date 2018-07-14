<?php
   require_once('confi.php');
   $juego=mysql_query("SELECT * FROM juego WHERE id='".$_GET['id']."'");
   $row_juego=mysql_fetch_assoc($juego);
   
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:cerrar()" ><b>x</b></a>
 <div class="conten2">
   <form action="" id="ejuego">
         <input type="hidden" id="formulario" name="formulario" value="ejuego"> 
         <input type="hidden" id="did" name="did" value="<?php echo $row_juego['id']; ?>"> 
         <div class="titulos" >Editar juego</div>
         <div style="margin-left: 2em; ">
         <select id="campeonato2" name="campeonato2" class="caja"  required>
           <?php  
                $cam=mysql_query('SELECT * FROM campeonatos WHERE estado > 0');
                $row_cam=mysql_fetch_assoc($cam);
                do{
                   if ($row_cam['id'] ==  $row_juego['campeonato_id']){
                   echo "<option value='".$row_cam['id']."' selected >".$row_cam['nombre']."(".$row_cam['id'].")</option>";
                   }else{
                     
                     echo "<option value='".$row_cam['id']."'  >".$row_cam['nombre']."</option>";
                   }                    
                   
                }while($row_cam=mysql_fetch_assoc($cam));   
                
           ?>
                 
                  
         </select>
         </div>     
         <div >
               <input type="checkbox"  id ="estado" name="estado" class="switch" value="<?php echo $row_juego['estado'] ;?>" <?php if($row_juego['estado']==1){echo 'checked';} ?> >
               <label for="estado" >Estado.</label>     
        </div>
        <div>
               <input type="checkbox"  id ="pago" name="pago"  class="switch" value="<?php echo $row_juego['pago'] ;?>"  <?php if($row_juego['pago']==1){echo 'checked';} ?> >
               <label for="pago" >Pago. </label>     
        </div>  
       <div >
            <input type="text" id="valor" name="valor"  class="switch"  value="<?php echo $row_juego['valor'] ;?>"  placeholder="P.v.p del carton">$ Costo por carton.
       </div>
       <div >     
            <input type="text" id="premio" name="premio" value="<?php echo $row_juego['premio'] ;?>" placeholder="Premio inicial">$  Premio inicial.
       </div>
       <div >     
            <input type="text" id="comision" name="comision"  value="<?php echo $row_juego['comision'] ;?>" placeholder="Porcentaje de ganancia" >% Porsentaje de comicion . 
            
       </div>         
       <div >            
                
                 <input type="submit" class="boton" id="puti" value="Guardar">
      </div>            
</form>
     
 </div> 

     
<script>
  $(document).ready(function(){ 
 
    $('#estado').change(function (){
        if ($(this).attr('checked')==true){
           $(this).val(1);
        }else{
              $(this).val(0);
        }                      
    });
    
    
      $('#pago').change(function (){
        if ($(this).attr('checked')==true){
           $(this).val(1);
        }else{
              $(this).val(0);
        }                      
    });
    
    
    
    
   
   $('#ejuego').submit(function() {
      $.ajax({
        type: 'post',
        url: 'editar.php',
        data: $('#ejuego').serialize(),
        success: function (data){
                mensaje(data) ;    
                reload();  
                cerrar();                               
        }
      });
      
      return false;
   });     

  
   
        
   });
</script>
