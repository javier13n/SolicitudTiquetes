<?php

	require_once("bo/ClienteBo.php");
	require_once("domains/Cliente.php");
	
	$cedula = $_GET['cedula'];
	$clienteBo = new ClienteBo();
	$cliente = new Cliente();
	
	$cliente->setCedula($cedula);
	$resultado = $clienteBo->buscarPorCedula($cliente);
	
	$id = $resultado->Fields("id");
	$nombre = $resultado->Fields("nombre");
	$apellido1 = $resultado->Fields("apellido1");
	$apellido2 = $resultado->Fields("apellido2");
	$email = $resultado->Fields("email");
	$edad = $resultado->Fields("edad");
	$telefono1 = $resultado->Fields("telefono1");
	$telefono2 = $resultado->Fields("telefono2");
	$direccion = $resultado->Fields("direccion");
	$estado = $resultado->Fields("estado");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> <!-- RESET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> <!-- MAIN STYLE SHEET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" /> <!-- DEFAULT: 2 COLUMNS -->
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" /> <!-- ALTERNATE: 1 COLUMN -->
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> <!-- MSIE6 -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" /> <!-- GRAPHIC THEME -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" /> <!-- WRITE YOUR CSS CODE HERE -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<script type="text/javascript" src="js/toggle.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.tabs.js"></script>
	<script type="text/javascript" src="js/Cliente.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".tabs > ul").tabs();
		});
		
		$(function(){    	
		   	var s = "<?php echo($estado) ?>";
			if(s=="A"){
				$("#estado").attr('checked', true);
			}else{
				$("#estado").attr('checked', false);
			}
			
		});
	</script>
	<title>Gestión de Tickets</title>
</head>

<body>

<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">

		<p class="f-left box">

			<!-- Switcher -->
			<span class="f-left" id="switcher">
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a>
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="2 Columns" /></a>
			</span>

			<strong>Gestión De Tickets</strong>

		</p>

		<p class="f-right">User: <strong><a href="#">Administrator</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="#" id="logout">Log out</a></strong></p>

	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">

		<ul class="box f-right">
			<!--Menu a la derecha-->
		</ul>

		<ul class="box">
			<li id="menu-active"><a href="index.php"><span>Tickets</span></a></li> <!-- Active -->
			<li><a href="cDepartamentos.php"><span>Departamentos</span></a></li>
			<li><a href="cClientes.php"><span>Clientes</span></a></li>
			<li><a href="cFuncionarios.php"><span>Funcionarios</span></a></li>
			<li><a href="cBitacora.php"><span>Bitácora</span></a></li>
			<li><a href="cConfiguracion.php"><span>Configuración</span></a></li>
		</ul>
		

	</div> <!-- /header -->

	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Logo (Max. width = 200px) -->
				<!--<p id="logo"><a href="#"><img src="tmp/logo.gif" alt="Our logo" title="Visit Site" /></a></p>-->

				<!-- Search -->
			
				<!-- Create a new project -->
				<p id="btn-create" class="box"><a href="cClientes.php"><span>Regresar</span></a></p>

			</div> <!-- /padding -->

			<ul class="box">
				
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">

			<h1>Modificar Clientes</h1>
			<!-- Table (TABLE) -->
			<form onsubmit="modificar(); return false;" method="post"> 
 				<fieldset>
				<legend>Cliente</legend>
				<table class="nostyle">
					<tr>
						<td style="width:70px;">Cedula:</td>
						<td><input id="cedula" type="text" size="40" name="txtId" class="input-text" value="<?php echo($_GET['cedula']) ?>"/></td>
					</tr>
					<tr>
						<td style="width:70px;">Nombre:</td>
						<td><input id="nombre" type="text" size="40" name="txtNombre" class="input-text" value ="<?php echo($nombre) ?>" /></td>
					</tr>
					<tr>
						<td>Apellido 1:</td>
						<td><input id="apellido1" type="text" size="40" name="txtApellido1" class="input-text" value="<?php echo($apellido1) ?>"/></td>
					</tr>
					<tr>
						<td class="va-top">Apellido 2:</td>
						<td><input id="apellido2" type="text" size="40" name="txtApellido2" class="input-text" value="<?php echo($apellido2) ?>" /></td>
					</tr>
					<tr>
						<td class="va-top">Email:</td>
						<td><input id="email" type="text" size="40" name="txtEmail" class="input-text"  value="<?php echo($email) ?>"/></td>
					</tr>
					<tr>
						<td class="va-top">Edad:</td>
						<td>
							<select id="edad" name="edad" id="edad" class="input-text width100px">
								<script type="text/javascript">
									var selectedValue = <?php echo($edad) ?>;
									for(var i = 15; i<100; i++){
										if ( i != selectedValue){ 
											document.write("<option>"+parseInt(i)+"</option>");
										}else{
											document.write("<option selected>"+parseInt(i)+"</option>");
										}
									}
								</script> 	
							</select>
						</td>
					</tr>
					<tr>
						<td class="va-top">Tel&eacute;fono 1:</td>
						<td><input id="telefono1" type="text" size="40" name="txtTelefono1" class="input-text" value = "<?php echo($telefono1) ?>"/></td>
					</tr>
					<tr>
						<td class="va-top">Tel&eacute;fono 2:</td>
						<td><input id="telefono2" type="text" size="40" name="txtTelefono2" class="input-text" value="<?php echo($telefono2) ?>" /></td>
					</tr>
					<tr>
						<td class="va-top">Direcci&oacute;n:</td>
						<td><textarea id="direccion" cols="75" rows="7" name="txtDireccion" class="input-text"><?php echo($direccion) ?></textarea>
						</td>
					</tr>
					<tr>
						<td>Activo</td>
						<td>
							<label><input id="estado" type="checkbox" /></label> &nbsp;
						</td>
					</tr>
					<input type="hidden" id="id" value="<?php echo($id) ?>"/>
					<tr>
						<td colspan="2" class="t-right"><input id="btn" type="submit" class="input-submit" value="Modificar" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
		<div id="mensaje">
		</div>
		</div> <!-- /content -->

	</div> <!-- /cols -->

	<hr class="noscreen" />

	<!-- Footer -->
	<div id="footer" class="box">

		<p class="f-left">&copy; 2013 <a href="#">U.I.A</a>, All Rights Reserved &reg;</p>

	</div> <!-- /footer -->

</div> <!-- /main -->

</body>
</html>
