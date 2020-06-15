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
					<h2><center>Gestionar Habitaciones</center></h2>
					<center><a href='rhabitaciones.php'><img src="../imagenes/bonuev.gif" border="0" /></a></center>
					<hr />
					<form name="fmodhab" method="POST" action="rhabitaciones.php?c=1">
						<div class="filareg">
							<label>Num. de Habitaci&oacute;n</label>:&nbsp;<input name="nhab" type="text" size="5" />
						</div>
						<div class="btnreg">
							<center><input name="rmodhab" type="submit" value="Modificar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>