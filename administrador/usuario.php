<?php
  require_once('confi.php');
  $userE=mysql_query("SELECT * FROM users WHERE id='".$_GET['id']."'");
  $row_userE=mysql_fetch_assoc($userE);
  $estados1=mysql_query('SELECT * FROM estados');
  $row_estados1=mysql_fetch_assoc($estados1); 
?>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<a style="width:100%;color:#fff;text-aling:right;background:#999;padding:0.3em;" href="javascript:cerrar()" ><b>x</b></a>
<div class="usuario">
  &nbsp;
  <div>
    <div class="titulo_u" id="datos_titulo"><h4>Datos de la Cuenta.</h4></div>
    <div class="cuerpo_u" id="datos_cuerpo"> 
       <table width= "100%">
       <tr>
        <td width="5%">Username: </td>
        <td width="60%"> <input type="text" class="c_usuario" id="user" name="user" value="<?php echo $row_userE['user'];?>" ></td>
        <td width="25%">&nbsp; </td>
        
       </tr>
      <tr>
        <td width="50%">Mail: </td>         
        <td><input type="text" class="c_usuario" id="mail" name="mail" value="<?php echo $row_userE['mail'];?>" ></td>
      </tr>
      <tr>
        <td width="50%">Password: </td>         
        <td><input type="text" class="c_usuario" id="pass" name="pss" value="<?php echo $row_userE['pass'];?>" ></td>
      </tr>
      <tr>
        <td width="50%">Facebook id: </td>         
        <td><input type="text" class="c_usuario" id="facebook" name="facebook" value="<?php echo $row_userE['facebook_id'];?>" ></td>
      </tr>     
      <tr>
        <td width="50%">Avatar: </td>         
        <td><input type="text" class="c_usuario" id="avatar" name="Avatar" value="<?php echo $row_userE['avatar'];?>" ></td>
      </tr>
      </table>
    </div>
  </div>
  
  
  <div>
    <div class="titulo_u" id="personales_1"><h4>Datos Personales.</h4></div>
     <div class="cuerpo_u" id="personales_cuerpo"> 
      <table width= "100%">
       
       <tr>
        <td width="50%">Nombre: </td>
        <td width="50%"> <input type="text" class="c_usuario" id="nombre" name="nombre" value="<?php echo $row_userE['nombre'];?>" ></td>
       </tr>
      <tr>
        <td width="50%">Apellido: </td>         
        <td><input type="text" class="c_usuario" id="apellido" name="apellido" value="<?php echo $row_userE['apellido'];?>" ></td>
      </tr>
      <tr>
        <td width="50%">Identificación: </td>         
        <td><input type="text" class="c_usuario" id="identificacion" name="identificacion" value="<?php echo $row_userE['identificacion'];?>" ></td>
      </tr>
      <tr>
        <td width="50%">Fecha de nacimiento: </td>         
        <td><input type="text" class="c_usuario" id="fecha_n" name="fecha_n" value="<?php echo $row_userE['fecha_n'];?>" ></td>
      </tr>     
      <tr>
        <td width="50%">Dirección : </td>         
        <td><input type="text" class="c_usuario" id="direccion" name="direccion" value="<?php echo $row_userE['dirección'];?>" ></td>
      </tr>
      </table>
     </div> 
      
  </div>
  <div>
   <div class="titulo_u" id="actividad_1"><h4>Actividad.</h4></div>
     <div class="cuerpo_u" id="actividad_cuerpo"> 
    <table width= "100%">
      <tr>
       <td width="50%">Ultimo ingreso</td>
       <td width="50%"><?php echo $row_userE['ultomo_ingreso'];?></td>
      </tr >
      <tr>
       <td width="50%">Ip ingreso</td>
       <td width="50%" ><?php echo $row_userE['ip_ingreso'];?></td>
       
      </tr>
      <tr>
       <td width="50%">Estado</td>
       <td width="50%" >
       <select id="estado" class="c_usuario">
        <?php do{
         if ($row_estados1['valor']==$row_userE['estado']){
          echo "<option id='".$row_estados1['valor']."' selected >".$row_estados1['etiqueta']."</option>";
         }  else{
          echo "<option id='".$row_estados1['valor']."'  >".$row_estados1['etiqueta']."</option>";
         }
        }while($row_estados1=mysql_fetch_assoc($estados1)); ?>
       </select></td>
      </tr>
       <tr>
       <td width="50%">Cookie</td>
       <td width="50%"><?php echo $row_userE['cookie'];?></td>
      </tr>
    </table>
    </div>
  </div>
  <div>
     <div class="titulo_u"><h4>Cartones/Pagos/compra.</h4></div>
     <div class="cuerpo_u">
     
     </div> 
  </div>
</div>
<script>

  $(document).ready(function (){
  
    $('.titulo_u').click(function (){
        var que= $(this).attr('id').split('_');
        acor="#"+que[0]+"_cuerpo";
           
       $(acor).toggle();
      
    });
    
  });
</script>