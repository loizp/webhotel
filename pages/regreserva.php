<?php
	require ("logsesioncli.php");
	require ("funciones.php");
	$val="";
	if(isset($_POST['rguarda'])){
		$fllegada = $_POST['fechallegada'];
		$fsalida = $_POST['fechasalida'];
		$numhabit = $_POST['numha'];
		$fres = $_POST['fechreserva'];
		$codig=$fres."-".$fllegada."-".$fsalida."-".$boleto;
		$cbuscre="select * from Reservaciones where (Fecha_Reserva=".$fres." or Estado='S') and Cliente_idCliente=".$boleto;
		$rbuscre=mysql_query($cbuscre);
		if(mysql_num_rows($rbuscre)>0){
			echo "<script language='JavaScript'>alert('Tiene una una reserva por CONFIRMAR o Ya realizo su Reserva del Dia');</script>";
?>
<script language="JavaScript">
	window.location="iniciarcliente.php?busc=2";
</script>
<?php
		} else {
			$var[0] = "1";
			$var[1] = $boleto;
			$var[2] = $fres;
			$var[3] = $numhabit;
			$var[4] = $fllegada;
			$var[5] = $fsalida;
			$var[6] = "S";
			$var[7] = "";
			$var[8] = $codig;
			if($boleto!="" && $fres!= "" && $fllegada!="" && $fsalida!="") {
				insertar_id("Reservaciones",$var);
				$cbuscli="select * from Reservaciones where Codigo_Autent=".$codig;
				$rbuscli=mysql_query($cbuscli);
				$lbuscli=mysql_fetch_array($rbuscli);
				$reservaid=$lbuscli['idReservaciones'];
				$val="p";
			}else{
				echo "<script language='JavaScript'>alert('Datos incorrectos');</script>";
?>
<script language="JavaScript">
	window.location="iniciarcliente.php?busc=2";
</script>
<?php
			}
		}
	} else {
		session_destroy();
	}
	if($val=="p"){
		require ("../agregados/inicio.php");
?>
<script type="text/javascript">
	var aTipo = new Array('Seleccione'
<?php
	$cpa="select * from Tipo_Habitacion";
	$rpa=mysql_query($cpa);
	while($lpa=mysql_fetch_array($rpa)){
		echo ",'".$lpa['Clase']."'";
	}
?>
);
	var aHab0 = new Array('Seleccione');
<?php
	$k=1;
	$sql="select * from Tipo_Habitacion";
	$e = mysql_query($sql);
	while($fila = mysql_fetch_array($e)) {
		echo "var aHab".$k." = new Array('Seleccione'";
		$sql2="select * from Habitacion where Tipo_Habitacion_idTipo_Habitacion=".$fila['idTipo_Habitacion'];
		$b=mysql_query($sql2);
		while($lab = mysql_fetch_array($b)){
			$clres="select * from Reservaciones where Fecha_Llegada between ".$fllegada." and ".$fsalida." or Fecha_Salida between ".$fllegada." and ".$fsalida." or (Fecha_Llegada<".$fllegada." and Fecha_Salida>".$fsalida.")";
			$mlres=mysql_query($clres);
			if(mysql_num_rows($mlres)>0){
				while($lrs = mysql_fetch_array($mlres)){
					$fi="select * from Reservaciones_has_Habitacion where Reservaciones_idReservaciones=".$lrs['idReservaciones']." and Habitacion_idHabitacion=".$lab['idHabitacion'];
					$cfi=mysql_query($fi);
					if(mysql_num_rows($cfi)>0){
					} else {
						echo ",'".$lab['idHabitacion']."'";
					}
				}
			} else {
				echo ",'".$lab['idHabitacion']."'";
			}
		}
?>
);
<?php
		$k++;
	}
	$numarr=$k;
?>
	var aHabit = new Array(aHab0
<?php
	for($k=1;$k<$numarr;$k++){
		echo",aHab".$k;
	}
?>
);
	function opcion(oCntrl, iPos, sTxt, sVal){
		var selOpcion=new Option(sTxt, sVal);
		eval(oCntrl.options[iPos]=selOpcion);
	}
	function cambia(oMster, oCntrl){
		var nSelected = oMster.selectedIndex;
		while (oCntrl.length) oCntrl.remove(0);
		for(var i = 0; i < aHabit[nSelected].length; i++)
		opcion(oCntrl,  i, aHabit[nSelected][i], String(i));
	}
	function llena(oCntrl){
		while (oCntrl.length) oCntrl.remove(0);
		for(var i = 0; i < aTipo.length; i++)
		opcion(oCntrl,  i, aTipo[i], String(i));
	}
	function valorsel(obj1,obj2,obj3){
		var sel2= obj2.selectedIndex;
		var sel1 =obj1.selectedIndex;
		obj3.value=aHabit[sel1][sel2];
	}
	function vacio(q) {
		for (i = 0; i < q.length; i++ ) {
			if ( q.charAt(i) != " " )
				return true;
			}
			return false;
	}
	function valida(obj1,obj2,obj3,obj4){
		if(obj1.value=="")
			return false;
		if(obj2.value=="")
			return false;
		if(vacio(obj3.value) == false)
			return false;
		if (vacio(obj4.value) == false)
			return false;
		return true;
	}
	function displayform(op,obj1,obj2,obj3,obj4){
		if(valida(obj1,obj2,obj3,obj4)==true){
			alert(obj1.value);
			alert(obj2.value);
			var tam=<?php echo $numhabit; ?>;
			for(var i=1;i <= tam; i++){
				if(i <= op){
					document.getElementById("diform"+i).style.display="none";
				} else {
					if(i <= (op + 2)){
						document.getElementById("diform"+i).style.display="";
					}
				}
			}
		} else {
			alert('debe de llenar los campos');
		}
	}
	function validar_texto(e){
		tecla = (document.all) ? e.keyCode : e.which;
		if (tecla==8) return true;
		patron =/\D/;
		tecla_final = String.fromCharCode(tecla);
		return patron.test(tecla_final);
	}
</script>
<?php
	require ("../agregados/cabecera.php");
	$cad="";
?>
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
				<?php require ("menucli.php"); ?>
			</div>
			<div class="contenadmin2">
				<div class="formreg">
					<form name="fregres" method="POST" action="gres.php">
						<input type="hidden" value="<?php echo $reservaid; ?>" name="reservaid" />
						<input type="hidden" value="<?php echo $numhabit; ?>" name="numreg" />
						<h2><center>Gestionar las Reserva de Hab.<? echo $reservaid; ?></center></h2>
						<hr />
						<?php for($i=1;$i<=intval($numhabit); $i++) {
							if($i>2){
								$cad="style='display:none'";
							}
						?>
						<div id="diform<?php echo $i; ?>" <?php echo $cad; ?>>
							<h3><center>Habitaci&oacute;n Nro <?php echo $i; ?></center></h3>
							<div class="filareg">
								<label>Ocupante</label>:&nbsp;<input onkeypress = "return validar_texto(event)" name="nombreo<?php echo $i; ?>" type="text" size="30" />
							</div>
							<div class="filareg">
								<label>Clase de hab.</label>:&nbsp;<select name="seltipohab<?php echo $i; ?>" onchange="cambia(this, document.fregres.selnumhabit<?php echo $i; ?>)">
									<option value=" ">&nbsp;</option>
								</select>
							</div>
							<div class="filareg">
								<label>Habitaci&oacute;n.</label>:&nbsp;<select name="selnumhabit<?php echo $i; ?>" onchange="valorsel(document.fregres.seltipohab<?php echo $i; ?>,document.fregres.selnumhabit<?php echo $i; ?>,document.fregres.habsel<?php echo $i; ?>)">
									<option value=" ">&nbsp;</option>
								</select><input type="hidden" name="habsel<?php echo $i; ?>" value="" />
							</div>
							<div class="filareg">
								<label>Cant. Adultos</label>:&nbsp;<select name="numad<?php echo $i; ?>"><?
									echo "<option value='1' selected='selected'>1&nbsp;</option>";
									for($j=2;$j<5;$j++){
										echo "<option value='".$j."'>".$j."&nbsp;</option>";
									}
								?></select>
							</div>
							<div class="filareg">
								<label>Cant. Ni&ntilde;os</label>:&nbsp;<select name="numni<?php echo $i; ?>"><?
									echo "<option selected='selected' value='0'>0&nbsp;</option>";
									for($j=1;$j<5;$j++){
										echo "<option value='".$j."'>".$j."&nbsp;</option>";
									}
								?></select>
							</div>
							<hr />
							<script language="JavaScript">
								llena(document.fregres.seltipohab<?php echo $i; ?>);
							</script>
							<?php if($i==intval($numhabit)){?>
							<div class="btnreg">
								<center><input name="ghabres" type="submit" value="Reservar Habitaciones" /></center>
							</div>
							<?php }else {
								if(($i==2) || ($i==4)){
							?>
							<div class="btnreg">
								<center><input name="btnres<?php echo $i; ?>" type="button" onclick="javascript:displayform(<?php echo $i; ?>,document.fregres.habsel<?php echo $i; ?>,document.fregres.habsel<?php $v=$i-1; echo $v; ?>,nombreo<?php echo $i; ?>,nombreo<?php $t=$i-1; echo $t; ?>)" value="Continuar" /></center>
							</div>	
							<?php
								}
							} ?>
						</div>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");
	}
?>