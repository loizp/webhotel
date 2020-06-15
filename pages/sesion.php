<?php
	session_start();
	if(empty($HTTP_SESSION_VARS['empleado']) || ($_SESSION['empleado']=="")){
		session_destroy();
		header("Location: login.php");
		exit();
	}
	$boleto=$_SESSION['empleado'];
?>
