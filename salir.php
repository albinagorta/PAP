<?php
include_once("config.php");
session_start();
session_destroy();
header('location: '.URL_DOMINIO);
exit();
?>