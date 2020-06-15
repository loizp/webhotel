<?php
	session_start();
	require("funciones.php");
	if(isset($_POST['log'])){
		$creador=$_POST['log'];
		$pais= $_POST['selpais'];
		$tipoc= $_POST['tipocliente'];
		if($tipoc=="Independiente"){
			$nombres = $_POST['nombres'];
			$apellidos= $_POST['apellidos'];
			$DNI = $_POST['DNI_CE'];
		}
		if($tipoc=="Empresa"){
			$nombres = $_POST['razonsoc'];
			$apellidos= "";
			$DNI = $_POST['RUC'];
		}
		if($pais==1){
			$dpto=$_POST['seldepartamento'];
		}else {
			$dpto="";
		}
		$ciudad = $_POST['ciudad'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$movil = $_POST['movil'];
		$clave = $_POST['clave'];
		$clave2 = $_POST['claveconfir'];
		$fechaini = $_POST['fllegada'];
		$fechafin = $_POST['fsalida'];
		$numhab = $_POST['numh'];
		if($fechafin !="" && $fechaini !="" && $clave!="" && $email !="" && $ciudad!="" && $nombres!="" && $DNI!=""){
			if($clave==$clave2 && (comprobar_email($email)==1) && (strlen($DNI)>7)) {
				$var[2] = $apellidos;
				$var[0] = $pais;
				$var[3]= $DNI;
				$var[1] =$nombres;
				$var[4] =$telefono;
				$var[5] =$movil;
				$var[6] =$email;
				$var[7] =$ciudad;
				$var[8] =$dpto;
				$var[9] =$clave;
				$var[10] =$tipoc;
				$cu="select * from Cliente where DNI_RUC_CE=".$DNI;
				$ru=mysql_query($cu);
				$res=mysql_fetch_array($ru);
				if (mysql_num_rows($ru)>0){
					echo "<script language='JavaScript'>alert('Cliente Esta Registrado Actualmente');</script>";
					if($clave==$res['Clave']){
						session_start();
						session_register('cliente');
						$_SESSION['cliente']= $res['idCliente'];
						session_register('fechini');
						$_SESSION['fechini']= $fechaini;
						session_register('fechfin');
						$_SESSION['fechfin']= $fechafin;
						session_register('numha');
						$_SESSION['numha']= $numhab;
						$url_relativa = "iniciarcliente.php";
						header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/" .$url_relativa);
					} else {
?>
<script language="JavaScript">
	window.location="login.php";
</script>
<?php
					}
				} else {
					insertar_id("Cliente",$var);
					session_start();
					$cbuscli="select * from Cliente where DNI_RUC_CE=".$DNI;
					$rbuscli=mysql_query($cbuscli);
					$lbuscli=mysql_fetch_array($rbuscli);
					session_register('cliente');
					$_SESSION['cliente']= $lbuscli['idCliente'];
					session_register('fechini');
					$_SESSION['fechini']= $fechaini;
					session_register('fechfin');
					$_SESSION['fechfin']= $fechafin;
					session_register('numha');
					$_SESSION['numha']= $numhab;
					$url_relativa = "iniciarcliente.php";
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/" .$url_relativa);
				}
			} else {
				echo "<script language='JavaScript'>alert('Datos Incorrectos');</script>";
?>
<script language="JavaScript">
	window.location="reservaciones.php";
</script>
<?php
			}
			mysql_close();
		} else {
			echo "<script language='JavaScript'>alert('LLena Bonito Pues');</script>";
?>
<script language="JavaScript">
	window.location="reservaciones.php";
</script>
<?php
		}
	} else {
		session_destroy();
	}