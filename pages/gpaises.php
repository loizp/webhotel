<?php
	require("funciones.php");
	$nombre = $_POST['nombrepais'];
	$ID = $_POST['txtid1'];
	
	if(strlen($ID) > 0)
	{
		$var[1] = $nombre;
		$var[0] = $ID;
		modificar("Pais",$var);
	}
	else
	{
		$var[0] = $nombre;
		insertar_id("Pais",$var);
	}
?>
<script language="JavaScript">
	alert("Pais Guardado Correctamente");
	window.location="adicionales.php";
</script>