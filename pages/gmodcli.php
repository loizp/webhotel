<?php
	require("funciones.php");
	$nombres = $_POST['nombres'];
	$DNI =$_POST['DNI'];
	$ID = $_POST['idcli'];
	$dpto = $_POST['dpto'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$tipocli = $_POST['tipocli'];
	$movil = $_POST['movil'];
	$clave = $_POST['clave'];
	$clave2 = $_POST['claveconfirm'];
	$pais = $_POST['nacio'];
	$apellidos = $_POST['apellidos'];
	$ciudad = $_POST['ciudad'];
	if(($clave==$clave2) && ($clave!="") && (comprobar_email($email)==1) && (strlen($DNI)>7)) {
		$var[3] = $apellidos;
		$var[0] = $ID;
		$var[1] = $pais;
		$var[4] = $DNI;
		$var[2] = $nombres;
		$var[5] =$telefono;
		$var[6] =$movil;
		$var[7] =$email;
		$var[8] =$ciudad;
		$var[9] =$dpto;
		$var[10] =$clave;
		$var[11] =$tipocli;
		modificar("Cliente",$var);
		echo "<script language='JavaScript'>alert('Cliente Modificado Correctamente');</script>";
	} else {
		echo "<script language='JavaScript'>alert('Datos Incorrectos');</script>";
	}
?>
<script language="JavaScript">
	window.location="cliente.php";
</script>