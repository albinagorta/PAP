$(document).ready(function(e) {
$('.load').hide();
mostrar();

/*=============================================
MOSTRAR PERFIL
=============================================*/
function mostrar(){

  var datos = new FormData();
  datos.append("pro", 'empresa');
  datos.append("op", 'mostrar');

  $.ajax({
    url:"",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 

      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarDireccion").val(respuesta["direccion"]);
      $("#editarCelular").val(respuesta["celular"]);
      $("#editarTelefono").val(respuesta["telefono"]);
      $("#editarEmail").val(respuesta["email"]);

    }


  })

}

/*=============================================
 EDITAR
=============================================*/
$('#formeditar').on('submit',function(e){
    e.preventDefault(e);
     var cadena = new FormData($("#formeditar")[0]);
    enviar(cadena);

});

})

