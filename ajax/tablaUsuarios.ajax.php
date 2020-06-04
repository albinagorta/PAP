<?php

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

		$IMG = IMG.'usuarios/';

		$item = null;
 		$valor = null;

 		$usuarios = Web::consultas('usuarios','ORDER BY id DESC');

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($usuarios); $i++){

	 		/*=============================================
			TRAER FOTO USUARIO
			=============================================*/

				if($usuarios[$i]["foto"] != "" && $usuarios[$i]["modo"] == "directo"){

				$foto = "<img class='img-circle' src='".$IMG.$usuarios[$i]["foto"]."' width='25px'>";

				}else if($usuarios[$i]["modo"] != "directo" && $usuarios[$i]["foto"] != ""){
					$foto="<img class='img-circle' src='".$usuarios[$i]["foto"]."' width='25px'>";
					
				}else{

					$foto = "<img class='img-circle' src='".$IMG."default/anonymous.png' width='25px'>";
				}

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/

  			if($usuarios[$i]["modo"] == "directo"){

	  			if( $usuarios[$i]["verificacion"] == 1){

	  				$colorEstado = "btn-danger";
	  				$textoEstado = "Desactivado";
	  				$estadoUsuario = 0;

	  			}else{

	  				$colorEstado = "btn-success";
	  				$textoEstado = "Activado";
	  				$estadoUsuario = 1;

	  			}

	  			$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idUsuario='". $usuarios[$i]["id"]."' estadoUsuario='".$estadoUsuario."'>".$textoEstado."</button>";

	  		}else{

	  			$estado = "<button class='btn btn-xs btn-info'>Activado</button>";

	  		}


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$usuarios[$i]["nombre"].'",
				      "'.$usuarios[$i]["email"].'",
				      "'.$usuarios[$i]["modo"].'",
				      "'.$foto.'",
				      "'.$estado.'",
				      "'.$usuarios[$i]["fecha"].'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	





