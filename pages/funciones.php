<?
	require("conexion.php");
	
	function insertar_id($tabla,$campos)
	{
		$consulta = mysql_query("select * from ".$tabla);
		$numcampos = mysql_num_fields($consulta);
		$sql ="insert into ".$tabla."(";
		for($i=1;$i<$numcampos;$i++)
		{
			$nom = mysql_field_name($consulta,$i);
			$sql = $sql.$nom;
			if ($i!=$numcampos-1)
			{
				$sql = $sql.",";
			}
		}
		$sql = $sql.") values(";
		
		$numcampos = count($campos);
		for($i=0;$i<$numcampos;$i++)
		{
			$sql = $sql."'".$campos[$i]."'";
			if ($i!=$numcampos-1)
			{
				$sql = $sql.",";
			}
		}
		$sql = $sql.")";
		$consulta = mysql_query($sql);
	}
	function insertar($tabla,$campos)
	{
		$consulta = mysql_query("select * from ".$tabla);
		$numcampos = mysql_num_fields($consulta);
		$sql ="insert into ".$tabla."(";
		for($i=0;$i<$numcampos;$i++)
		{
			$nom = mysql_field_name($consulta,$i);
			$sql = $sql.$nom;
			if ($i!=$numcampos-1)
			{
				$sql = $sql.",";
			}
		}
		$sql = $sql.") values(";
		
		$numcampos = count($campos);
		for($i=0;$i<$numcampos;$i++)
		{
			$sql = $sql."'".$campos[$i]."'";
			if ($i!=$numcampos-1)
			{
				$sql = $sql.",";
			}
		}
		$sql = $sql.")";
		$consulta = mysql_query($sql);
	}
	function modificar($tabla,$campos)
	{
		$consulta = mysql_query("select * from ".$tabla);
		$numcampos = mysql_num_fields($consulta);
		$sql ="update ".$tabla." set ";
		for($i=1;$i<$numcampos;$i++)
		{
			$nom = mysql_field_name($consulta,$i);
			$sql = $sql.$nom." = '".$campos[$i]."'";
			if ($i!=$numcampos-1)
			{
				$sql = $sql.",";
			}
		}
		$nom = mysql_field_name($consulta,0);
		$sql = $sql." where ".$nom." = '".$campos[0]."'";
		$consulta = mysql_query($sql);
	}
	function mostrar_Menu_admin(){
		$consulta = "select * from Item_Menu where Propietario <> 'C'";
		$c=mysql_query($consulta);
		while($lista = mysql_fetch_array($c)){
			echo "<a href =".$lista['Direccion_Item'].".php >".$lista['Nom_Item']."</a><br />";
		}
	}
	function mostrar_menu_empleado($id){
		$consulta = "select * from Empleado_has_Item_Menu where Empleado_idEmpleado='".$id."'";
		$c=mysql_query($consulta);
		while($listc = mysql_fetch_array($c)){
			$liscon="select * from Item_Menu where idItem_Menu='".$listc['Item_Menu_idItem_Menu']."' and Propietario = 'E'";
			$re=mysql_query($liscon);
			$fil=mysql_fetch_array($re);
			echo "<a href =".$fil['Direccion_Item'].".php >".$fil['Nom_Item']."</a><br />";
		}
	}
	function mostrar_menu_cliente(){
		$con="select * from Item_Menu where Propietario = 'C'";
		$re=mysql_query($con);
		while($fil=mysql_fetch_array($re)){
			if($fil['Direccion_Item']=="iniciarcliente"){
				echo "<a href =".$fil['Direccion_Item'].".php?busc=2>".$fil['Nom_Item']."</a><br />";
			} else {
				echo "<a href =".$fil['Direccion_Item'].".php >".$fil['Nom_Item']."</a><br />";
			}
		}
	}
	function comprobar_email($email){
		$mail_correcto = 0;
		if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
			if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
				if (substr_count($email,".")>= 1){
					$term_dom = substr(strrchr ($email, '.'),1);
					if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
						$antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
						$caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
						if ($caracter_ult != "@" && $caracter_ult != "."){
							$mail_correcto = 1;
						}
					}
				}
			}
		}
		if ($mail_correcto)
			return 1;
		else
			return 0;
	}
?>