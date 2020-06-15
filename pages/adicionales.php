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
					<h2><center>Gestionar Informaci&oacute;n Adicional</center></h2>
					<center><a href='radicionales.php'><img src="../imagenes/bonuev.gif" border="0" /></a></center>
					<hr />
					<form name="fregadmin1" method="POST" action="radicionales.php?a=1">
						<h3><center>Gestionar Paises</center></h3>
						<div class="filareg">
							<label>Paises Registrados</label>:&nbsp;<select name="paises"><?php
								$pa="select * from Pais";
								$rep=mysql_query($pa);
								while($fila = mysql_fetch_array($rep)){
									echo"
										<option value='".$fila['idPais']."'>".$fila['Nombre']."</option>
									";
								}
							?></select>
						</div>
						<div class="btnreg">
							<center><input name="rpais" type="submit" value="Modificar" /></center>
						</div>
						<hr />
					</form>
					<form name="fregadmin2" method="POST" action="radicionales.php?a=2">
						<h3><center>Registrar Departamentos del Per&uacute;</center></h3>
						<div class="filareg">
							<label>Nombre del Dpto.</label>:&nbsp;<select name="dptos"><?php
								$pa="select * from Departamentos";
								$rep=mysql_query($pa);
								while($fila = mysql_fetch_array($rep)){
									echo"
										<option value='".$fila['idDepartamentos']."'>".$fila['Nombre_Dpto']."</option>
									";
								}
							?></select>
						</div>
						<div class="btnreg">
							<center><input name="rdpto" type="submit" value="Modificar" /></center>
						</div>
						<hr />
					</form>
					<form name="fregadmin3" method="POST" action="radicionales.php">
						<h3><center>Registrar Servicios del Hotel</center></h3>
						<div class="filareg">
							<label>Descripci&oacute;n Servicio</label>:&nbsp;<select name="serv"><?php
								$pa="select * from Servicios";
								$rep=mysql_query($pa);
								while($fila = mysql_fetch_array($rep)){
									echo"
										<option value='".$fila['idServicios']."'>".$fila['Detalle_Serv']."</option>
									";
								}
							?></select>
						</div>
						<div class="btnreg">
							<center><input name="rserv" type="submit" value="Modificar" /></center>
						</div>
						<hr />
					</form>
					<form name="fregadmin4" method="POST" action="radicionales.php">
						<h3><center>Registrar Ubicaci&oacute;n de Habitaciones</center></h3>
						<div class="filareg">
							<label>Descripci&oacute;n Ubicaci&oacute;n</label>:&nbsp;<select name="ubi"><?php
								$pa="select * from Ubicacion";
								$rep=mysql_query($pa);
								while($fila = mysql_fetch_array($rep)){
									echo"
										<option value='".$fila['idUbicacion']."'>".$fila['Descripcion']."</option>
									";
								}
							?></select>
						</div>
						<div class="btnreg">
							<center><input name="rubicacion" type="submit" value="Modificar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>