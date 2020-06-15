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
	if (isset($_GET['c'])){
		$var=$_GET['c'];
		$DNI=$_POST['useremp'];
		$co="select * from Empleado where User_DNI='".$DNI."'";
		$ro=mysql_query($co);
		$tab=mysql_fetch_array($ro);
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
					<form name="fregadmin" method="POST" action="gempleados.php">
						<h2><center>Registrar Empleado</center></h2>
						<hr />
						<div class="filareg">
							<label>Nombres y Apell.</label>:&nbsp;<input name="nombres" type="text" value="<?php echo $nombres; ?>" size="30" /><input type="hidden" name="idemp" value="<?php echo $ID; ?>"/>
						</div>
						<div class="filareg">
							<label>Usuario - DNI</label>:&nbsp;<input name="DNI" type="text" value="<?php echo $DNI; ?>" size="10" />
						</div>
						<div class="filareg">
							<label>Direcci&oacute;n</label>:&nbsp;<input name="direccion" value="<?php echo $direccion; ?>" type="text" size="25" />
						</div>
						<div class="filareg">
							<label>Telefono</label>:&nbsp;<input name="telefono" value="<?php echo $telefono; ?>" type="text" size="12" />
						</div>
						<div class="filareg">
							<label>Email</label>:&nbsp;<input name="email" value="<?php echo $email; ?>" type="text" size="25" />
						</div>
						<div class="filareg">
							<label>Sexo</label>:&nbsp;<input name="sexo[]"<?php
								if($var==1 && $sexo=="M"){
									echo " checked='true' ";
								}
							 ?> type="radio" value="M" /><b>M</b>&nbsp;<input name="sexo[]"<?php
								if($var==1 && $sexo=="F"){
									echo " checked='true' ";
								}
							 ?> type="radio" value="F" /><b>F</b>
						</div>
						<div class="filareg">
							<label>Tipo de Empleado</label>:&nbsp;<input name="tipoemp" value="<?php echo $tipoemp; ?>" type="text" size="3" />
						</div>
						<div class="filareg">
							<label>Estado</label>:&nbsp;<input name="estado" value="<?php echo $estado; ?>" type="text" size="3" />
						</div>
						<div class="filareg">
							<label>Contrace&ntilde;a</label>:&nbsp;<input name="clave" value="<?php echo $clave; ?>" type="password" size="10" />
						</div>
						<div class="filareg">
							<label>Confirmar Contrace&ntilde;a</label>:&nbsp;<input value="<?php echo $clave; ?>" name="claveconfirm" type="password" size="10" />
						</div>
						<div class="btnreg">
							<center><input name="gemp" type="submit" value="Guardar" /></center>
						</div>
					</form>
					<?php
					if($var==1){
						echo "
						<form name='firacc' method='POST' action='rmenuemp.php'>
							<div class='btnreg'>
								<input type='hidden' name='idac' value='".$ID."'/>
								<center><input name='racc' type='submit' value='Asignar Menu' /></center>
							</div>
						</form>";
					}
					?>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>