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
					<h2><center>Gestionar Empleados</center></h2>
					<center><a href='rempleados.php'><img src="../imagenes/bonuev.gif" border="0" /></a></center>
					<hr />
					<form name="fmodhab" method="POST" action="rempleados.php?c=1">
						<div class="filareg">
							<label>Cod. de Identificaci&oacute;n</label>:&nbsp;<input name="useremp" type="text" size="12" />
						</div>
						<div class="btnreg">
							<center><input name="bremp" type="submit" value="Modificar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>