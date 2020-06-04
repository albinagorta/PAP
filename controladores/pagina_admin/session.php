<?php
$INICIADO = 0;

if(isset($_SESSION['USER_ID']) && is_numeric($_SESSION['USER_ID'])){
	$INICIADO = 1;
}


if($INICIADO == 0){
	if($url[0]!=''){
		header('Location: '.URL_DOMINIO_ADMIN);exit();
	}
	include(PAGINA.'session.php');
	exit();
}//else solo corre la aplicacion
?>