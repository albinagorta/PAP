<?php

if (preg_match("/config.php/i", $_SERVER['PHP_SELF'])) die();

$_URL = '';//dominio de la forma www.ejemplo.com/

$_URL_LOCAL = 'http://localhost/app_botica/';//url de la web en local http://localhost/ejemplo/

$_URL_NOMBRE_LOCAL = 'app_botica';

$_ADMIN = 'admin/';

$_TIMEZONE = 'America/Lima'; // ejemplo->Peru


$_SERVER_DB = "";//ip del servidor ejemplo.com cpanel

$_DB_DB = "ecommerce";//nombre de la base de datos

$_USER_DB_ADMIN = "root";//usuario de la base de datos 

$_PASS_DB_ADMIN = "";//password de la base de datos


$_NOMBRE_APLICACION = "Sistemas web | AvideaIT";

$_AUTOR = "www.avideait.com - Angel and emerson";


$_MESES = array('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SETIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');

define('MONEDA','S/. ');



require('core_avideait.php');

?>