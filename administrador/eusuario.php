<?php
  require_once('confi.php');
  $userE=mysql_query("SELECT * FROM users WHERE id='".$_GET['id']."'");
  $row_userE=mysql_fetch_assoc($userE);
  $estados1=mysql_query('SELECT * FROM estados');
  $row_estados1=mysql_fetch_assoc($estados1); 
  
?>
<style>
       .titulo{
               color: #000;
       }
       .tabla{ 
               display: table;
               width: 100%;
               vertical-align: middle;
                
                     
       }
       .row{ 
               display: table-row;
               height: 1.5em;
                              
                     
       }
       .row:hover{
                  background: #99999F;
       }
      
       .cell{
             display: table-cell;
             width: 50%;
       }
       .boton2{
              float: right;
              width: 25%;
       }
</style>
</style>

<a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:cerrar()" ><b>x</b></a>
<div class="vent" >
     <form  id="cuenta">
     <div class="titulo">Datos de la cuenta.</div>
     <div class="dinamico">
          <div class="tabla" >
               <div class="row">
                    <div class="cell">E- mail : </div>
                    <div class="cell"><input type="text" id="mail" name = "mail"  value="<?php echo $row_userE['mail'] ?>"> </div>
               </div>
               <div class="row">
                    <div class="cell">Pasword: </div>
                    <div class="cell">***********</div>  
               </div>
               <div class="row">
                    <div class="cell">Facebook id: </div>
                    <div class="cell"><?php echo $row_userE['facebook_id']; ?> </div>  
               </div>
                <div class="row">
                    <div class="cell">Avatar: </div>
                    <div class="cell"><?php echo $row_userE['avatar']; ?> </div>  
               </div>
               
               <div class="row">
                     <div class="cell"> </div>
                    <div class="cell">  <input type="submit" value="guardar" class="boton2"></div>
                  
               </div>
          </div> 
     </div>  
 </div>


<script>
$(document).ready(function () {
 $('.dinamico').hide();
  $('.titulo').click(function (){
    var cont=$(this).parent().attr('id') ;
    $("#"+cont).find('.dinamico').toggle();
  });
 
 $('form').submit(function (){
                         
           return false;                                           
 });  
 
  
});


  
</script>
