<?php
require_once MODELOS.'conexion.php';
 /// PROCESOS SQL CON CONEXION PDO
// version 1.1 
class Slide {
 
	static public function SlideFondo($carpeta,$subirFondo,$fotoantiguo,$id){
			$ruta = null;
			$rutafondo=null;

			/*=============================================
			SI HAY CAMBIO DE FONDO
			=============================================*/	
			if($subirFondo != null){
				/*=============================================
				BORRAMOS EL ANTIGUO FONDO DEL SLIDE
				=============================================*/	
				if($fotoantiguo != "default/fondo.jpg"){	

					unlink("../img/".$carpeta.$fotoantiguo);
				}

				/*=============================================
				CREAMOS EL DIRECTORIO SI NO EXISTE
				=============================================*/	

				$directorio = "../img/".$carpeta."slide".$id;

				if(!file_exists($directorio)){

					mkdir($directorio, 0755);

				}

				/*=============================================
				CAPTURAMOS EL ANCHO Y ALTO DEL FONDO DEL SLIDE
				=============================================*/
				list($ancho, $alto) = getimagesize($subirFondo["tmp_name"]);	
				$nuevoAncho = 1600;
				$nuevoAlto = 520;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($subirFondo["type"] == "image/jpeg"){

					$ruta = $directorio."/fondo.jpg";
					$rutafondo="slide".$id."/fondo.jpg";	
					$origen = imagecreatefromjpeg($subirFondo["tmp_name"]);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
			
				}

				if($subirFondo["type"] == "image/png"){

					$ruta = $directorio."/fondo.png";
					$rutafondo="slide".$id."/fondo.png";
					$origen = imagecreatefrompng($subirFondo["tmp_name"]);

					imagealphablending($destino, FALSE);
	    			
	    			imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
			
				}

			}else{

				$rutafondo = $fotoantiguo;
			}

		return $rutafondo;	
	}

	static public function SlideProducto($carpeta,$Foto,$fotoantiguo,$id){
		
			$ruta = null;
			$rutaProducto = null;
			/*=============================================
			SI HAY CAMBIO DE PRODUCTO
			=============================================*/		
			
			if($Foto != null){
				/*=============================================
				CREAMOS EL DIRECTORIO SI NO EXISTE
				=============================================*/
				$directorio = "../img/".$carpeta."slide".$id;

				if(!file_exists($directorio)){

					mkdir($directorio, 0755);

				}

				/*=============================================
				CAPTURAMOS EL ANCHO Y ALTO DE LA IMAGEN DEL PRODUCTO
				=============================================*/		

				list($ancho, $alto) = getimagesize($Foto["tmp_name"]);

				$nuevoAncho = 600;
				$nuevoAlto = 600;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($Foto["type"] == "image/jpeg"){

					$ruta = $directorio."/producto.jpg";
					$rutaProducto = "slide".$id."/producto.jpg";
					$origen = imagecreatefromjpeg($Foto["tmp_name"]);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
			
				}

				if($Foto["type"] == "image/png"){

					$ruta = $directorio."/producto.png";
					$rutaProducto = "slide".$id."/producto.png";
					$origen = imagecreatefrompng($Foto["tmp_name"]);

					imagealphablending($destino, FALSE);
	    			
	    			imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
			
				}

			}else{

				$rutaProducto = $fotoantiguo;
			}

		return $rutaProducto;	
	}

		
}
 ?>
