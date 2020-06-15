<?php
	require("funciones.php");
	$Desc = $_POST['descr'];
	$valid =$_POST['idhab'];
	$ID = $_POST['numh'];
	$Esta = $_POST['esta'];
	$tip = $_POST['seltiha'];
	$ub = $_POST['selubi'];
	if(strlen($valid) > 0) {
		$var[3] = $Desc;
		$var[0] = $valid;
		$var[1] = $ub;
		$var[4] = $Esta;
		$var[2] = $tip;
		modificar("Habitacion",$var);
		echo "<script language='JavaScript'>alert('Habitacion Guardado Correctamente');</script>";
	} else {
		if(strlen($ID) > 0) {
			$ver="select * from Habitacion where idHabitacion='".$ID."'";
			$r=mysql_query($ver);
			if(mysql_num_rows($r)>0){
				echo "<script language='JavaScript'>alert('Ya Existe una Habitacion con ese Numero');</script>";
			} else {
				$var[0] = $ID;
				$var[1] = $ub;
				$var[2] = $tip;
				$var[3] = $Desc;
				$var[4] = $Esta;
				insertar("Habitacion",$var);
				echo "<script language='JavaScript'>alert('Habitacion Guardado Correctamente');</script>";
			}
		} else {
			echo "<script language='JavaScript'>alert('Debe Ingresar bien los Datos');</script>";
		}
	}
?>
<script language="JavaScript">
	window.location="habitaciones.php";
</script>