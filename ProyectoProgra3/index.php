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
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
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
				<p id="btn-create" class="box"><a href="agregarTicket.html"><span>Agregar</span></a></p>

			</div> <!-- /padding -->

			<ul class="box">
				<li><a href="#">Actividades</a></li>
				<li><a href="#">Lorem ipsum</a></li>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">

			<h1>Gestión de Tickets</h1>
			<!-- Table (TABLE) -->
		
			<table>
				<tr>
				    <th>Lorem ipsum</th>
				    <th>Lorem ipsum</th>
				    <th>Lorem ipsum</th>
				    <th>Lorem ipsum</th>
				    <th>Lorem ipsum</th>
				</tr>
				<tr>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				</tr>
				<tr class="bg">
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				</tr>
				<tr>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				</tr>
				<tr class="bg">
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				</tr>
				<tr>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				    <td>Lorem ipsum</td>
				</tr>
			</table>

		
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