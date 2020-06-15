<?php
	require ("../agregados/inicio.php");
	require("funciones.php");
	$cat="";
	if(isset($_GET['t'])){
		$cat=$_GET['t'];
	}
?>
<script type="text/javascript" src="../agregados/slided.js"></script>
<script type="text/javascript" src="../agregados/instant.js"></script>
<script type="text/javascript">
<?php
	if($cat!=""){
		if($cat=="T")
			$dir="../imagenes/fotos/tarapoto/";
		if($cat=="H")
			$dir="../imagenes/fotos/hotel/";
		if($cat=="P")
			$dir="../imagenes/fotos/paseos/";
		$arregurl="";
		$arregti="";
		$arregsel="";
		$finicio=$dir;
		$cpa="select * from Fotos where Categoria='".$cat."'";
		$rpa=mysql_query($cpa);
		$cantid=mysql_num_rows($rpa);
		$numsel=0;
		while($lpa=mysql_fetch_array($rpa)){
			if($numsel!=0){
				$arregurl=$arregurl.",'".$lpa['URL']."'";
				$arregti=$arregti.",'".$lpa['Titulo']."'";
				$arregsel=$arregsel.",'".($numsel + 1)." de ".$cantid."'";
			} else {
				$arregurl=$arregurl."'".$lpa['URL']."'";
				$arregti=$arregti."'".$lpa['Titulo']."'";
				$arregsel=$arregsel."'".($numsel + 1)." de ".$cantid."'";
				$finicio=$finicio.$lpa['URL'];
			}
			$numsel++;
		}
	}
?>
	var aurlfoto = new Array(<?php echo $arregurl; ?>);
	var atifoto = new Array(<?php echo $arregti; ?>);
	var aselfoto = new Array(<?php echo $arregsel; ?>);
	function opcion(oCntrl, iPos, sTxt, sVal){
		var selOpcion=new Option(sTxt, sVal);
		eval(oCntrl.options[iPos]=selOpcion);
	}
	function llena(oCntrl){
		while (oCntrl.length) oCntrl.remove(0);
		for(var i = 0; i < aselfoto.length; i++)
		opcion(oCntrl,  i, aselfoto[i], String(i));
	}
	function cambiarimagen(obj1){
		var sel= obj1.selectedIndex;
		document.getElementById('iniciagal').style.display="none";
		document.getElementById('navimagen').style.display="";
		document.getElementById('ifoto').src="<?php echo $dir;?>" + aurlfoto[sel];
	}
	function modiframe(op){
		num=document.selgal.selfoto.selectedIndex;
		if(op=='anterior'){
			num=num-1;
			if(num<0){
				document.selgal.selfoto.value=<? echo $numsel-1; ?>;
				num=<? echo $numsel-1; ?>;
			}else{
				document.selgal.selfoto.value=num;
			}
		}
		if(op=='siguiente'){
			num=num+1;
			if(num><? echo $numsel-1; ?>){
				document.selgal.selfoto.value=0;
				num=0;
			}else{
				document.selgal.selfoto.value=num;
			}
		}
		if(num>=0){
			document.getElementById('iniciagal').style.display="none";
			document.getElementById('ifoto').src="<?php echo $dir;?>" + aurlfoto[num];
			document.getElementById('navimagen').style.display="";
		}
	}
</script>
<?php require ("../agregados/cabecera.php");?>
		<div class="<?php
			if($cat=="")
				echo "contenido";
			else
				echo "contengal"; ?>">
			<div class="menugaleria">
				<div class="menugal">
					<h3><center>El Hotel</center></h3>
					<a href="galeria.php?t=H"><img src="../imagenes/fotos/hotel.jpg" class="slided ibgcolord0d0d0 igradiente0e0e0 noshadow nocircles" /></a>
				</div>
				<div class="menugal">
					<h3><center>Tarapoto</center></h3>
					<a href="galeria.php?t=T"><img src="../imagenes/fotos/foto1.jpg" class="slided ibgcolord0d0d0 igradiente0e0e0 noshadow nocircles" /></a>
				</div>
				<div class="menugal">
					<h3><center>Paseos</center></h3>
					<a href="galeria.php?t=P"><img src="../imagenes/fotos/paseo.jpg" class="slided ibgcolord0d0d0 igradiente0e0e0 noshadow nocircles" /></a>
				</div>
			</div>
			<?php if($cat==""){ ?>
			<div class="bienvgal">
				<div class="pbgal">
					<p><b>Vergel Start</b> los invita a visitar nuestra galeria donde podra apreciar lo cautivador y confortable que es el elegir un buen alojamiento como es nuestra Institucion. Disfrute lo placentero que puede ser su estadia en la ciudad de Tarapoto en nuestro alojamiento.<br /><br />Consideramos que esta a un solo click de dar una visita virtual por nuestro Hotel, ante ello debe elegir la categoria que quiere visitar segun el albun elegido los mismos que se encuentran en la parte superior.</p>
				</div>
				<div class="pbgal">
					<img src="../imagenes/fotos/foto1.jpg" class="instant ishadow50 itiltleft icolor000000" />
				</div>
			</div>
			<?php } else { ?>
			<div class="resulgaleria">
				<div class="navgal">
					<div class="barranav">
						<a href="javascript:modiframe('anterior');"><img src="../imagenes/ant.gif" border="0" /></a>
					</div>
					<div class="barranav">
						<form name="selgal">
							<select name="selfoto" onchange="javascript:cambiarimagen(document.selgal.selfoto)">
								<option value=" ">&nbsp;</option>
							</select>
						</form>
					</div>
					<script language="JavaScript">
						llena(document.selgal.selfoto);
					</script>
					<div class="barranav">
						<a href="javascript:modiframe('siguiente');"><img src="../imagenes/sgte.gif" border="0" /></a>
					</div>
				</div>
				<div class = "imagenreflejo" id="iniciagal">
					<img name="resulfoto" src = "<?php echo $finicio; ?>" />
				</div>
				<div class = "imagenreflejo" id="navimagen" style='display:none'>
					<img name="resulfoto2" id="ifoto" src = "" />
				</div>
			</div>
			<?php } ?>
		</div>
<?php require ("../agregados/pie.php");?>