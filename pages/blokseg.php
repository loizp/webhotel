<?php
	require ("funciones.php");
	session_start();
	session_destroy();
	$url_relativa="elhotel.php";
	header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/".$url_relativa);
?>