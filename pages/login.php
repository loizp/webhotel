<?php
	session_start();
	require ("funciones.php");
	require ("../agregados/inicio.php");
?>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenidoadmin">
			<div class="clear">&nbsp;</div>
			<div class="contenadmin1">
			</div>
			<div class="contenadmin2">
				<div class="mensaje"><?php
					if(($_SESSION['error_login']=="Datos en blanco") || ($_SESSION['error_login']=="Usuario sin privilegios en estos momentos") || ($_SESSION['error_login']=="Usuario o Clave incorrecta")){
						echo "<center><h3>".$_SESSION['error_login']."</h3></center>";
					}
				?></div>
				<div class="formingreso">
					<form name="ingsistema" method="POST" action="valid.php">
						<div>
							<div class="filareg">
								<label>DNI</label>:&nbsp;<input name="user" type="text" size="15" /><input name="login" type="hidden" value="si" />
							</div>
							<div class="filareg">
								<label>Contrace&ntilde;a</label>:&nbsp;<input name="clave" type="password" size="15" />
							</div>
							<div class="filareg">
								<input name="ingresar" type="submit" value="Ingresar" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>