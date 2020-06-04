<!DOCTYPE html>
<html lang="es">
<head>
 
	<meta charset="UTF-8" >

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<?php


		$servidor = URL_DOMINIO;

		$plantilla = Web::consulta('plantilla');

		echo '<link rel="icon" href="'.IMG.$plantilla["icono"].'">';

		/*=============================================
		MANTENER LA RUTA FIJA DEL PROYECTO
		=============================================*/
		
		$url = URL_DOMINIO;
	?>

	<!--=====================================
	Marcado HTML5
	======================================-->

	<meta name="title" content="<?php echo $p_titulo; ?>">

	<meta name="description" content="<?php echo $p_descripcion; ?>">

	<meta name="keyword" content="<?php echo $p_keyword; ?>">

	<title><?php echo $p_titulo; ?></title>



	<!--=====================================
	PLUGINS DE CSS
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>css/plugins/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/plugins/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/plugins/flexslider.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/plugins/sweetalert.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/plugins/dscountdown.css">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo $url; ?>css/AdminLTE.min.css">

	<!--=====================================
	HOJAS DE ESTILO PERSONALIZADAS
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>css/plantilla.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/cabezote.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/slide.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/productos.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/infoproducto.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/perfil.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/carrito-de-compras.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/ofertas.css">

	<link rel="stylesheet" href="<?php echo $url; ?>css/footer.css">

	<!--=====================================
	PLUGINS DE JAVASCRIPT
	======================================-->

	<script src="<?php echo $url; ?>js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>js/plugins/bootstrap.min.js"></script>

	<script src="<?php echo $url; ?>js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>js/plugins/jquery.scrollUp.js"></script>

	<script src="<?php echo $url; ?>js/plugins/jquery.flexslider.js"></script>

	<script src="<?php echo $url; ?>js/plugins/sweetalert.min.js"></script>

	<script src="<?php echo $url; ?>js/plugins/md5-min.js"></script>

	<script src="<?php echo $url; ?>js/plugins/dscountdown.min.js"></script>

	<script src="<?php echo $url; ?>js/plugins/knob.jquery.js"></script>

	<script src="<?php echo $url; ?>js/adminlte.min.js"></script>

	<script src="https://apis.google.com/js/platform.js" async defer></script>

	<!--=====================================
	Pixel de Facebook
	======================================-->

	<?php echo $plantilla["pixelFacebook"]; ?>

</head>

<body>








