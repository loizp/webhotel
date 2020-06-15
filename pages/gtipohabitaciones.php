<?php
	require("funciones.php");
	$nombre = $_POST['nombretipo'];
	$ID = $_POST['txtid'];
	$clase = $_POST['nombreclase'];
	$Precio = intval($_POST['precio']);
	
	if(strlen($ID) > 0)
	{
		$var[1] = $nombre;
		$var[0] = $ID;
		$var[2] = $Precio;
		$var[3] = $clase;
		modificar("Tipo_Habitacion",$var);
	}
	else
	{
		$var[0] = $nombre;
		$var[1] = $Precio;
		$var[2] = $clase;
		insertar_id("Tipo_Habitacion",$var);
	}
?>
<script language="JavaScript">
	alert("Tipo de habitacion Guardado Correctamente");
	window.location="tipohabitaciones.php";
</script>