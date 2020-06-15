<?php
	require("funciones.php");
	$ID = $_POST['idem'];
	$total = $_POST['totalchk'];
	$clle="delete from Empleado_has_Item_Menu where Empleado_idEmpleado='".$ID."'";
	mysql_query($clle);
	for($i=0;$i<$total;$i++){
		if(isset($_POST["chekmenu"][$i])){
				$in="insert into Empleado_has_Item_Menu values('".$ID."','".$_POST["chekmenu"][$i]."')";
				mysql_query($in);
		} 
	}
	echo "<script language='JavaScript'>alert('Menu Guardado Correctamente');</script>";
?>
<script language="JavaScript">
	window.location="empleados.php";
</script>