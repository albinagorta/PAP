<?php

 	/*=============================================
  	MOSTRAR LA TABLA DE VISITAS
  	=============================================*/ 
 		$visitas = Web::consultas('visitaspersonas','ORDER BY id DESC');

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($visitas); $i++){

		/*=============================================
		DEVOLVER DATOS JSON
		=============================================*/

		$datosJson	 .= '[
			      "'.($i+1).'",
			      "'.$visitas[$i]["ip"].'",
			      "'.$visitas[$i]["pais"].'",
			      "'.$visitas[$i]["visitas"].'",
			      "'.$visitas[$i]["fecha"].'"    
			    ],';

		}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
		  
		}'; 

		echo $datosJson;

