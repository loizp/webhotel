<?php
	require ("sesion.php");
	require ("funciones.php");
	require ("../agregados/inicio.php");
	$Nombre1="";
	$Nombre2="";
	$Nombre3="";
	$Nombre4="";
	$ID1="";
	$ID2="";
	$ID3="";
	$ID4="";
	$var = "";
	if (isset($_GET['a']))
	{
		$var = $_GET['a'];
		if($var==1){
			$ID1=$_POST['paises'];
			$co="select * from Pais where idPais='".$ID1."'";
			$ro=mysql_query($co);
			$tab=mysql_fetch_array($ro);
			$Nombre1=$tab['Nombre'];
		}
		if($var==2){
			$ID2=$_POST['dptos'];
			$co="select * from Departamentos where idDepartamentos='".$ID2."'";
			$ro=mysql_query($co);
			$tab=mysql_fetch_array($ro);
			$Nombre2=$tab['Nombre_Dpto'];
		}
		if($var==3){
			$ID3=$_POST['serv'];
			$co="select * from Servicios where idServicios='".$ID3."'";
			$ro=mysql_query($co);
			$tab=mysql_fetch_array($ro);
			$Nombre3=$tab['Detalle_Serv'];
		}
		if($var==4){
			$ID4=$_POST['ubi'];
			$co="select * from Ubicacion where idUbicacion='".$ID4."'";
			$ro=mysql_query($co);
			$tab=mysql_fetch_array($ro);
			$Nombre4=$tab['Descripcion'];
		}
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
					<h2><center>Registrar Inf. Adicional</center></h2>
					<hr />
					<form name="fregadmin1" method="POST" action="gpaises.php">
						<h3><center>Registrar Paises</center></h3>
						<div class="filareg">
							<label>Nombre del Pais</label>:&nbsp;<input name="nombrepais" type="text" value="<? echo $Nombre1 ?>" size="15" /><input type="hidden" name="txtid1" value="<? echo $ID1 ?>" />
						</div>
						<div class="btnreg">
							<center><input name="gpais" type="submit" value="Guardar" /></center>
						</div>
						<hr />
					</form>
					<form name="fregadmin2" method="POST" action="gdepartamentos.php">
						<h3><center>Registrar Departamentos del Per&uacute;</center></h3>
						<div class="filareg">
							<label>Nombre del Dpto.</label>:&nbsp;<input name="nombredpto" type="text" value="<? echo $Nombre2 ?>" size="25" /><input type="hidden" name="txtid2" value="<? echo $ID2 ?>" />
						</div>
						<div class="btnreg">
							<center><input name="gdpto" type="submit" value="Guardar" /></center>
						</div>
						<hr />
					</form>
					<form name="fregadmin3" method="POST" action="gservicios.php">
						<h3><center>Registrar Servicios del Hotel</center></h3>
						<div class="filareg">
							<label>Descripci&oacute;n Servicio</label>:&nbsp;<input name="descripservicio" value="<? echo $Nombre3 ?>" type="text" size="30" /><input type="hidden" name="txtid3" value="<? echo $ID3 ?>" />
						</div>
						<div class="btnreg">
							<center><input name="gserv" type="submit" value="Guardar" /></center>
						</div>
						<hr />
					</form>
					<form name="fregadmin4" method="POST" action="gubicaciones.php">
						<h3><center>Registrar Ubicaci&oacute;n de Habitaciones</center></h3>
						<div class="filareg">
							<label>Descripci&oacute;n Ubicaci&oacute;n</label>:&nbsp;<input name="descripubi" value="<? echo $Nombre4 ?>" type="text" size="30" /><input type="hidden" name="txtid4" value="<? echo $ID4 ?>" />
						</div>
						<div class="btnreg">
							<center><input name="gubicacion" type="submit" value="Guardar" /></center>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>