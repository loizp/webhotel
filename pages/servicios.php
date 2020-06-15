<?php
	require ("../agregados/inicio.php");
	require("funciones.php");
?>
<script type="text/javascript" src="../agregados/justcorners.js"></script>
<script type="text/javascript" src="../agregados/corner.js"></script>
<?php require ("../agregados/cabecera.php");?>
		<div class="contenido">
			<div class="contentserv1">
				<div class="barrainib">
					<img src="../imagenes/fotos/foto2.jpg" class="corner iradius10 ishadow50" />
				</div>
				<div class="barrainib">
					<p>Las habitaciones son modernas, cuentan con aire acondicionado, TV Cable y lo necesario para que su estad&iacute;a sea grata. Desde el hotel usted podr&aacute; tener informaci&oacute;n sobre los atractivos tur&iacute;sticos de la zona, informaci&oacute;n sobre la cuidad y las actividades que se est&eacute;n realizando en el momento de la visita, ya sean fiestas, eventos sociales o la vibrante vida diaria de la ciudad.</p><br />
					<h3>Tipos de Habitaci&oacute;n</h3>
					<ul><?php
						$a="select * from Tipo_Habitacion";
						$b=mysql_query($a);
						while($l=mysql_fetch_array($b)){
							echo "<li>".$l['Clase']." - ".$l['Nombre_Tipo'].".</li>";
						}
					 ?></ul>
				</div>
			</div>
			<div class="contentserv2">
				<div class="barrainib2">
					<h3>Servicios de habitaciones</h3>
					<ul><?php
						$a="select * from Servicios";
						$b=mysql_query($a);
						while($l=mysql_fetch_array($b)){
							echo "<li>".$l['Detalle_Serv'].".</li>";
						}
					 ?></ul>
				</div>
				<div class="barrainib2">
					<h3>Servicios Adicionales</h3>
					<ul>
						<li>Restaurante.</li>
						<li>Bar.</li>
						<li>Playa de Estacionamiento.</li>
						<li>Lavander&iacute;a.</li>
					</ul>
				</div>
			</div>
		</div>
<?php require ("../agregados/pie.php");?>