<?php
	require("funciones.php");
	$nombre = $_POST['descripservicio'];
	$ID = $_POST['txtid3'];
	
	if(strlen($ID) > 0)
	{
		$var[1] = $nombre;
		$var[0] = $ID;
		modificar("Servicios",$var);
	}
	else
	{
		$var[0] = $nombre;
		insertar_id("Servicios",$var);
	}
?>
<script language="JavaScript">
	alert("Servicio Guardado Correctamente");
	window.location="adicionales.php";
</script>