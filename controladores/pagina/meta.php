<?php
$p_titulo = $_NOMBRE_APLICACION;
$p_descripcion = '';
$p_keyword = '';

if($url[0]=='index.php'){header('Location: '.URL_DOMINIO);}

require_once(MODELOS.'web.php');

// url amigable de info producto
$rutaproducto=Web::consulta('productos','AND ruta="'.$url[0].'" ');
if($rutaproducto!=null AND $rutaproducto['ruta']!=null){
	$urlinfoproyecto=$url[0];
}else{
	$urlinfoproyecto='nopagina';
}


switch($url[0]){	
	case'':		
		$PAG = 'home.php';
	break;
 
 	

	case 'nuevos-articulos':
	case 'lo-mas-vendido': 
			$PAG = 'productos.php';		
	break;

	case $urlinfoproyecto:
	  $urlinfoproyecto=='nopagina'?$PAG = 'pagina404.php':$PAG = 'infoproducto.php';			
	break;
 	   
	case 'ofertas':
			$PAG = 'ofertas.php';		
	break;

	case 'finalizar-compra':
			$PAG = 'finalizar-compra.php';		
	break;

	case 'error':
			$PAG = 'error.php';		
	break;

	case 'carrito-de-compras':
			$PAG = 'carrito-de-compras.php';		
	break;

	case 'salir':
			$PAG = 'salir.php';		
	break;

	case 'perfil':
			$PAG = 'perfil.php';		
	break;

	case 'verificar':
			$PAG = 'verificar.php';		
	break;

	case 'buscador':
			$PAG = 'buscador.php';		
	break;

	case 'contactos':
			$PAG = 'contactos.php';		
	break;
	
	case 'carrito-de-compras':
			$PAG = 'carrito-de-compras.php';		
	break;
	
	default:
		$PAG = 'error404.php';
	break;
   
}

?>