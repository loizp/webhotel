<?php
	require ("logsesioncli.php");
	require ("funciones.php");
	$cn="select * from Reservaciones where Cliente_idCliente=".$boleto." and Estado='S'";
	$e=mysql_query($cn);
	if(mysql_num_rows($e)>0){
		$fle=mysql_fetch_array($e);
		$codigores=$fle['Codigo_Autent'];
		$fechares=$fle['Fecha_Reserva'];
		$fechaini=$fle['Fecha_Llegada'];
		$fechafin=$fle['Fecha_Salida'];
		$numhab=$fle['N_Habitaciones'];
	} else {
		echo "<script language='JavaScript'>alert('No Hay Reservas por Confirmar');</script>";
?>
	<script language="JavaScript">
		window.location="iniciarcliente.php?busc=2";
	</script>
<?php
	}
	require ("../agregados/inicio.php");
?>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
				<?php require ("menucli.php");?>
			</div>
			<div class="contenadmin2">
				<h2><center>Confimaci&oacute;n de Reservas</center></h2>
				<h3><center>C&oacute;digo de Reserva a Confirmar</center></h3>
				<b><center><?php echo $codigores; ?></center></b>
				<hr />
				<div class="filareg">
					<label>Fecha Realizada</label>:&nbsp;<b><?php echo $fechares; ?></b>
				</div>
				<div class="filareg">
					<label>Fecha de LLegada</label>:&nbsp;<b><?php echo $fechaini; ?></b>
				</div>
				<div class="filareg">
					<label>Fecha de Salida</label>:&nbsp;<b><?php echo $fechafin; ?></b>
				</div>
				<div class="filareg">
					<label>Numero de Hab.</label>:&nbsp;<b><?php echo $numhab; ?></b>
				</div>
				<hr />
				<form method="POST" action="gconfirres.php">
					<div class="filareg">
						<h3><center>C&oacute;digo de Confirmaci&oacute;n</center></h3>
						<center><input align="middle" type="text" name="numconfir" size="45" value="" /></center>
					</div>
					<div class="btnreg">
						<center><input name="rconfirma" type="submit" value="Confirmar Reserva" /></center>
					</div>
				</form>
				<hr />
			</div>
		</div>
<?php require ("../agregados/pie.php");?>