<?php
	require("funciones.php");
	$nombre = $_POST['descripubi'];
	$ID = $_POST['txtid4'];
	
	if(strlen($ID) > 0)
	{
		$var[1] = $nombre;
		$var[0] = $ID;
		modificar("Ubicacion",$var);
	}
	else
	{
		$var[0] = $nombre;
		insertar_id("Ubicacion",$var);
	}
?>
<script language="JavaScript">
	alert("Ubicacion Guardado Correctamente");
	window.location="adicionales.php";
</script>