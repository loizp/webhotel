<?php
	require ("funciones.php");
	require ("../agregados/inicio.php");
	$bus="";
	$llegada="";
	$salida="";
	$numh="";
	$fecha=date("Y-m-j");
	if(isset($_GET['bus'])){
		$llegada=$_POST['txtfechaini'];
		$salida=$_POST['txtfechafin'];
		if($llegada=="" || $salida==""){
			$bus="";
			echo "<script language='JavaScript'>alert('LLena Bonito Pues');</script>";
?>
	<script language="JavaScript">
		window.location="reservaciones.php";
	</script>
<?php
		} else {
			if((strtotime($llegada)>strtotime($fecha)) && (strtotime($salida)>strtotime($llegada))){
				$bus=$_GET['bus'];
				$numh=$_POST['numberOfRooms'];
				if($numh==1){
					echo "<script language='JavaScript'>alert('Puede Seleccionar mas de una Habitacion si desea');</script>";
				}
			} else {
				$bus="";
				echo "<script language='JavaScript'>alert('LLena Bonito Pues');</script>";
?>
	<script language="JavaScript">
		window.location="reservaciones.php";
	</script>
<?php
			}
		}
	}
?>
	<style type="text/css">@import url("../calendario/calendar-blue.css");</style>
	<script type="text/javascript" src="../calendario/calendar.js"></script>
	<script type="text/javascript" src="../calendario/lang/calendar-es.js"></script>
	<script type="text/javascript" src="../calendario/calendar-setup.js"></script>
	<script type="text/javascript" src="../agregados/display.js"></script>
	<script type="text/javascript">
		function validarNum(e){
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla == 8) return true;
			patron = /\d/;
			te = String.fromCharCode(tecla);
   		return patron.test(te);
		}
		function validar_texto(e){
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true;
			patron =/\D/;
			tecla_final = String.fromCharCode(tecla);
			return patron.test(tecla_final);
		}
	</script>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenido">
			<div class="clear">&nbsp;</div>
			<div class="formfechareserva">
				<fieldset><legend><b>Iniciar Reserva</b></legend>
					<div id="checkin">
						<label id="arrivalDateLabel">Llegada</label>
					</div>
					<form name="Formreserva1" id="Formreservas1" method="POST" action="reservaciones.php?bus=1">
						<div class="formFields">
							<div id="checkinTfield">
								<input type="text" readonly="true" id="txtfechaini" value="<?php echo $llegada; ?>" class="campo" size="11" maxlength="11"  name="txtfechaini" /><a  id="btnllegada">&nbsp;<img src="../imagenes/iconcal.gif" class="calendar" alt="Calendario" title="Calendario" align="top" border="0" /></a>
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
							<div id="checkout">
								<label id="departureDateLabel">Salida</label>
							</div>
							<div id="checkoutTfield">
								<input type="text" readonly="true" id="txtfechafin" value="<?php echo $salida; ?>" class="campo" size="11" maxlength="11"  name="txtfechafin" /><a  id="btnsalida">&nbsp;<img src="../imagenes/iconcal.gif" class="calendar" alt="Calendario" title="Calendario" align="top" border="0" /></a>
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
						</div>
						<div class="formFields">
							<div id="roomsfield">
								<div>
									<label>Habitacion(es)</label>
								</div>
								<select name="numberOfRooms" id="numRooms" class="formfield">
									<option value="1" selected="selected">1&nbsp;</option>
									<option value="2">2&nbsp;</option>
									<option value="3">3&nbsp;</option>
									<option value="4">4&nbsp;</option>
									<option value="5">5&nbsp;</option>
									<option value="6">6&nbsp;</option>
								</select>
							</div>
						</div>
						<div>
							<center><input name="contrese" type="submit" value="Continuar" /></center>
						</div>
					</form>
				</fieldset>
			</div>
			<div class="reservas">
				<fieldset><legend><b>Tarifas y Reservaciones</b></legend>
					<div class="tarifasencab">
						<p class="avisotarifas">PRECIO POR HABITACION EN NUEVOS SOLES SUJETAS A CAMBIOS SIN PREVIO AVISO</p>
						<h3><center><?php
							if($bus==""){
								echo "Disponibilidad a fecha Actual";
							} else{
								echo "Disponibilidad entre ".$llegada." y ".$salida;
							}
						?></center></h3>
					</div>
					<div class="tarifas">
						<table align="center" class="ttarifas">
							<tr>
								<th>&nbsp;Tipo de Habitaci&oacute;n&nbsp;</th>
								<th>&nbsp;Disponibles&nbsp;</th>
								<th>&nbsp;Precio&nbsp;</th>
							</tr>
							<tr><?php
								if($bus==""){
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
											<td>".$fila['Clase']." - ".$fila['Nombre_Tipo']."</td>";
										$sql2="select * from Habitacion where Tipo_Habitacion_idTipo_Habitacion=".$fila['idTipo_Habitacion'];
										$b=mysql_query($sql2);
										$cant=0;
										while($lab = mysql_fetch_array($b)){
											$clres="select * from Reservaciones where Fecha_Llegada between ".$llegada." and ".$salida." or Fecha_Salida between ".$llegada." and ".$salida." or (Fecha_Llegada<".$llegada." and Fecha_Salida>".$salida.")";
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
					</div>
					<?php
						if($bus==""){
					?>
					<div id="pressreserv" class="pressreservr">
						<center><img src="../imagenes/fotos/foto1.jpg" alt="Habitaciones" /><img src="../imagenes/fotos/foto2.jpg" alt="habitaciones" /></center>
						<p>Para poder a iniciar una Reserva debe usted llenar el formulario de la parte superior-derecha.Despues pasara a completar los datos de la Reserva</p><br />
						<p><b>NOTA:</b> Se le enviar&aacute; un mnsaje de correo electr&oacute;nico, a la direcci&oacute;n que especifique, con los datos que envi&oacute; para que lo verifique y pase a confirmar la reserva con un plazo de 5 dias</p><br />
						<p>La confirmaci&oacute;n de la reserva lo podra hacer con codigo de identificaci&oacute;n DNI, RUC o CE.</p>
					</div>
					<?php
						} else {
					?>
					<div id="formcliente" class="formclienter">
						<center><h3>Completar Reserva</h3></center>
						<br />
						<form name="Formreserva2" method="POST" action="inicli.php">
							<div class="freserva1">
								<center><label>Tipo de Cliente :&nbsp;</label><select onchange="javascript:mostrarttcliente(this.form);" name="tipocliente" id="numRooms" class="formfield">
									<option value="Independiente" selected="selected">Independiente</option>
									<option value="Empresa">Empresa</option>
								</select>&nbsp;<input type="submit" name="contrserv" value="Registrarse" /></center><hr /><input type="hidden" value="<?php echo $llegada ?>" name="fllegada" /><input type="hidden" value="<?php echo $salida ?>" name="fsalida" /><input type="hidden" value="<?php echo $numh ?>" name="numh" /><input type="hidden" value="r" name="log" />
								<div id="cliente1">
									<div class="liform">
										<label>Nombres</label>:&nbsp;<input onkeypress = "return validar_texto(event)" class="cajatext" size="30" name="nombres" value="" type="text" />
									</div>
									<div class="liform">
										<label>Apellidos</label>:&nbsp;<input onkeypress = "return validar_texto(event)" class="cajatext" size="30" name="apellidos" value="" type="text" />
									</div>
									<div class="liform">
										<label>DNI &oacute; CE</label>:&nbsp;<input onkeypress = "return validarNum(event)" class="cajatext" size="15" name="DNI_CE" value="" type="text" />
									</div>
								</div>
								<div id="cliente2" style='display:none'>
									<div class="liform">
										<label>Razon Social</label>:&nbsp;<input class="cajatext" size="30" name="razonsoc" value="" type="text" />
									</div>
									<div class="liform">
										<label>RUC</label>:&nbsp;<input maxlength="11" onkeypress = "return validarNum(event)" class="cajatext" size="15" name="RUC" value="" type="text" />
									</div>
								</div>
								<div class="clientetodo">
									<div class="liform">
										<label>Nacionalidad</label>:&nbsp;<select onchange="javascript:mostrarttdpto(this.form);" name="selpais" class="formfield"><?php
											$sql ="select * from Pais";
											$e = mysql_query($sql);
											while($fila = mysql_fetch_array($e)){
												echo "<option value='".$fila['idPais']."'";
												if ($fila['Nombre']=="Peru"){
													echo " selected='selected'";
												}
												echo " >".$fila['Nombre']."</option>";
											}
										?></select>
									</div>
									<div class="liform" id="selectdpto">
										<label>Departamento</label>:&nbsp;<select name="seldepartamento" class="formfield"><?php
											$sql2 ="select * from Departamentos";
											$e2 = mysql_query($sql2);
											while($fila2 = mysql_fetch_array($e2)){
												echo "<option value='".$fila2['Nombre_Dpto']."'>".$fila2['Nombre_Dpto']."</option>";
											}
										?></select>
									</div>
									<div class="liform">
										<label>Ciudad</label>:&nbsp;<input onkeypress = "return validar_texto(event)" class="cajatext" size="15" name="ciudad" value="" type="text" />
									</div>
									<div class="liform">
										<label>Email</label>:&nbsp;<input class="cajatext" size="25" name="email" value="" type="text" />
									</div>
									<div class="liform">
										<label>Tel&eacute;fono Fijo</label>:&nbsp;<input onkeypress = "return validarNum(event)" class="cajatext" size="12" name="telefono" value="" type="text" />
									</div>
									<div class="liform">
										<label>Movil</label>:&nbsp;<input onkeypress = "return validarNum(event)" class="cajatext" size="12" name="movil" value="" type="text" />
									</div>
									<div class="liform">
										<label>Contrace&ntilde;a</label>:&nbsp;<input class="cajatext" size="10" name="clave" value="" type="password" />
									</div>
									<div class="liform">
										<label>Confirme Contrace&ntilde;a</label>:&nbsp;<input class="cajatext" size="10" name="claveconfir" value="" type="password" />
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
						}
					?>
				</fieldset>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>