<?php
	require ("sesion.php");
	require ("funciones.php");
	require ("../agregados/inicio.php");
?>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
				<?php require ("menu.php");?>
			</div>
			<div class="contenadmin2">
				<div class="formreg">
					<h2><center>Asignar Servicios</center></h2>
					<hr />
					<form name="ftiphab" method="POST" action="aservicios.php">
						<div class="filareg">
							<label>Tipo de Habitaci&oacute;n</label>:&nbsp;<select name="seltip"><?php
								$a="select * from Tipo_Habitacion";
								$b=mysql_query($a);
								while($l=mysql_fetch_array($b)){
									echo "<option value='".$l['idTipo_Habitacion']."'>".$l['Clase']." - ".$l['Nombre_Tipo'].".</option>";
								}
					 		?></select>
						</div>
						<div class="btnreg">
							<center><input name="bremp" type="submit" value="Continuar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>