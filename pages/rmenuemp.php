<?php
	require ("sesion.php");
	require ("funciones.php");
	require ("../agregados/inicio.php");
	$ID="";
	if (isset($_POST['idac'])){
		$ID=$_POST['idac'];
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
					<form name="fregadmin" method="POST" action="gmenuemp.php">
						<h2><center>Asignar Permisos de Acceso</center></h2>
						<hr />
						<?php
							if($h==1){
								$sql="select * from Item_Menu where propietario='E'";
								$a=mysql_query($sql);
								while($fila = mysql_fetch_array($a)) {
									echo "
										<div class='filareg'>
											<label>".$fila['Nom_Item']."</label>:&nbsp;<input type='checkbox' name='chekmenu[]' value='".$fila['idItem_Menu']."'";
										$sq="select * from Empleado_has_Item_Menu where Empleado_idEmpleado='".$ID."' and Item_Menu_idItem_Menu='".$fila['idItem_Menu']."'";
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