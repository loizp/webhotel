<?php
	require ("logsesioncli.php");
	require ("funciones.php");
	require ("../agregados/inicio.php");
	$nombres="";
	$DNI="";
	$apellidos="";
	$telefono="";
	$email="";
	$ID="";
	$estado="";
	$tipoemp="";
	$clave="";
	$sexo="";
	$text1="";
	$text2="";
	if (isset($_GET['t'])){
		$var=$_GET['t'];
		$co="select * from Cliente where idCliente=".$boleto;
		$ro=mysql_query($co);
		$tab=mysql_fetch_array($ro);
		$DNI=$tab['DNI_RUC_CE'];
		$ID=$tab['idCliente'];
		$nombres=$tab['Nom_RazonSoc'];
		$apellidos=$tab['Apellidos'];
		$telefono=$tab['Telefono'];
		$email=$tab['Email'];
		$clave=$tab['Clave'];
		$movil=$tab['Movil'];
		$ciudad=$tab['Ciudad'];
		$dpto=$tab['Departamento'];
		$tipocli=$tab['Tipo_Cliente'];
		$nacio=$tab['Pais_idPais'];
		$texttip="";
		if($tipocli!="Independiente" && $var==1)
			$texttip="style='display:none'";
	}
?>
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
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
				<?php require ("menucli.php");?>
			</div>
			<div class="contenadmin2">
				<div class="formreg">
					<form name="fregadmin" method="POST" action="gmodcli.php">
						<h2><center><?php
							if($var==1){
								echo "Modificar Cliente";
								$text1="style='display:none'";
							}
							if($var==2){
								echo "Cambiar Contrace&ntilde;a";
								$text2="style='display:none'";
							}
						?></center></h2>
						<hr />
						<div class="filareg" <?php echo $text2; ?>>
							<label><?php
								if($tipocli=="Independiente"){
									echo "Nombres";
								}
								if($tipocli=="Empresa"){
									echo "Razon Social";
								}
							?></label>:&nbsp;<input name="nombres" type="text" value="<?php echo $nombres; ?>" size="30" /><input type="hidden" name="idcli" value="<?php echo $ID; ?>" /><input type="hidden" name="nacio" value="<?php echo $nacio; ?>" /><input name="tipocli" value="<?php echo $tipocli; ?>" type="hidden" /><input name="dpto" value="<?php echo $dpto; ?>" type="hidden" /><input name="ciudad" value="<?php echo $ciudad; ?>" type="hidden" />
						</div>
						<div class="filareg" <?php echo $text2." ".$texttip; ?>>
							<label>Apellidos</label>:&nbsp;<input name="apellidos" onkeypress = "return validar_texto(event)" type="text" value="<?php echo $apellidos; ?>" size="30" />
						</div>
						<div class="filareg" <?php echo $text2; ?>>
							<label>Codigo de Ident.</label>:&nbsp;<?php echo $DNI; ?><input name="DNI" type="hidden" value="<?php echo $DNI; ?>" />
						</div>
						<div class="filareg" <?php echo $text2; ?>>
							<label>Telefono</label>:&nbsp;<input name="telefono" onkeypress = "return validarNum(event)" value="<?php echo $telefono; ?>" type="text" size="12" />
						</div>
						<div class="filareg" <?php echo $text2; ?>>
							<label>Email</label>:&nbsp;<input name="email" value="<?php echo $email; ?>" type="text" size="25" />
						</div>
						<div class="filareg" <?php echo $text2; ?>>
							<label>Movil</label>:&nbsp;<input name="movil" onkeypress = "return validarNum(event)" value="<?php echo $movil; ?>" type="text" size="15" />
						</div>
						<div class="filareg" <?php echo $text1; ?>>
							<label>Contrace&ntilde;a</label>:&nbsp;<input name="clave" value="<?php echo $clave; ?>" type="password" size="10" />
						</div>
						<div class="filareg" <?php echo $text1; ?>>
							<label>Confirmar Contrace&ntilde;a</label>:&nbsp;<input value="<?php echo $clave; ?>" name="claveconfirm" type="password" size="10" />
						</div>
						<div class="btnreg">
							<center><input name="gmodcli" type="submit" value="Guardar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>