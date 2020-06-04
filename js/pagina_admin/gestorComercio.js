/*=============================================
SUBIR LOGOTIPO
=============================================*/

$("#subirLogo").change(function(){

	var imagenLogo = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	== ===========================================*/

  	if(imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png"){

  		$("#subirLogo").val("");

  		swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	/*=============================================
  	VALIDAMOS EL TAMAÑO DE LA IMAGEN
  	=============================================*/

  	}else if(imagenLogo["size"] > 2000000){

  		$("#subirLogo").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	/*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenLogo);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarLogo").attr("src", rutaImagen);

  		})

  	}

  	/*=============================================
  	GUARDAR EL LOGOTIPO
  	=============================================*/
 
  	$("#guardarLogo").click(function(){

  		var datos = new FormData();
  		datos.append("pro", 'comercio');
  		datos.append("op", 'imagenLogo');
  		datos.append("imagenLogo", imagenLogo);

  		$.ajax({

			url:"",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

			if(respuesta==1){
			          swal({

			              type: "success",
			              title: "¡Cambios guardados!",
			              showConfirmButton: true,
			              confirmButtonText: "Cerrar"

			            }).then(function(result){

			              if(result.value){

			              location.reload();

			              }

			            }); 

			        }else{
			          swal("!!! ERROR !!!", respuesta ,"error");
			   }

				
			}

		})


  	})

})

/*=============================================
SUBIR ICONO
=============================================*/

$("#subirIcono").change(function(){

	var imagenIcono = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenIcono["type"] != "image/jpeg" && imagenIcono["type"] != "image/png"){

  		$("#subirIcono").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	/*=============================================
  	VALIDAMOS EL TAMAÑO DE LA IMAGEN
  	=============================================*/

  	}else if(imagenIcono["size"] > 2000000){

  		$("#subirIcono").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

	/*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenIcono);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarIcono").attr("src", rutaImagen);

  		})

  	}

  	/*=============================================
  	GUARDAR EL ICONO
  	=============================================*/

  	$("#guardarIcono").click(function(){

		var datos = new FormData();
		datos.append("pro", 'comercio');
		datos.append("op", 'imagenIcono');
		datos.append("imagenIcono", imagenIcono);

		$.ajax({

			url:"",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				 if(respuesta==1){
			          swal({

			              type: "success",
			              title: "¡Cambios guardados!",
			              showConfirmButton: true,
			              confirmButtonText: "Cerrar"

			            }).then(function(result){

			              if(result.value){

			              location.reload();

			              }

			            }); 

			        }else{
			          swal("!!! ERROR !!!", respuesta ,"error");
			   }
			}

		});

	})

})


/*=============================================
CAMBIAR CÓDIGOS
=============================================*/

$(".cambioScript").change(function(){

	var apiFacebook = $("#apiFacebook").val();

	var pixelFacebook = $("#pixelFacebook").val();

	var googleAnalytics = $("#googleAnalytics").val();


	$("#guardarScript").click(function(){


		var datos = new FormData();
		datos.append("pro", 'comercio');
		datos.append("op", 'codigoscript');
		datos.append("apiFacebook", apiFacebook);
		datos.append("pixelFacebook", pixelFacebook);
		datos.append("googleAnalytics", googleAnalytics);

		$.ajax({

			url:"",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				 if(respuesta==1){
			          swal({
			              type: "success",
			              title: "¡Cambios guardados!",
			              showConfirmButton: true,
			              confirmButtonText: "Cerrar"

			            }).then(function(result){

			              if(result.value){

			              location.reload();

			              }

			            }); 

			        }else{
			          swal("!!! ERROR !!!", respuesta ,"error");
			   }
				
			}

		})

	})

})


/*=============================================
CAMBIAR INFORMACIÓN
=============================================*/
var clienteIdPaypal = $("#clienteIdPaypal").val();
var llaveSecretaPaypal = $("#llaveSecretaPaypal").val();
var merchantIdPayu = $("#merchantIdPayu").val();
var accountIdPayu = $("#accountIdPayu").val();
var apiKeyPayu = $("#apiKeyPayu").val();

/*=============================================
CAMBIAR MODO PAYPAL
=============================================*/
$("input[name='modoPaypal']").on("ifChecked",function(){

	var modoPaypal = $(this).val();
	var modoPayu = $("input[name='modoPayu']:checked").val();

	$("#guardarInformacion").click(function(){

		cambiarInformacion(modoPaypal, modoPayu);

	});

})

/*=============================================
CAMBIAR MODO PAYU
=============================================*/

$("input[name='modoPayu']").on("ifChecked",function(){

	var modoPayu = $(this).val();
	var modoPaypal = $("input[name='modoPaypal']:checked").val();

	$("#guardarInformacion").click(function(){

		cambiarInformacion(modoPaypal, modoPayu);

	});

})

/*=============================================
GUARDAR LA INFORMACION
=============================================*/

$(".cambioInformacion").change(function(){

	modoPaypal = $("input[name='modoPaypal']:checked").val();

	clienteIdPaypal = $("#clienteIdPaypal").val();

	llaveSecretaPaypal = $("#llaveSecretaPaypal").val();

	modoPayu = $("input[name='modoPayu']:checked").val();

	merchantIdPayu = $("#merchantIdPayu").val();

	accountIdPayu = $("#accountIdPayu").val();

	apiKeyPayu = $("#apiKeyPayu").val();

	$("#guardarInformacion").click(function(){

		cambiarInformacion(modoPaypal, modoPayu);
	
	})	

})

/*=============================================
// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN
=============================================*/

function cambiarInformacion(modoPaypal, modoPayu){

	var datos = new FormData();
	datos.append("pro", 'comercio');
  	datos.append("op", 'informacion');
	datos.append("modoPaypal", modoPaypal);	
	datos.append("clienteIdPaypal", clienteIdPaypal);
	datos.append("llaveSecretaPaypal", llaveSecretaPaypal);
	datos.append("modoPayu", modoPayu);	
	datos.append("merchantIdPayu", merchantIdPayu);
	datos.append("accountIdPayu", accountIdPayu);
	datos.append("apiKeyPayu", apiKeyPayu);

	$.ajax({
		url:"",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			
			 if(respuesta==1){
		          swal({

		              type: "success",
		              title: "¡Se guardo exitosamente!",
		              showConfirmButton: true,
		              confirmButtonText: "Cerrar"

		            }).then(function(result){

		              if(result.value){

		              location.reload();

		              }

		            }); 

		        }else{
		          swal("!!! ERROR !!!", respuesta ,"error");
		        }
							
		}

	})

}




