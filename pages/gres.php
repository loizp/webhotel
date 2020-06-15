<?php
	require("funciones.php");
	if(isset($_POST['ghabres'])){
		$hab[0]=$_POST['habsel1'];
		$hab[1]=$_POST['habsel2'];
		$hab[2]=$_POST['habsel3'];
		$hab[3]=$_POST['habsel4'];
		$hab[4]=$_POST['habsel5'];
		$hab[5]=$_POST['habsel6'];
		$nom[0]=$_POST['nombreo1'];
		$nom[1]=$_POST['nombreo2'];
		$nom[2]=$_POST['nombreo3'];
		$nom[3]=$_POST['nombreo4'];
		$nom[4]=$_POST['nombreo5'];
		$nom[5]=$_POST['nombreo6'];
		$numad[0]=$_POST['numad1'];
		$numad[1]=$_POST['numad2'];
		$numad[2]=$_POST['numad3'];
		$numad[3]=$_POST['numad4'];
		$numad[4]=$_POST['numad5'];
		$numad[5]=$_POST['numad6'];
		$numni[0]=$_POST['numni1'];
		$numni[1]=$_POST['numni2'];
		$numni[2]=$_POST['numni3'];
		$numni[3]=$_POST['numni4'];
		$numni[4]=$_POST['numni5'];
		$numni[5]=$_POST['numni6'];
		$cant = $_POST['numreg'];
		$resid = $_POST['reservaid'];
		$var[0] = $resid;
		for ($c=0;$c<$cant;$c++){
			$var[1] = $hab[$c];
			$var[2] = $nom[$c];
			$var[3] = $numad[$c];
			$var[4] = $numni[$c];
			echo "<script language='JavaScript'>alert('".$hab[$c]."');</script>";
			insertar("Reservaciones_has_Habitacion",$var);
		}
?>
<script language="JavaScript">
	window.location="iniciarcliente.php?busc=2";
</script>
<?php
	} else {
?>
<script language="JavaScript">
	window.location="login.php";
</script>
<?php
	}
?>
