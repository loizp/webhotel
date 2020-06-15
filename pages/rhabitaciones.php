<?php
	require ("sesion.php");
	require ("funciones.php");
	require ("../agregados/inicio.php");
	$Descrip="";
	$Ubic="";
	$tipo="";
	$ID="";
	$Est="";
	if (isset($_GET['c'])){
		$var=$_GET['c'];
		$ID=$_POST['nhab'];
		$co="select * from Habitacion where idHabitacion='".$ID."'";
		$ro=mysql_query($co);
		$tab=mysql_fetch_array($ro);
		$Ubic=$tab['Ubicacion_idUbicacion'];
		$tipo=$tab['Tipo_Habitacion_idTipo_Habitacion'];
		$Descrip=$tab['Descripcion'];
		$Est=$tab['Estado'];
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
					<h2><center>Registrar Tipos de Habitaciones</center></h2>
					<hr />
					<form name="fregadmin" method="POST" action="ghabitaciones.php">
						<div class="filareg">
							<label>Numero de hab.</label>:&nbsp;<?php
								if($var==1){
									echo $ID."<input type='hidden' name='idhab' value='".$ID."' />
									";
								} else {
									echo"<input name='numh' type='text' size='5' /><input type='hidden' name='idhab' value='' />
									";
								}
							?>
						</div>
						<div class="filareg">
							<label>Ubicaci&oacute;n</label>:&nbsp;<select name="selubi"><?php
								$pa="select * from Ubicacion";
								$rep=mysql_query($pa);
								while($fila = mysql_fetch_array($rep)){
									if($fila['idUbicacion']==$Ubic){
										echo"
											<option value='".$fila['idUbicacion']."' selected='selected'>".$fila['Descripcion']."</option>
										";
									} else {
										echo "
											<option value='".$fila['idUbicacion']."'>".$fila['Descripcion']."</option>
										";
									}
								}
							?></select>
						</div>
						<div class="filareg">
							<label>Tipo de Habit.</label>:&nbsp;<select name="seltiha"><?php
								$pa="select * from Tipo_Habitacion";
								$rep=mysql_query($pa);
								while($fila = mysql_fetch_array($rep)){
									if($fila['idTipo_Habitacion']==$tipo){
										echo"
											<option value='".$fila['idTipo_Habitacion']."' selected='selected'>".$fila['Nombre_Tipo']."</option>
										";
									} else {
										echo "
											<option value='".$fila['idTipo_Habitacion']."'>".$fila['Nombre_Tipo']."</option>
										";
									}
								}
							?></select>
						</div>
						<div class="filareg">
							<label>Descripci&oacute;n</label>:&nbsp;<input name="descr" type="text" value="<?php echo $Descrip ?>" size="30" />
						</div>
						<div class="filareg">
							<label>Estado</label>:&nbsp;<input name="esta" value="<?php echo $Est ?>" type="text" size="3" />
						</div>
						<div class="btnreg">
							<center><input name="ghab" type="submit" value="Guardar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>