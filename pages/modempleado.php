<?php
	require ("sesion.php");
	require ("funciones.php");
	require ("../agregados/inicio.php");
	$nombres="";
	$DNI="";
	$direccion="";
	$telefono="";
	$email="";
	$ID="";
	$estado="";
	$tipoemp="";
	$clave="";
	$sexo="";
	$text1="";
	$text2="";
	if (isset($_GET['t'])){
		$var=$_GET['t'];
		$co="select * from Empleado where idEmpleado=".$boleto;
		$ro=mysql_query($co);
		$tab=mysql_fetch_array($ro);
		$DNI=$tab['User_DNI'];
		$ID=$tab['idEmpleado'];
		$nombres=$tab['Nom_Apellido'];
		$direccion=$tab['Direccion'];
		$telefono=$tab['Telefono'];
		$email=$tab['Email'];
		$estado=$tab['Estado'];
		$tipoemp=$tab['Tipo_Empleado'];
		$clave=$tab['Clave'];
		$sexo=$tab['Sexo'];
	}
?>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
				<?php require ("menu.php");?>
			</div>
			<div class="contenadmin2">
				<div class="formreg">
					<form name="fregadmin" method="POST" action="gmodemp.php">
						<h2><center><?php
							if($var==1){
								echo "Modificar Empleado";
								$text1="style='display:none'";
							}
							if($var==2){
								echo "Cambiar Contrace&ntilde;a";
								$text2="style='display:none'";
							}
						?></center></h2>
						<hr />
						<div class="filareg" <?php echo $text2; ?>>
							<label>Nombres y Apell.</label>:&nbsp;<input name="nombres" type="text" value="<?php echo $nombres; ?>" size="30" /><input type="hidden" name="idemp" value="<?php echo $ID; ?>" /><input type="hidden" name="sexo" value="<?php echo $sexo; ?>" /><input name="tipoemp" value="<?php echo $tipoemp; ?>" type="hidden" /><input name="estado" value="<?php echo $estado; ?>" type="hidden" />
						</div>
						<div class="filareg" <?php echo $text2; ?>>
							<label>Usuario - DNI</label>:&nbsp;<?php echo $DNI; ?><input name="DNI" type="hidden" value="<?php echo $DNI; ?>" />
						</div>
						<div class="filareg" <?php echo $text2; ?>>
							<label>Direcci&oacute;n</label>:&nbsp;<input name="direccion" value="<?php echo $direccion; ?>" type="text" size="25" />
						</div>
						<div class="filareg" <?php echo $text2; ?>>
							<label>Telefono</label>:&nbsp;<input name="telefono" value="<?php echo $telefono; ?>" type="text" size="12" />
						</div>
						<div class="filareg" <?php echo $text2; ?>>
							<label>Email</label>:&nbsp;<input name="email" value="<?php echo $email; ?>" type="text" size="25" />
						</div>
						<div class="filareg" <?php echo $text1; ?>>
							<label>Contrace&ntilde;a</label>:&nbsp;<input name="clave" value="<?php echo $clave; ?>" type="password" size="10" />
						</div>
						<div class="filareg" <?php echo $text1; ?>>
							<label>Confirmar Contrace&ntilde;a</label>:&nbsp;<input value="<?php echo $clave; ?>" name="claveconfirm" type="password" size="10" />
						</div>
						<div class="btnreg">
							<center><input name="gmodemp" type="submit" value="Guardar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>