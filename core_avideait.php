<?php 
####################################

#Autor: Angel and emerson#

#Empresa: banahost www.AvideaIT.com#

####################################

date_default_timezone_set($_TIMEZONE);

//validando si la ruta es correcta
if (preg_match('/core_avideait.php/i', $_SERVER['PHP_SELF'])) die();

// Prevenir algunos ataques XSS via $_GET.

foreach ($_GET as $check_url){

	if ((preg_match("/<[^>]*script*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*object*\"?[^>]*>/i", $check_url)) ||

		(preg_match("/<[^>]*iframe*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*applet*\"?[^>]*>/i", $check_url)) ||

		(preg_match("/<[^>]*meta*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*style*\"?[^>]*>/i", $check_url)) ||

		(preg_match("/<[^>]*form*\"?[^>]*>/i", $check_url)) || (preg_match("/\([^>]*\"?[^)]*\)/i", $check_url)) ||

		(preg_match("/\"/i", $check_url))) {

	die ();

	}

}

unset($check_url);

//fin de revision de seguridad



//tipo pagina o admin, opcion para renderizar el html

if(!isset($_TIPO)){

	$_TIPO = '';

}



##################################################################################

if($_SERVER['SERVER_NAME'] == 'localhost'){

	define('URL_DOMINIO_ADMIN' , $_URL_LOCAL.$_ADMIN);

	define('SERVER_DB' , 'localhost');

	define('USER_DB' , $_USER_DB_ADMIN);

	define('PASSWORD_DB' ,$_PASS_DB_ADMIN);

	define('DB_DB' , $_DB_DB);

	define('URL_DOMINIO',$_URL_LOCAL);
	

}else{

	define('URL_DOMINIO_ADMIN' , 'https://'.$_URL.$_ADMIN);

	define('USER_DB' , $_USER_DB_ADMIN);

	define('PASSWORD_DB' , $_PASS_DB_ADMIN);
	
	define('SERVER_DB' , $_SERVER_DB);

	define('DB_DB' , $_DB_DB);

	define('URL_DOMINIO','https://'.$_URL);

	error_reporting(0);

}



unset($_SERVER_DB);

unset($_DB_DB);

unset($_USER_DB);

unset($_PASS_DB);

unset($_USER_DB_ADMIN);

unset($_PASS_DB_ADMIN);

##################################################################################

//fin de revision de la url de la pagina


define('DS', DIRECTORY_SEPARATOR);

define('ROOT', realpath(dirname(__FILE__)).DS);



//carpetas bases

define('MODELOS',ROOT.'modelos'.DS);//modelos

define('VISTAS',ROOT.'vistas'.DS);//vistas

define('CONTROLADORES',ROOT.'controladores'.DS);//controlador

define('AJAX',ROOT.'ajax'.DS);//AJAX

define('EXTENSIONES',ROOT.'extensiones'.DS);//EXTENSIONES


//acceso rapido a subcarpetas bases
// esto  $ejemplo==1?true:false  =  if($ejemplo==1){true}else{false} 

$_TIPO == 'admin' ? define('PAGINA',VISTAS.'pagina_admin'.DS) : define('PAGINA', VISTAS.'pagina'.DS);//contenido htmls

define('INCLUDES',PAGINA.'includes'.DS);

$_TIPO == 'admin' ? define('CONTROL', CONTROLADORES.'pagina_admin'.DS) : define('CONTROL', CONTROLADORES.'pagina'.DS);//contenido htmls

//url relativas

define('CSS', URL_DOMINIO.'css/');//estilos ruta css

define('JS', URL_DOMINIO.'js/');//javascripts ruta js

define('IMG', URL_DOMINIO.'img/');//imagenes ruta img

define('URL_NOMBRE_LOCAL',$_URL_NOMBRE_LOCAL);

include(CONTROLADORES.'index.php');

?>