
<h3>Inscripción</h3>
<h4>Ingresa con tu cuenta social.</h4>

<link rel="stylesheet" type="text/css" href="bootstrap-social/bootstrap-social.css">
<link href="bootstrap-social/assets/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap/css/docs.css"> 
 <div class="row"> 
   <div class="col-md-4"> <a class="btn btn-block btn-social btn-facebook"> <i class="fa fa-facebook"></i>Ingresa con facebook</a></div>
    <div class="col-md-4"> <a class="btn btn-block btn-social btn-twitter"> <i class="fa fa-twitter"></i>Ingresa con twitter</a></div>
    <div class="col-md-4"><a class="btn btn-block btn-social btn-google"> <i class="fa fa-google"></i>Ingresa con google +</a></div>
</div>           
<form action="" id="form-horizontal"> 
<div class="row">
	<div class="col-md-12">
		<h4>Información sobre tí.</h4>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nombre</label>
					<input type="text" id="nombre" name="nombre" class="form-control" required>
					
				</div>
				<div class="form-group">
					<label> Email</label>
					<input type="email" id="email" name="email" class="form-control" required>
					
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Apellido</label>
					<input type="text" id="apellido" name="apellido" class="form-control" required>
					
				</div>
				<div class="form-group">
					<label> Fecha de Nacimiento </label>
					<div class="row"> 
						<div class="col-md-4">
							<select name="dia" id="dia" class="form-control">
								<?php for ($i=1;$i<=31; $i++):?>
									<option value="<?php echo $i ;?>" <?php if ($i==1):echo "selected"; endif;  ?> > <?php echo $i ;?> </option>
								<?php endfor; ?>		
							</select>
						</div>
						<div class="col-md-4">
								<select name="mes" id="mes" class="form-control">

								<?php for ($j=1;$j<=12; $j++):?>
									<option value="<?php echo $i ;?>" <?php if ($j==1):echo "selected"; endif;  ?> > <?php echo strftime('%b', strtotime('2015/'.$j.'/1')) ;?> </option>
								<?php endfor; ?>		
							</select>
						</div>
						<div class="col-md-4">
								<select name="anio" id="anio" class="form-control">

								<?php for ($j=1;$j<=62; $j++):
									$numero =date ("Y");
									$aux= ($numero-12)-$j;
								?>
									<option value="<?php echo $aux ;?>" <?php if ($j==1):echo "selected"; endif;  ?> > <?php echo $aux;?> </option>
								<?php endfor; ?>		
							</select>
						</div>
					</div>
				</div>
				
			</div>
		</div>

	</div>

</div>
</form>