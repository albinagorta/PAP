<?php
  	$ventas = Web::consultas('ventas','ORDER BY id DESC');
  	$datosJson = '{
	 "data": [ ';

	for($i = 0; $i < count($ventas); $i++){

		/*=============================================
		TRAER PRODUCTO
		=============================================*/

		$id_producto = $ventas[$i]["id_producto"];

		$traerProducto = Web::consulta('productos','AND id='.$id_producto);

		$producto = $traerProducto["titulo"];

		$imgProducto = "<img class='img-thumbnail' src='".IMG.'productos/'.$traerProducto["portada"]."' width='50px'>";

		$tipo = $traerProducto["tipo"];


		/*=============================================
		TRAER CLIENTE
		=============================================*/

		$id_usuario = $ventas[$i]["id_usuario"];

		$traerCliente = Web::consulta('usuarios','AND id='.$id_usuario);

		$cliente = $traerCliente["nombre"];

		/*=============================================
		TRAER FOTO CLIENTE
		=============================================*/


		if($traerCliente["foto"] != "" && $traerCliente["modo"] == "directo"){

		$imgCliente = "<img class='img-circle' src='".IMG.'usuarios/'.$traerCliente["foto"]."' width='25px'>";

		}else if($traerCliente["modo"] != "directo" && $traerCliente["foto"] != ""){
			$imgCliente="<img class='img-circle' src='".IMG.'usuarios/'.$traerCliente["foto"]."' width='25px'>";
			
		}else{

			$imgCliente = "<img class='img-circle' src='".IMG."usuarios/default/anonymous.png' width='25px'>";
		}




		/*=============================================
		TRAER EMAIL CLIENTE
		=============================================*/

		if($ventas[$i]["email"] == ""){

			$email = $traerCliente["email"];

		}else{

			$email = $ventas[$i]["email"];
		}

		/*=============================================
		TRAER PROCESO DE ENVÍO
		=============================================*/

			$envio = "<button class='btn btn-info btn-xs'>Producto entregado</button>";
		
		

		/*=============================================
		LOGOS PAYPAL Y PAYU
		=============================================*/

		if($ventas[$i]["metodo"] == "paypal"){

			$metodo = "<img class='img-responsive' src='".IMG."paypal.jpg' width='50px'>";
		
		}else if($ventas[$i]["metodo"] == "payu"){

			$metodo = "<img class='img-responsive' src='".IMG."payu.jpg' width='50px'>";
		
		}else{

			$metodo = "GRATIS";

		}


		/*=============================================
		DEVOLVER DATOS JSON
		=============================================*/
		$datosJson	 .= '[
			      		"'.($i+1).'",
			      		"'.$producto.'",
			      		"'.$imgProducto.'",
			      		"'.$cliente.'",
			      		"'.$imgCliente.'",
			      		"$ '.number_format($ventas[$i]["pago"],2).'",
			      		"'.$tipo.'",
			      		"'.$envio.'",
			      		"'.$metodo.'",	
			      		"'.$email.'",
			      		"'.$ventas[$i]["direccion"].'",
			      		"'.$ventas[$i]["pais"].'",
			      		"'.$ventas[$i]["fecha"].'"	
			      		],';

	} 

	$datosJson = substr($datosJson, 0, -1);

	$datosJson.=  ']
		  
	}'; 
  	
  	echo $datosJson;	


