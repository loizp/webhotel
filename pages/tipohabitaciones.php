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
					<h2><center>Gestionar Tipos de Habitaciones</center></h2>
					<center><a href='rtipohabitaciones.php'><img src="../imagenes/bonuev.gif" border="0" /></a></center>
					<hr />
					<table align="center" class="tresulth">
						<tr>
							<th>Clase - Tipo de Habitaci&oacute;n&nbsp;</th>
							<th>&nbsp;Precio&nbsp;</th>
							<TD></TD>
						</tr>
						<tr><?php
							$sql ="select * from Tipo_Habitacion";
							$e = mysql_query($sql);
							while($fila = mysql_fetch_array($e)) {
								echo "
									<tr>
									<td><b>".$fila['Clase']."</b> - ".$fila['Nombre_Tipo']."</td>
									<td align='right'>S/.".$fila['Precio']."</td>
									<td><a href='rtipohabitaciones.php?c=".$fila['idTipo_Habitacion']."'>Modificar</a></td>
									</tr>";
							}
						?></tr>
					</table>
					<hr />
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>