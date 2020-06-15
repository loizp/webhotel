<?php
	require ("sesion.php");
	require ("funciones.php");
	require ("../agregados/inicio.php");
	$Nombre="";
	$Clase="";
	$Precio="";
	$ID="";
	if (isset($_GET['c'])){
		$ID=$_GET['c'];
		$co="select * from Tipo_Habitacion where idTipo_Habitacion='".$ID."'";
		$ro=mysql_query($co);
		$tab=mysql_fetch_array($ro);
		$Nombre=$tab['Nombre_Tipo'];
		$Clase=$tab['Clase'];
		$Precio=$tab['Precio'];
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
					<form name="fregadmin" method="POST" action="gtipohabitaciones.php">
						<div class="filareg">
							<label>Nombre del Tipo</label>:&nbsp;<input name="nombretipo" type="text" value="<? echo $Nombre ?>" size="30" /><input type="hidden" name="txtid" value="<? echo $ID ?>" />
						</div>
						<div class="filareg">
							<label>Clase</label>:&nbsp;<input name="nombreclase" type="text" value="<? echo $Clase ?>" size="3" />
						</div>
						<div class="filareg">
							<label>Precio</label>:&nbsp;<input name="precio" value="<? echo $Precio ?>" type="text" size="5" />
						</div>
						<div class="btnreg">
							<center><input name="gtipoh" type="submit" value="Guardar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>