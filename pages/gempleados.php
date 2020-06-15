<?php
	require("funciones.php");
	$nombres = $_POST['nombres'];
	$DNI =$_POST['DNI'];
	$ID = $_POST['idemp'];
	$dir = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$tipoemp = $_POST['tipoemp'];
	$estado = $_POST['estado'];
	$clave = $_POST['clave'];
	$clave2 = $_POST['claveconfirm'];
	$total = $_POST['totalchk'];
	if($clave==$clave2) {
		if(strlen($ID) > 0) {
			$var[3] = $telefono;
			$var[0] = $ID;
			$var[1] = $nombres;
			if(isset($_POST["sexo"][0])){
				$var[4]="M";
			} else {
				if(isset($_POST["sexo"][1])){
					$var[4] ="F";
				} else {
					$var[4] ="";
				}
			}
			$var[2] = $dir;
			$var[5] =$email;
			$var[6] =$DNI;
			$var[7] =$clave;
			$var[8] =$tipoemp;
			$var[9] =$estado;
			modificar("Empleado",$var);
			echo "<script language='JavaScript'>alert('Empleado Modificado Correctamente');</script>";
		} else {
			$var[2] = $telefono;
			$var[0] = $nombres;
			if(isset($_POST["sexo"][0])){
				$var[3]="M";
			} else {
				if(isset($_POST["sexo"][1])){
					$var[3] ="F";
				} else {
					$var[3] ="";
				}
			}
			$var[1] = $dir;
			$var[4] =$email;
			$var[5] =$DNI;
			$var[6] =$clave;
			$var[7] =$tipoemp;
			$var[8] =$estado;
			insertar_id("Empleado",$var);
			echo "<script language='JavaScript'>alert('Empleado Guardado Correctamente');</script>";
		}
	} else {
		echo "<script language='JavaScript'>alert('No coinciden los passwords');</script>";
	}
?>
<script language="JavaScript">
	window.location="empleados.php";
</script>