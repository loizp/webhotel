<?php
	mostrar_menu_cliente();
	echo "<a href='blokseg.php'>Salir</a>";
	$con3="select * from Cliente where idCliente=".$boleto;
	$he3=mysql_query($con3);
	$le3=mysql_fetch_array($he3);
	$nom=$le3['Nom_RazonSoc'];
	$apell=$le3['Apellidos'];
?>
	<hr />
	<center><h3>Bienvenido :</h3></center>
	<b><?php echo $nom; ?></b><br />
	<b>&nbsp;<?php echo $apell; ?></b>