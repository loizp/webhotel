<?php
	require ("logsesioncli.php");
	require ("funciones.php");
	$con="select * from Cliente where idCliente=".$boleto;
	$he=mysql_query($con);
	$le=mysql_fetch_array($he);
	$nombre=$le['Nom_RazonSoc'];
	$DNI=$le['DNI_RUC_CE'];
	$apellidos=$le['Apellidos'];
	$telefono=$le['Telefono'];
	$movil=$le['Movil'];
	$email=$le['Email'];
	$ciudad=$le['Ciudad'];
	$dpto=$le['Departamento'];
	$tipocli=$le['Tipo_Cliente'];
	$con1="select * from Pais where idPais=".$le['Pais_idPais'];
	$he1=mysql_query($con1);
	$le1=mysql_fetch_array($he1);
	$nacio=$le1['Nombre'];
	$text="style='display:none'";
	$text2="style='display:none'";
	require ("../agregados/inicio.php");
?>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
				<?php require ("menucli.php");?>
			</div>
			<div class="contenadmin2">
				<h2><center>Bienvenido</center></h2>
				<hr />
				<div class="filareg">
					<label><?php
						if($tipocli=="Independiente"){
							$text="";
							echo "Nombres";
						}
						if($tipocli=="Empresa"){
							echo "Razon Social";
						}
				?></label>:&nbsp;<b><?php echo $nombre; ?></b>
				</div>
				<div class="filareg" <?php echo $text; ?>>
					<label>Apellidos</label>:&nbsp;<b><?php echo $apellidos; ?></b>
				</div>
				<div class="filareg">
					<label>C&oacute;digo</label>:&nbsp;<b><?php echo $DNI; ?></b>
				</div>
				<div class="filareg">
					<label>Nacionalidad</label>:&nbsp;<b><?php echo $nacio; ?></b>
				</div>
				<div class="filareg">
					<label>Telefono</label>:&nbsp;<b><?php echo $telefono; ?></b>
				</div>
				<div class="filareg">
					<label>Email</label>:&nbsp;<b><?php echo $email; ?></b>
				</div><?php
					if($nacio=="Peru")
						$text2="";
				 ?><div class="filareg" <?php echo $text2; ?>>
					<label>Departamento</label>:&nbsp;<b><?php echo $dpto; ?></b>
				</div>
				<div class="filareg">
					<label>Ciudad</label>:&nbsp;<b><?php echo $ciudad; ?></b>
				</div>
				<div class="filareg">
					<label>Movil</label>:&nbsp;<b><?php echo $movil; ?></b>
				</div>
				<hr />
				<form method="POST" action="modcliente.php?t=1">
					<div class="btnreg">
						<center><input name="memp" type="submit" value="Modificar Datos" /></center>
					</div>
				</form>
				<form method="POST" action="modcliente.php?t=2">
					<div class="btnreg">
						<center><input name="modclave" type="submit" value="Cambiar Clave" /></center>
					</div>
				</form>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>