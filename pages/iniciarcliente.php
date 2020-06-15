<?php
	require ("logsesioncli.php");
	require ("funciones.php");
	$creador="";
	$busc="";
	$fechaini="";
	$fechafin="";
	$numhab="";
	$fechares=date("Y-m-j");
	if(isset($_GET['busc'])){
		$busc=$_GET['busc'];
		$idcliente=$boleto;
		if($busc==1){
			$fechaini=$_POST['txtfechaini'];
			$fechafin=$_POST['txtfechafin'];
			$numhab=$_POST['numberOfRooms'];
			if(($fechafin!="") && ($fechaini!="") && (strtotime($fechaini)>strtotime($fechares)) && (strtotime($fechafin)>strtotime($fechaini))){
				$creador="r";
			} else {
				echo "<script language='JavaScript'>alert('Debe Ingresar las Fechas Correctas');</script>";
?>
<script language="JavaScript">
	window.location="iniciarcliente.php?busc=2";
</script>
<?php
			}
		}
	} else {
		if((empty($HTTP_SESSION_VARS['fechini']) || ($_SESSION['fechini']=="")) && (empty($HTTP_SESSION_VARS['fechfin']) || ($_SESSION['fechfin']=="")) && (empty($HTTP_SESSION_VARS['numha']) || ($_SESSION['numha']==""))){
			$creador="s";
		} else {
			$creador="r";
			$fechaini=$_SESSION['fechini'];
			$fechafin=$_SESSION['fechfin'];
			$numhab=$_SESSION['numha'];
		}
	}
?>
<?php require ("../agregados/inicio.php"); ?>
<style type="text/css">@import url("../calendario/calendar-blue.css");</style>
<script type="text/javascript" src="../calendario/calendar.js"></script>
<script type="text/javascript" src="../calendario/lang/calendar-es.js"></script>
<script type="text/javascript" src="../calendario/calendar-setup.js"></script>
<script type="text/javascript" src="../agregados/display.js"></script>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
				<?php require ("menucli.php"); ?>
			</div>
			<div class="contenadmin2">
				<div class="formreg">
					<h2><center>Reservacion con Fecha de PERU</center></h2>
					<?php	echo "<h3><center>".$fechares."</center></h3>";	?>
					<hr />
<?php
	if(($creador=="s" && $busc=="") || ($creador=="r" && $busc==1) || ($busc==2) ){
?>
					<form name="buscardisp" method="POST" action="iniciarcliente.php?busc=1">
						<div class="filareg">
							<label>Fecha de LLegada</label>:&nbsp;<input type="text" readonly="true" id="txtfechaini" value="<?php echo $fechaini; ?>" class="campo" size="11" maxlength="11"  name="txtfechaini" /><a  id="btnllegada">&nbsp;<img src="../imagenes/iconcal.gif" class="calendar" alt="Calendario" title="Calendario" align="top" border="0" /></a>
							<script type="text/javascript">
								Calendar.setup(
									{
										inputField  : "txtfechaini",         // ID of the input field
										ifFormat    : "%Y-%m-%d",    // the date format
										button      : "btnllegada"       // ID of the button
									}
								);
							</script>
						</div>
						<div class="filareg">
							<label>Fecha de Salida</label>:&nbsp;<input type="text" readonly="true" id="txtfechafin" value="<?php echo $fechafin; ?>" class="campo" size="11" maxlength="11"  name="txtfechafin" /><a  id="btnsalida">&nbsp;<img src="../imagenes/iconcal.gif" class="calendar" alt="Calendario" title="Calendario" align="top" border="0" /></a>
							<script type="text/javascript">
								Calendar.setup(
									{
										inputField  : "txtfechafin",         // ID of the input field
										ifFormat    : "%Y-%m-%d",    // the date format
										button      : "btnsalida"       // ID of the button
									}
								);
							</script>
						</div>
						<div class="filareg">
							<label>Numero de Hab.</label>:&nbsp;<select name="numberOfRooms" id="numRooms" class="formfield">
								<option value="1" selected="selected">1&nbsp;</option>
								<option value="2">2&nbsp;</option>
								<option value="3">3&nbsp;</option>
								<option value="4">4&nbsp;</option>
								<option value="5">5&nbsp;</option>
								<option value="6">6&nbsp;</option>
							</select>
						</div>
						<div class="btnreg">
							<center><input name="rubusca" type="submit" value="Buscar Habitaciones" /></center>
						</div>
					</form>
					<table align="center" class="ttarifasini">
						<tr>
							<th>&nbsp;Tipo de Habitaci&oacute;n&nbsp;</th>
							<th>&nbsp;Disponibles&nbsp;</th>
							<th>&nbsp;Precio&nbsp;</th>
						</tr>
						<tr><?php
							if($busc!="1"){
								$sql ="select * from Tipo_Habitacion";
								$e = mysql_query($sql);
								while($fila = mysql_fetch_array($e)) {
									echo "
										<tr>
										<td>".$fila['Clase']." - ".$fila['Nombre_Tipo']."</td>";
									$sql2="select * from Habitacion where Estado = 'L' and Tipo_Habitacion_idTipo_Habitacion= ".$fila['idTipo_Habitacion'];
									$b=mysql_query($sql2);
									echo "
										<td align='center'>".mysql_num_rows($b)." Hab.</td>
										<td align='center'>s/. ".$fila['Precio'].".00</td>
										</tr>";
								}
							} else {
								$sql="select * from Tipo_Habitacion";
								$e = mysql_query($sql);
								while($fila = mysql_fetch_array($e)) {
									echo "
										<tr>
										<td>&nbsp;&nbsp;".$fila['Clase']." - ".$fila['Nombre_Tipo']."</td>";
									$sql2="select * from Habitacion where Tipo_Habitacion_idTipo_Habitacion=".$fila['idTipo_Habitacion'];
									$b=mysql_query($sql2);
									$cant=0;
									while($lab = mysql_fetch_array($b)){
										$clres="select * from Reservaciones where Fecha_Llegada between ".$fechaini." and ".$fechafin." or Fecha_Salida between ".$fechaini." and ".$fechafin." or (Fecha_Llegada<".$fechaini." and Fecha_Salida>".$fechafin.")";
										$mlres=mysql_query($clres);
										if(mysql_num_rows($mlres)>0){
											while($lrs = mysql_fetch_array($mlres)){
												$fi="select * from Reservaciones_has_Habitacion where Reservaciones_idReservaciones=".$lrs['idReservaciones']." and Habitacion_idHabitacion=".$lab['idHabitacion'];
												$cfi=mysql_query($fi);
												if(mysql_num_rows($cfi)>0){
												} else {
													$cant++;
												}
											}
										} else {
											$cant++;
										}
									}
									echo "
										<td align='center'>".$cant." Hab.</td>
										<td align='center'>s/. ".$fila['Precio'].".00</td>
										</tr>";
								}
							}
						?></tr>
					</table>
					<hr />
<?php
	}
	if($creador=="r"){
?>
					<form name="registrosreservas" method="POST" action="regreserva.php">
						<div class="filareg">
							<label>Fecha de LLegada</label>:&nbsp;<b><?php echo $fechaini; ?></b><input name="fechallegada" type="hidden" value="<?php echo $fechaini; ?>" />:
						</div>
						<div class="filareg">
							<label>Fecha de Salida</label>:&nbsp;<b><?php echo $fechafin; ?></b><input name="fechasalida" type="hidden" value="<?php echo $fechafin; ?>" />
						</div>
						<div class="filareg">
							<label>Numero de Hab.</label>:&nbsp;<b><?php echo $numhab; ?></b><input name="numha" type="hidden" value="<?php echo $numhab; ?>" /><input type="hidden" name="fechreserva" value="<?php echo $fechares; ?>" />
						</div>
						<div class="btnreg">
							<center><input name="rguarda" type="submit" value="Crear Reserva" /></center>
						</div>
						<hr />
					</form>
<?php
	}
?>
				</div>
			</div>
		</div>
<?php
	require ("../agregados/pie.php");
?>