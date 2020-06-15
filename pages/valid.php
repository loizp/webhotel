<?php
	session_start();
	require("funciones.php");
	if ($_POST['login']="si") {
		$usuario=$_POST['user'];
		$cuenta=$_POST['clave'];
		if (($usuario=="") || ($cuenta=="")) {
			$_SESSION['error_login']="Datos en blanco";
			$url_relativa = "login.php";
			header ("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/".$url_relativa);
		} else {
			$consulval="select * from Empleado where User_DNI ='".$usuario."' and Clave = '".$cuenta."'";
			$resulcon=mysql_query($consulval);
			$regres=mysql_fetch_array($resulcon);
			if (mysql_num_rows($resulcon)==1){
				if ($regres['Estado']=="L") {
					session_start();
					session_register('empleado');
					$_SESSION['empleado']= $regres['idEmpleado'];
					$url_relativa = "admin.php";
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/" .$url_relativa);
				} else {
					$_SESSION['error_login']="Usuario sin privilegios en estos momentos";
					$url_relativa="login.php";
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/".$url_relativa);
				}
			} else {
				$consulval="select * from Cliente where DNI_RUC_CE ='".$usuario."' and Clave = '".$cuenta."'";
				$resulcon=mysql_query($consulval);
				$regres=mysql_fetch_array($resulcon);
				if (mysql_num_rows($resulcon)==1){
					session_start();
					session_register('cliente');
					$_SESSION['cliente']= $regres['idCliente'];
					$url_relativa = "iniciarcliente.php";
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/" .$url_relativa);
				} else {
					$_SESSION['error_login']="Usuario o Clave incorrecta";
					$url_relativa="login.php";
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/".$url_relativa);
				}
			}
			mysql_free_result($consulval);
		}
		mysql_close();
	} else {
		session_destroy();
	}
?>