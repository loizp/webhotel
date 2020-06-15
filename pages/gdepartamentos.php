<?php
	require("funciones.php");
	$nombre = $_POST['nombredpto'];
	$ID = $_POST['txtid2'];
	
	if(strlen($ID) > 0)
	{
		$var[1] = $nombre;
		$var[0] = $ID;
		modificar("Departamentos",$var);
	}
	else
	{
		$var[0] = $nombre;
		insertar_id("Departamentos",$var);
	}
?>
<script language="JavaScript">
	alert("Departamento Guardado Correctamente");
	window.location="adicionales.php";
</script>