<?php
	$cad="select * from Empleado where idEmpleado=".$boleto;
	$rca=mysql_query($cad);
	$rf=mysql_fetch_array($rca);
	if($rf['Tipo_Empleado']=="A"){
		mostrar_Menu_admin();
	} else {
		mostrar_menu_empleado($boleto);
	}
	echo "<a href='blokseg.php'>Salir</a>";
?>