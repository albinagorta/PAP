<?php 
require_once(MODELOS.'web.php');

if(isset($_GET['pro'])){
	if(!isset($_SESSION))session_start();
	switch($_GET['pro']){	
		
		case 'tablausuarios':
			require(AJAX.'tablaUsuarios.ajax.php');
		break;

		case 'tablaventas':
			require(AJAX.'tablaVentas.ajax.php');
		break;

		case 'tablavisitas':
			require(AJAX.'tablaVisitas.ajax.php');
		break;

		case 'tablaproductos':
			require(AJAX.'tablaProductos.ajax.php');
		break;

		case 'excel':
			require(CONTROLADORES.'pagina_admin/excel/reportes.php');
		break;				
			     
	}
	exit();
}
 ?>