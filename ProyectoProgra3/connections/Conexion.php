<?php 
	# PHP ADODB document - made with PHAkt
	# FileName="Connection_php_adodb.htm"
	# Type="ADODB"
	# HTTP="true"
	# DBTYPE="odbc"
		
			
	//Produccion
	$MM_hdConect_HOSTNAME = "localhost:3306";
	$MM_hdConect_DATABASE = "MySQL:bdTickets";	
			
	$MM_hdConect_DBTYPE   = preg_replace("/:.*$/", "", $MM_hdConect_DATABASE);
	$MM_hdConect_DATABASE = preg_replace("/^.*?:/", "", $MM_hdConect_DATABASE);
	
	//Produccion
	$MM_hdConect_USERNAME = "root";
	$MM_hdConect_PASSWORD = "";
		
	$MM_hdConect_LOCALE = "Us";
	$MM_hdConect_MSGLOCALE = "En";
	$MM_hdConect_CTYPE = "C";
	$KT_locale = $MM_hdConect_MSGLOCALE;
	$KT_dlocale = $MM_hdConect_LOCALE;
	$KT_serverFormat = "%Y-%m-%d %H:%M:%S";
	$QUB_Caching = "false";
	
	switch (strtoupper ($MM_hdConect_LOCALE)) {
		case 'EN':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'EUS':
				$KT_localFormat = "%m-%d-%Y %H:%M:%S";
		break;
		case 'FR':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'RO':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'IT':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'GE':
				$KT_localFormat = "%d.%m.%Y %H:%M:%S";
		break;
		case 'US':
				$KT_localFormat = "%Y-%m-%d %H:%M:%S";
		break;
		default :
				$KT_localFormat = "none";			
	}


	
	if (!defined('CONN_DIR')) define('CONN_DIR',dirname(__FILE__));
	require_once(CONN_DIR."/../adodb5/adodb.inc.php");
	ADOLoadCode($MM_hdConect_DBTYPE);
	
	/*
	Inicializacion de la conexion
	*/
	$facturaAdodb=&ADONewConnection($MM_hdConect_DBTYPE);

	if($MM_hdConect_DBTYPE == "access" || $MM_hdConect_DBTYPE == "odbc"){
		if($MM_hdConect_CTYPE == "P"){
			$facturaAdodb->PConnect($MM_hdConect_DATABASE, $MM_hdConect_USERNAME,$MM_hdConect_PASSWORD, 
			$MM_hdConect_LOCALE);
		} else $facturaAdodb->Connect($MM_hdConect_DATABASE, $MM_hdConect_USERNAME,$MM_hdConect_PASSWORD, 
			$MM_hdConect_LOCALE);
	} else if (($MM_hdConect_DBTYPE == "ibase") or ($MM_hdConect_DBTYPE == "firebird")) {
		if($MM_hdConect_CTYPE == "P"){
			$facturaAdodb->PConnect($MM_hdConect_HOSTNAME.":".$MM_hdConect_DATABASE,$MM_hdConect_USERNAME,$MM_hdConect_PASSWORD);
		} else $facturaAdodb->Connect($MM_hdConect_HOSTNAME.":".$MM_hdConect_DATABASE,$MM_hdConect_USERNAME,$MM_hdConect_PASSWORD);
	}else {
		if($MM_hdConect_CTYPE == "P"){
			$facturaAdodb->PConnect($MM_hdConect_HOSTNAME,$MM_hdConect_USERNAME,$MM_hdConect_PASSWORD,
   			$MM_hdConect_DATABASE,$MM_hdConect_LOCALE);
		} else $facturaAdodb->Connect($MM_hdConect_HOSTNAME,$MM_hdConect_USERNAME,$MM_hdConect_PASSWORD,
   			$MM_hdConect_DATABASE,$MM_hdConect_LOCALE);
   }

	if (!function_exists("updateMagicQuotes")) {
		function updateMagicQuotes($HTTP_VARS){
			if (is_array($HTTP_VARS)) {
				foreach ($HTTP_VARS as $name=>$value) {
					if (!is_array($value)) {
						$HTTP_VARS[$name] = addslashes($value);
					} else {
						foreach ($value as $name1=>$value1) {
							if (!is_array($value1)) {
								$HTTP_VARS[$name1][$value1] = addslashes($value1);
							}
						}
						
					}
					global $$name;
					$$name = &$HTTP_VARS[$name];
				}
			}
			return $HTTP_VARS;
		}
		
		if (!get_magic_quotes_gpc()) {
			$HTTP_GET_VARS = updateMagicQuotes($HTTP_GET_VARS);
			$_POST = updateMagicQuotes($_POST);
			$HTTP_COOKIE_VARS = updateMagicQuotes($HTTP_COOKIE_VARS);
		}
	}
	if (!isset($HTTP_SERVER_VARS['REQUEST_URI'])) {
		$HTTP_SERVER_VARS['REQUEST_URI'] = $HTTP_SERVER_VARS['PHP_SELF'];
	}
?>
