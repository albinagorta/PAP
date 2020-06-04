<?php
define('EXT','');
$m_titulo = $_NOMBRE_APLICACION;
$m_descripcion = '';
$m_key = '';

if($url[0]=='index.php'){header('Location: '.URL_DOMINIO_DOMINIO);}
require_once(MODELOS.'web.php');

switch($url[0]){
	case '':
		$PAG = 'home.php';
	break;

	case 'comercio':
		$PAG = 'comercio.php';
	break;
	case 'slide':
		$PAG = 'slide.php';
	break;
	case 'productos':
		$PAG = 'productos.php';
	break;
	case 'banner':
		$PAG = 'banner.php';
	break;
	case 'ventas':
		$PAG = 'ventas.php';
	break;
	case 'visitas':
		$PAG = 'visitas.php';
	break;
	case 'usuarios':
		$PAG = 'usuarios.php';
	break;
	case 'perfiles':
		$PAG = 'perfiles.php';
	break;
	case 'empresa':
		$PAG = 'empresa.php';
	break;
	default:
		$PAG = 'pagina404.php';
	break;
}


?>