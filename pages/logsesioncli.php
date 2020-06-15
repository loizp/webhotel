<?php
	session_start();
	if(empty($HTTP_SESSION_VARS['cliente']) || ($_SESSION['cliente']=="")){
		session_destroy();
		header("Location: login.php");
		exit();
	}
	$boleto=$_SESSION['cliente'];
?>