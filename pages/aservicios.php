<?php
	require ("sesion.php");
	require ("funciones.php");
	require ("../agregados/inicio.php");
	$ID="";
	if (isset($_POST['seltip'])){
		$ID=$_POST['seltip'];
		$h=1;
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
					<form name="fregadmin" method="POST" action="gaserv.php">
						<h2><center>Registro de Servicios por Habitaci&oacute;n</center></h2>
						<hr />
						<?php
							if($h==1){
								$sql="select * from Servicios";
								$a=mysql_query($sql);
								while($fila = mysql_fetch_array($a)) {
									echo "
										<div class='filareg'>
											<label>".$fila['Detalle_Serv']."</label>:&nbsp;<input type='checkbox' name='chekserv[]' value='".$fila['idServicios']."'";
										$sq="select * from Tipo_Habitacion_has_Servicios where Tipo_Habitacion_idTipo_Habitacion='".$ID."' and Servicios_idServicios='".$fila['idServicios']."'";
										$s=mysql_query($sq);
										if(mysql_num_rows($s)>0) {
											echo " checked='true' ";
										}
									echo
										" />
										</div>";
								}
								echo "<input type='hidden' name='totalchk' value='".mysql_num_rows($a)."' />";
								echo "<input type='hidden' name='idem' value='".$ID."' />";
							}
						?>
						<div class="btnreg">
							<center><input name="gac" type="submit" value="Guardar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>