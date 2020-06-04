<?php
require(MODELOS.'web.php');

switch($_POST['pro']){
	case 'login':
		require(MODELOS.'usuario.php');
		$usuario = new Usuario();		
		$usuario->email = $_POST['user'];
		$usuario->pass = $_POST['pass'];
		$usuario->pass = $_POST['pass'];
		$usuario->revision();
		header('Location: '.URL_DOMINIO);
	break;


}


