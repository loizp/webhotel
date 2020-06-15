<?php
	require("funciones.php");
	$cod = $_POST['numconfir'];
	$ccod="select * from Reservaciones where Codigo_Autent=".$cod." and Estado='S'";
	$cce=mysql_query($ccod);
	if(mysql_num_rows($cce)>0){
		$caut="update Reservaciones set Estado='C' where Codigo_Autent=".$cod;
		$cce=mysql_query($caut);
	} else {
		echo "<script language='JavaScript'>alert('Codigo Incorrecto');</script>";
?>
	<script language="JavaScript">
		window.location="iniciarcliente.php?busc=2";
	</script>
<?php
	}
?>
<script language="JavaScript">
	window.location="cliente.php";
</script>