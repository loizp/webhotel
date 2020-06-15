<?php
	require("funciones.php");
	$ID = $_POST['idem'];
	$total = $_POST['totalchk'];
	$clle="delete from Tipo_Habitacion_has_Servicios where Tipo_Habitacion_idTipo_Habitacion='".$ID."'";
	mysql_query($clle);
	for($i=0;$i<$total;$i++){
		if(isset($_POST["chekserv"][$i])){
				$in="insert into Tipo_Habitacion_has_Servicios values('".$ID."','".$_POST["chekserv"][$i]."')";
				mysql_query($in);
		} 
	}
	echo "<script language='JavaScript'>alert('Asignado Correctamente');</script>";
?>
<script language="JavaScript">
	window.location="asignarservicios.php";
</script>