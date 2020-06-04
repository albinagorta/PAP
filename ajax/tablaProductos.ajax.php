<?php
  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/ 

  	$productos = Web::consultas('productos','ORDER BY id DESC');

    if(count($productos) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }

  	$datosJson = '

  		{	
  			"data":[';

	 	for($i = 0; $i < count($productos); $i++){

			/*=============================================
  			AGREGAR ETIQUETAS DE ESTADO
  			=============================================*/

  			if($productos[$i]["estado"] == 0){

  				$colorEstado = "btn-danger";
  				$textoEstado = "Desactivado";
  				$estadoProducto = 1;

  			}else{

  				$colorEstado = "btn-success";
  				$textoEstado = "Activado";
  				$estadoProducto = 0;

  			}

  			$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idProducto='".$productos[$i]["id"]."' estadoProducto='".$estadoProducto."'>".$textoEstado."</button>";

  			/*=============================================
  			TRAER LAS CABECERAS
  			=============================================*/

  			
			$rutaproducto = $productos[$i]["ruta"];

			$cabeceras = Web::consulta('cabeceras','AND ruta="'.$rutaproducto.'"');

			if($cabeceras["portada"] != ""){

  				$imagenPortada = "<img src='".IMG.'cabeceras/'.$cabeceras["portada"]."' class='img-thumbnail imgPortadaProductos' width='100px'>";

  			}else{

  				$imagenPortada = "<img src='".IMG."cabeceras/default/default.jpg' class='img-thumbnail imgPortadaProductos' width='100px'>";
  			}

			/*=============================================
  			TRAER IMAGEN PRINCIPAL
  			=============================================*/

  			$imagenPrincipal = "<img src='".IMG.'productos/'.$productos[$i]["portada"]."' class='img-thumbnail imgTablaPrincipal' width='100px'>";

  			/*=============================================
			TRAER MULTIMEDIA
  			=============================================*/

  			if($productos[$i]["multimedia"] != null){

  				$multimedia = json_mostrar($productos[$i]["multimedia"]);
          $vistaMultimedia = "<img src='".IMG.'multimedia/'.$multimedia[0]["foto"]."' class='img-thumbnail imgTablaMultimedia' width='100px'>";
  			}else{

  				$vistaMultimedia = "<img src='".IMG."multimedia/default/default.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";

  			}

  			/*=============================================
  			TRAER PRECIO
  			=============================================*/

  			if($productos[$i]["precio"] == 0){

  				$precio = "Gratis";
  			
  			}else{

  				$precio = "$ ".number_format($productos[$i]["precio"],2);

  			}

  		

  			/*=============================================
  			REVISAR SI HAY OFERTAS
  			=============================================*/
  			
			if($productos[$i]["oferta"] != 0){

				if($productos[$i]["precioOferta"] != 0){	

					$tipoOferta = "PRECIO";
					$valorOferta = "$ ".number_format($productos[$i]["precioOferta"],2);

				}else{

					$tipoOferta = "DESCUENTO";
					$valorOferta = $productos[$i]["descuentoOferta"]." %";	

				}	

			}else{

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;
				
			}

  			/*=============================================
  			TRAER IMAGEN OFERTA
  			=============================================*/

  			if($productos[$i]["imgOferta"] != ""){

	  			$imgOferta = "<img src='".IMG.'ofertas/'.$productos[$i]["imgOferta"]."' class='img-thumbnail imgTablaProductos' width='100px'>";

	  		}else{

	  			$imgOferta = "<img src='".IMG."ofertas/default/default.jpg' class='img-thumbnail imgTablaProductos' width='100px'>";

	  		}

	  		/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

  			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' imgOferta='".$productos[$i]["imgOferta"]."' rutaCabecera='".$productos[$i]["ruta"]."' imgPortada='".$cabeceras["portada"]."' imgPrincipal='".$productos[$i]["portada"]."'><i class='fa fa-times'></i></button></div>";

  			/*=============================================
  			CONSTRUIR LOS DATOS JSON
  			=============================================*/


			$datosJson .='[
					
					"'.($i+1).'",
					"'.$productos[$i]["titulo"].'",
					"'.$productos[$i]["ruta"].'",
					"'.$estado.'",
					"'.$productos[$i]["tipo"].'",
					"'.$cabeceras["descripcion"].'",
				  	"'.$cabeceras["palabrasClaves"].'",
				  	"'.$imagenPortada.'",
				  	"'.$imagenPrincipal.'",
			 	  	"'.$vistaMultimedia.'",
		  			"'.$precio.'",
				  	"'.$tipoOferta.'",
				  	"'.$valorOferta.'",
				  	"'.$imgOferta.'",
				  	"'.$productos[$i]["finOferta"].'",			
				  	"'.$acciones.'"	   

			],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;