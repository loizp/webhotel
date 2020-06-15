<?php
	require("funciones.php");
	$nombres = $_POST['nombres'];
	$DNI =$_POST['DNI'];
	$sexo=$_POST['sexo'];
	$ID = $_POST['idemp'];
	$dir = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$tipoemp = $_POST['tipoemp'];
	$estado = $_POST['estado'];
	$clave = $_POST['clave'];
	$clave2 = $_POST['claveconfirm'];
	if($clave==$clave2) {
		$var[3] = $telefono;
		$var[0] = $ID;
		$var[1] = $nombres;
		$var[4] = $sexo;
		$var[2] = $dir;
		$var[5] =$email;
		$var[6] =$DNI;
		$var[7] =$clave;
		$var[8] =$tipoemp;
		$var[9] =$estado;
		modificar("Empleado",$var);
		echo "<script language='JavaScript'>alert('Empleado Modificado Correctamente');</script>";
	} else {
		echo "<script language='JavaScript'>alert('No coinciden los passwords');</script>";
	}
?>
<script language="JavaScript">
	window.location="admin.php";
</script>