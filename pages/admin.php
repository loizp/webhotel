<?php
	require ("sesion.php");
	require ("funciones.php");
	$con="select * from Empleado where idEmpleado=".$boleto;
	$he=mysql_query($con);
	$le=mysql_fetch_array($he);
	$nombre=$le['Nom_Apellido'];
	$DNI=$le['User_DNI'];
	$direccion=$le['Direccion'];
	$telefono=$le['Telefono'];
	$email=$le['Email'];
	$sexo=$le['Sexo'];
	require ("../agregados/inicio.php");
?>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
				<?php require ("menu.php");?>
			</div>
			<div class="contenadmin2">
				<h2><center>Bienvenido</center></h2>
				<hr />
				<div class="filareg">
					<label><?php
						if($sexo=="M" || $sexo=="F"){
							if($sexo=="M")
								echo "Se&ntilde;or";
							else
								echo "Se&ntilde;orita";
						} else {
							echo "Empleado";
						}
				?></label>:&nbsp;<b><?php echo $nombre; ?></b><input type="hidden" name="idemp" value="<?php echo $ID; ?>"/>
				</div>
				<div class="filareg">
					<label>C&oacute;digo</label>:&nbsp;<b><?php echo $DNI; ?></b>
				</div>
				<div class="filareg">
					<label>Direcci&oacute;n</label>:&nbsp;<b><?php echo $direccion; ?></b>
				</div>
				<div class="filareg">
					<label>Telefono</label>:&nbsp;<b><?php echo $telefono; ?></b>
				</div>
				<div class="filareg">
					<label>Email</label>:&nbsp;<b><?php echo $email; ?></b>
				</div>
				<form method="POST" action="modempleado.php?t=1">
					<div class="btnreg">
						<center><input name="memp" type="submit" value="Modificar Datos" /></center>
					</div>
				</form>
				<form method="POST" action="modempleado.php?t=2">
					<div class="btnreg">
						<center><input name="modclave" type="submit" value="Cambiar Clave" /></center>
					</div>
				</form>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>