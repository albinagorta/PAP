/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

$.ajax({
	url:"?pro=tablaproductos",
	success:function(respuesta){
		
		console.log("respuesta", respuesta);

	}

})

$('.tablaProductos').DataTable({

	"ajax":"?pro=tablaproductos",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
    "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

});

/*=============================================
ACTIVAR PRODUCTO
=============================================*/
$('.tablaProductos tbody').on("click", ".btnActivar", function(){

	var idProducto = $(this).attr("idProducto");
	var estadoProducto = $(this).attr("estadoProducto");

	var datos = new FormData();
 	datos.append("pro", 'producto');
  	datos.append("op", 'estado');
  	datos.append("id", idProducto);
  	datos.append("estado", estadoProducto);
  	$.ajax({
	  url:"",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){    
          
         console.log("respuesta", respuesta);

      }

  	})

	if(estadoProducto == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoProducto',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoProducto',0);

  	}

})



/*=============================================
REVISAR SI EL TITULO DEL PRODUCTO YA EXISTE
=============================================*/

$(".validarProducto").change(function(){

	$(".alert").remove();

	var producto = $(this).val();

	var datos = new FormData();
	datos.append("pro", 'producto');
	datos.append("op", 'titulo');
	datos.append("validarProducto", producto);

	 $.ajax({
	    url:"",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
    		if(respuesta != false){

    			$(".validarProducto").parent().after('<div class="alert alert-warning">Este título de producto ya existe en la base de datos</div>');

	    		$(".validarProducto").val("");

    		}

	    }

   	})

})

/*=============================================
RUTA PRODUCTO
=============================================*/

function limpiarUrl(texto){
  var texto = texto.toLowerCase(); 
  texto = texto.replace(/[á]/, 'a');
  texto = texto.replace(/[é]/, 'e');
  texto = texto.replace(/[í]/, 'i');
  texto = texto.replace(/[ó]/, 'o');
  texto = texto.replace(/[ú]/, 'u');
  texto = texto.replace(/[ñ]/, 'n');
  texto = texto.replace(/ /g, "-")
  return texto;
}

$(".tituloProducto").change(function(){

	$(".rutaProducto").val(limpiarUrl($(".tituloProducto").val()));

})


/*=============================================
AGREGAR MULTIMEDIA
=============================================*/

var tipo = null;

$(".seleccionarTipo").change(function(){

	tipo = $(this).val();
})

/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/

var arrayFiles = [];

$(".multimediaFisica").dropzone({

	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 2,
	maxFiles: 15,
	init: function(){

		this.on("addedfile", function(file){

			arrayFiles.push(file);

			//console.log("arrayFiles", arrayFiles);

		})

		this.on("removedfile", function(file){

			var index = arrayFiles.indexOf(file);

			arrayFiles.splice(index, 1);

			//console.log("arrayFiles", arrayFiles);

		})

	}

})

/*=============================================
SUBIENDO LA FOTO DE PORTADA
=============================================*/

var imagenPortada = null;

$(".fotoPortada").change(function(){

	imagenPortada = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenPortada["type"] != "image/jpeg" && imagenPortada["type"] != "image/png"){

  		$(".fotoPortada").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagenPortada["size"] > 2000000){

  		$(".fotoPortada").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenPortada);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarPortada").attr("src", rutaImagen);

  		})

  	}

})

/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/

var imagenFotoPrincipal = null;

$(".fotoPrincipal").change(function(){

	imagenFotoPrincipal = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenFotoPrincipal["type"] != "image/jpeg" && imagenFotoPrincipal["type"] != "image/png"){

  		$(".fotoPrincipal").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagenFotoPrincipal["size"] > 2000000){

  		$(".fotoPrincipal").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenFotoPrincipal);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarPrincipal").attr("src", rutaImagen);

  		})

  	}

})

/*=============================================
ACTIVAR OFERTA
=============================================*/

function activarOferta(event){

	if(event == "oferta"){

		$(".datosOferta").show();
		$(".valorOferta").prop("required",true);
		$(".valorOferta").val("");


	}else{

		$(".datosOferta").hide();
		$(".valorOferta").prop("required",false);
		$(".valorOferta").val("");

	}
}


$(".selActivarOferta").change(function(){

	activarOferta($(this).val())

})


/*=============================================
VALOR OFERTA
=============================================*/

$("#modalCrearProducto .valorOferta").change(function(){

	if($(".precio").val()!= 0){

		if($(this).attr("tipo") == "oferta"){

			var descuento = 100 - (Number($(this).val())*100/Number($(".precio").val()));

			$(".precioOferta").prop("readonly",true);
			$(".descuentoOferta").prop("readonly",false);
			$(".descuentoOferta").val(Math.ceil(descuento));	

		}

		if($(this).attr("tipo") == "descuento"){

			var oferta = Number($(".precio").val())-(Number($(this).val())*Number($(".precio").val())/100);
			
			$(".descuentoOferta").prop("readonly",true);
			$(".precioOferta").prop("readonly",false);
			$(".precioOferta").val(oferta);

		}

	}else{

	 swal({
	      title: "Error al agregar la oferta",
	      text: "¡Primero agregue un precio al producto!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	 $(".precioOferta").val(0);
	 $(".descuentoOferta").val(0);

	 return;

	}

})

/*=============================================
SUBIENDO LA FOTO DE LA OFERTA
=============================================*/

var imagenOferta = null;

$(".fotoOferta").change(function(){

	imagenOferta = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenOferta["type"] != "image/jpeg" && imagenOferta["type"] != "image/png"){

  		$(".fotoOferta").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagenOferta["size"] > 2000000){

  		$(".fotoOferta").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenOferta);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarOferta").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
CAMBIAR EL PRECIO
=============================================*/

$(".precio").change(function(){

	$(".precioOferta").val(0);
	$(".descuentoOferta").val(0);

})

/*=============================================
GUARDAR EL PRODUCTO
=============================================*/

var multimediaFisica = null;	

$(".guardarProducto").click(function(){

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if($(".tituloProducto").val() != "" && 
	   $(".seleccionarTipo").val() != "" && 
	   $(".descripcionProducto").val() != "" &&
	   $(".pClavesProducto").val() != "" &&
	   $(".detalleCaracteriticas").val() != ""){

		/*=============================================
	   	PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA O LINK DE YOUTUBE
	   	=============================================*/
	   		if(arrayFiles.length > 0 && $(".rutaProducto").val() != ""){

	   			var listaMultimedia = [];
	   			var finalFor = 0;

	   			for(var i = 0; i < arrayFiles.length; i++){

	   				var datosMultimedia = new FormData();
	   				datosMultimedia.append("pro", 'producto');
	   				datosMultimedia.append("op", 'multimedia');
	   				datosMultimedia.append("file", arrayFiles[i]);
					datosMultimedia.append("ruta", $(".rutaProducto").val());

					$.ajax({
						url:"",
						method: "POST",
						data: datosMultimedia,
						cache: false,
						contentType: false,
						processData: false,
						success: function(respuesta){
							//console.log(respuesta)
							listaMultimedia.push({"foto" : respuesta.substr(2)})
							//listaMultimedia.push({"foto" : respuesta})
							multimediaFisica = JSON.stringify(listaMultimedia);

							if(multimediaFisica == null){

							 	swal({
							      title: "El campo de multimedia no debe estar vacío",
							      type: "error",
							      confirmButtonText: "¡Cerrar!"
							    });

							 	return;

							}

							if((finalFor + 1) == arrayFiles.length){

								agregarMiProducto(multimediaFisica);
								finalFor = 0;

							}

							finalFor++;

						}

					})

	   			}

	   		}

	   	

	}else{

		 swal({
	      title: "Llenar todos los campos obligatorios",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;
	}

})

function agregarMiProducto(imagen){

		/*=============================================
		ALMACENAMOS TODOS LOS CAMPOS DE PRODUCTO
		=============================================*/
		var tituloProducto = $(".tituloProducto").val();
		var rutaProducto = $(".rutaProducto").val();
		var seleccionarTipo = $(".seleccionarTipo").val();
	    var descripcionProducto = $(".descripcionProducto").val();
	    var pClavesProducto = $(".pClavesProducto").val();
	    var url_instalacion = $(".url_instalacion").val();
	    var url_descargar = $(".url_descargar").val();
	    var precio = $(".precio").val();
	    var selActivarOferta = $(".selActivarOferta").val();
	    var precioOferta = $(".precioOferta").val();
	    var descuentoOferta = $(".descuentoOferta").val();
	    var finOferta = $(".finOferta").val();
		
		var detalles = {"caracteristicas": $(".detalleCaracteriticas").tagsinput('items')};
		var detallesString = JSON.stringify(detalles);

	 	var datosProducto = new FormData();
		datosProducto.append("pro", 'producto');
		datosProducto.append("op", 'add');
		datosProducto.append("tituloProducto", tituloProducto);
		datosProducto.append("rutaProducto", rutaProducto);
		datosProducto.append("seleccionarTipo", seleccionarTipo);	
		datosProducto.append("detalles", detallesString);	
		datosProducto.append("descripcionProducto", descripcionProducto);
		datosProducto.append("pClavesProducto", pClavesProducto);
		datosProducto.append("precio", precio);
		datosProducto.append("url_instalacion", url_instalacion);
		datosProducto.append("url_descarga", url_descargar);
		datosProducto.append("multimedia", imagen);		
		datosProducto.append("fotoPortada", imagenPortada);
		datosProducto.append("fotoPrincipal", imagenFotoPrincipal);
		datosProducto.append("selActivarOferta", selActivarOferta);
		datosProducto.append("precioOferta", precioOferta);
		datosProducto.append("descuentoOferta", descuentoOferta);
		datosProducto.append("finOferta", finOferta);
		datosProducto.append("fotoOferta", imagenOferta);

		$.ajax({
				url:"",
				method: "POST",
				data: datosProducto,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
				//console.log("respuesta", respuesta);

					if(respuesta==1){
						swal({
						  type: "success",
						  title: "ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							location.reload();

							}
						})
					}else{
						alert(respuesta);
					}

				}

		})

}

/*=============================================
EDITAR PRODUCTO
=============================================*/

$('.tablaProductos tbody').on("click", ".btnEditarProducto", function(){
	
	$(".previsualizarImgFisico").html("");

	var idProducto = $(this).attr("idProducto");
	
	var datos = new FormData();
	datos.append("pro",'producto');
	datos.append("op",'mostrar');
	datos.append("id",idProducto);
	$.ajax({
		url:"",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#modalEditarProducto .idProducto").val(respuesta["id"]);
			$("#modalEditarProducto .tituloProducto").val(respuesta["titulo"]);
			$("#modalEditarProducto .rutaProducto").val(respuesta["ruta"]);

			/*=============================================
			TRAER EL TIPO DE PRODUCTO
			=============================================*/

			$("#modalEditarProducto .seleccionarTipo").val(respuesta["tipo"]);

			$("#modalEditarProducto .edit_url_instalar").val(respuesta["url_instalacion"]);
			$("#modalEditarProducto .edit_url_descargar").val(respuesta["url_descarga"]);


			/*=============================================
			CUANDO EL PRODUCTO ES FÍSICO
			=============================================*/

				if(respuesta["multimedia"] != ""){

					var imagenesMultimedia = JSON.parse(respuesta["multimedia"].replace(/&quot;/g,'"'));
					
					for(var i = 0; i < imagenesMultimedia.length; i++){

						$(".previsualizarImgFisico").append(

							  '<div class="col-md-3">'+
							    '<div class="thumbnail text-center">'+
							      '<img class="imagenesRestantes" src="'+IMG+'multimedia/'+imagenesMultimedia[i].foto+'" style="width:100%">'+
							      '<div class="removerImagen" style="cursor:pointer">Remove file</div>'+
							    '</div>'+

							  '</div>'

		                );
		                localStorage.setItem("multimediaFisica", JSON.stringify(imagenesMultimedia));

					}		

					/*=============================================
					CUANDO ELIMINAMOS UNA IMAGEN DE LA LISTA
					=============================================*/

				 	$(".removerImagen").click(function(){

						$(this).parent().parent().remove();

						var imagenesRestantes = $(".imagenesRestantes");
						var arrayImgRestantes = [];

						for(var i = 0; i < imagenesRestantes.length; i++){

							arrayImgRestantes.push({"foto":$(imagenesRestantes[i]).attr("src")})
							
						}

						localStorage.setItem("multimediaFisica", JSON.stringify(arrayImgRestantes));
						
					})

				}

				var detalles = JSON.parse(respuesta["detalles"].replace(/&quot;/g,'"'));

				$(".editarCaracteristica").html(

					'<input class="form-control input-lg tagsInput detalleCaracteristicas" value="'+detalles.caracteristicas+'" data-role="tagsinput" type="text" style="padding:20px">'

				)
				$("#modalEditarProducto .detalleCaracteristicas").tagsinput('items');

				$(".bootstrap-tagsinput").css({"padding":"12px",
											   "width":"110%"})
			
			

			

			/*=============================================
			TRAEMOS DATOS DE CABECERA
			=============================================*/

			var datosCabecera = new FormData();
			datosCabecera.append("pro",'producto');
			datosCabecera.append("op",'cabecera');
			datosCabecera.append("ruta",respuesta["ruta"]);
			console.log('respuestaruta:',respuesta["ruta"]);
			$.ajax({
					url:"",
					method: "POST",
					data: datosCabecera,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(respuesta){
						/*=============================================
						CARGAMOS EL ID DE LA CABECERA
						=============================================*/
						$("#modalEditarProducto .idCabecera").val(respuesta["id"]);

						/*=============================================
						CARGAMOS LA DESCRIPCION
						=============================================*/

						$("#modalEditarProducto .descripcionProducto").val(respuesta["descripcion"]);

						/*=============================================
						CARGAMOS LAS PALABRAS CLAVES
						=============================================*/	
						
						if(respuesta["palabrasClaves"] != null){

							$("#modalEditarProducto .editarPalabrasClaves").html('<div class="input-group">'+
	              
	                		'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control input-lg tagsInput pClavesProducto" value="'+respuesta["palabrasClaves"]+'" data-role="tagsinput">'+
							

							'</div>');

							$("#modalEditarProducto .pClavesProducto").tagsinput('items');

						}else{

							$("#modalEditarProducto .editarPalabrasClaves").html('<div class="input-group">'+
	              
	                		'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control input-lg tagsInput pClavesProducto" value="" data-role="tagsinput">'+

							'</div>');

							$("#modalEditarProducto .pClavesProducto").tagsinput('items');

						}

						/*=============================================
						CARGAMOS LA IMAGEN DE PORTADA
						=============================================*/

						$("#modalEditarProducto .previsualizarPortada").attr("src", IMG+'cabeceras/'+respuesta["portada"]);
						$("#modalEditarProducto .antiguaFotoPortada").val(respuesta["portada"]);
					
					}
					
			});

			/*=============================================
			CARGAMOS LA IMAGEN PRINCIPAL
			=============================================*/

			$("#modalEditarProducto .previsualizarPrincipal").attr("src", IMG+'productos/'+respuesta["portada"]);
			$("#modalEditarProducto .antiguaFotoPrincipal").val(respuesta["portada"]);

			/*=============================================
			CARGAMOS EL PRECIO
			=============================================*/
			$("#modalEditarProducto .precio").val(respuesta["precio"]);

			/*=============================================
			PREGUNTAMOS SI EXITE OFERTA
			=============================================*/

			if(respuesta["oferta"] != 0){

				$("#modalEditarProducto .selActivarOferta").val("oferta");

				$("#modalEditarProducto .datosOferta").show();
				$("#modalEditarProducto .valorOferta").prop("required",true);

				$("#modalEditarProducto .precioOferta").val(respuesta["precioOferta"]);
				$("#modalEditarProducto .descuentoOferta").val(respuesta["descuentoOferta"]);

				if(respuesta["precioOferta"] != 0){

					$("#modalEditarProducto .precioOferta").prop("readonly",true);
					$("#modalEditarProducto .descuentoOferta").prop("readonly",false);

				}

				if(respuesta["descuentoOferta"] != 0){

					$("#modalEditarProducto .descuentoOferta").prop("readonly",true);
					$("#modalEditarProducto .precioOferta").prop("readonly",false);

				}
	
				$("#modalEditarProducto .previsualizarOferta").attr("src", IMG+'ofertas/'+respuesta["imgOferta"]);

				$("#modalEditarProducto .antiguaFotoOferta").val(respuesta["imgOferta"]);
				
				$("#modalEditarProducto .finOferta").val(respuesta["finOferta"]);						

			}else{

				$("#modalEditarProducto .selActivarOferta").val("");
				$("#modalEditarProducto .datosOferta").hide();
				$("#modalEditarProducto .valorOferta").prop("required",false);
				$("#modalEditarProducto .previsualizarOferta").attr("src", "../img/ofertas/default/default.jpg");
				$("#modalEditarProducto .antiguaFotoOferta").val(respuesta["imgOferta"]);

			}

			/*=============================================
			CREAR NUEVA OFERTA AL EDITAR
			=============================================*/

			$("#modalEditarProducto .selActivarOferta").change(function(){

				activarOferta($(this).val())

			})

			$("#modalEditarProducto .valorOferta").change(function(){

				if($(this).attr("tipo") == "oferta"){

					var descuento = 100-(Number($(this).val())*100/Number($("#modalEditarProducto .precio").val()));

					$("#modalEditarProducto .precioOferta").prop("readonly",true);
					$("#modalEditarProducto .descuentoOferta").prop("readonly",false);
					$("#modalEditarProducto .descuentoOferta").val(Math.ceil(descuento));

				}

				if($(this).attr("tipo") == "descuento"){

					var oferta = Number($("#modalEditarProducto .precio").val())-(Number($(this).val())*Number($("#modalEditarProducto .precio").val())/100);	

					$("#modalEditarProducto .descuentoOferta").prop("readonly",true);
					$("#modalEditarProducto .precioOferta").prop("readonly",false);
					$("#modalEditarProducto .precioOferta").val(oferta);

				}

			})

			/*=============================================
			GUARDAR CAMBIOS DEL PRODUCTO
			=============================================*/	

			var multimediaFisica = null;
			var multimediaVirtual = null;	

			$(".guardarCambiosProducto").click(function(){

					/*=============================================
					PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
					=============================================*/

					if($("#modalEditarProducto .tituloProducto").val() != "" && 
					   $("#modalEditarProducto .seleccionarTipo").val() != "" &&
					   $("#modalEditarProducto .descripcionProducto").val() != "" &&
					   $("#modalEditarProducto .pClavesProducto").val() != ""){

						/*=============================================
					   	PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA O LINK DE YOUTUBE
					   	=============================================*/
						if(arrayFiles.length > 0 && $("#modalEditarProducto .rutaProducto").val() != ""){

						   		var listaMultimedia = [];
						   		var finalFor = 0;

								for(var i = 0; i < arrayFiles.length; i++){
									
									var datosMultimedia = new FormData();
									datosMultimedia.append("pro", 'producto');
	   								datosMultimedia.append("op", 'multimedia');
									datosMultimedia.append("file", arrayFiles[i]);
									datosMultimedia.append("ruta", $("#modalEditarProducto .rutaProducto").val());

									$.ajax({
										url:"",
										method: "POST",
										data: datosMultimedia,
										cache: false,
										contentType: false,
										processData: false,
										success: function(respuesta){

											listaMultimedia.push({"foto":respuesta.substr(2)});
											//listaMultimedia.push({"foto":respuesta});
											multimediaFisica = JSON.stringify(listaMultimedia);
											
											if(localStorage.getItem("multimediaFisica") != null){

												var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaFisica"));

												var jsonMultimediaFisica = listaMultimedia.concat(jsonLocalStorage);

												multimediaFisica = JSON.stringify(jsonMultimediaFisica);												
											}
																

											if(multimediaFisica == null){
												 swal({
												      title: "El campo de multimedia no debe estar vacío",
												      type: "error",
												      confirmButtonText: "¡Cerrar!"
												    });

												 return;
											}


											if((finalFor + 1) == arrayFiles.length){

												editarMiProducto(multimediaFisica);
												finalFor = 0;

											}

											finalFor++;							
								
										}

									})

								}

							}else{
					
								var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaFisica"));

								multimediaFisica = JSON.stringify(jsonLocalStorage);

								editarMiProducto(multimediaFisica);												
								
							}

						

					}else{

						 swal({
					      title: "Llenar todos los campos obligatorios",
					      type: "error",
					      confirmButtonText: "¡Cerrar!"
					    });

						return;

					}					

			})
					
		}

	})

})

function editarMiProducto(imagen){

	var idProducto = $("#modalEditarProducto .idProducto").val();
	var tituloProducto = $("#modalEditarProducto .tituloProducto").val();
	var rutaProducto = $("#modalEditarProducto .rutaProducto").val();
	var seleccionarTipo = $("#modalEditarProducto .seleccionarTipo").val();
	var url_instalacion = $("#modalEditarProducto .edit_url_instalar").val();
	var url_descargar = $("#modalEditarProducto .edit_url_descargar").val();
	var descripcionProducto = $("#modalEditarProducto .descripcionProducto").val();
	var pClavesProducto = $("#modalEditarProducto .pClavesProducto").val();
	var precio = $("#modalEditarProducto .precio").val();
	var selActivarOferta = $("#modalEditarProducto .selActivarOferta").val();
	var precioOferta = $("#modalEditarProducto .precioOferta").val();
	var descuentoOferta = $("#modalEditarProducto .descuentoOferta").val();
	var finOferta = $("#modalEditarProducto .finOferta").val();

 	var detalles = {"caracteristicas": $("#modalEditarProducto .detalleCaracteristicas").tagsinput('items')};

	var detallesString = JSON.stringify(detalles);

	var antiguaFotoPortada = $("#modalEditarProducto .antiguaFotoPortada").val();
	var antiguaFotoPrincipal = $("#modalEditarProducto .antiguaFotoPrincipal").val();
	var antiguaFotoOferta = $("#modalEditarProducto .antiguaFotoOferta").val();
	var idCabecera = $("#modalEditarProducto .idCabecera").val();


	var datosProducto = new FormData();
	datosProducto.append("pro",'producto');
	datosProducto.append("op",'edit');
	datosProducto.append("idProducto", idProducto);
	datosProducto.append("editarProducto", tituloProducto);
	datosProducto.append("rutaProducto", rutaProducto);
	datosProducto.append("seleccionarTipo", seleccionarTipo);	
	datosProducto.append("detalles", detallesString);
	datosProducto.append("descripcionProducto", descripcionProducto);
	datosProducto.append("pClavesProducto", pClavesProducto);
	datosProducto.append("precio", precio);	
	datosProducto.append("url_instalacion", url_instalacion);
	datosProducto.append("url_descarga", url_descargar);

	if(imagen == null){

		multimediaFisica = localStorage.getItem("multimediaFisica");
		datosProducto.append("multimedia", multimediaFisica);

	}else{

		datosProducto.append("multimedia", imagen);
	}	

	datosProducto.append("fotoPortada", imagenPortada);
	datosProducto.append("fotoPrincipal", imagenFotoPrincipal);
	datosProducto.append("selActivarOferta", selActivarOferta);
	datosProducto.append("precioOferta", precioOferta);
	datosProducto.append("descuentoOferta", descuentoOferta);
	datosProducto.append("finOferta", finOferta);
	datosProducto.append("fotoOferta", imagenOferta);
	datosProducto.append("antiguaFotoPortada", antiguaFotoPortada);
	datosProducto.append("antiguaFotoPrincipal", antiguaFotoPrincipal);
	datosProducto.append("antiguaFotoOferta", antiguaFotoOferta);
	datosProducto.append("idCabecera", idCabecera);

	$.ajax({
			url:"",
			method: "POST",
			data: datosProducto,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
									
				
				if(respuesta == 1){

					swal({
					  type: "success",
					  title: "El producto ha sido cambiado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						localStorage.removeItem("multimediaFisica");
						localStorage.clear();
						window.location = "productos";

						}
					})
				}else{
					alert(respuesta);
				}

			}

	})
	
}

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

$('.tablaProductos tbody').on("click", ".btnEliminarProducto", function(){
  var idProducto = $(this).attr("idProducto");
  var imgOferta = $(this).attr("imgOferta");
  var rutaCabecera = $(this).attr("rutaCabecera");
  var imgPortada = $(this).attr("imgPortada");
  var imgPrincipal = $(this).attr("imgPrincipal");

  swal({
    title: '¿Está seguro de borrar?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){
    	var datosProducto = new FormData();
			datosProducto.append("pro", 'producto');
			datosProducto.append("op", 'eliminar');
			datosProducto.append("idProducto", idProducto);
			datosProducto.append("imgOferta", imgOferta);
			datosProducto.append("rutaCabecera", rutaCabecera);
			datosProducto.append("imgPortada", imgPortada);
			datosProducto.append("imgPrincipal", imgPrincipal);
    	$.ajax({
			url:"",
			method: "POST",
			data: datosProducto,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){						
				
				if(respuesta == 1){
					swal({
					  type: "success",
					  title: "El producto ha sido eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {
						location.reload();
						}
					})
				}else{
					alert(respuesta);
				}

			}

	})

      
    }

  })




})


