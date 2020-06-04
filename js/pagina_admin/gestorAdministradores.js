$(document).ready(function(e) {
$('.load').hide();
/*=============================================
ACTIVAR PERFIL
=============================================*/
$(".tablaPerfiles").on("click", ".btnActivar", function(){

  var id = $(this).attr("idPerfil");
  var estado = $(this).attr("estadoPerfil");

  $.post('',{pro:'administradores',op:'estado',id:id,estado:estado},function(respuesta){ 
    //location.reload();
   })
  if(estado == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoPerfil',1);

      }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoPerfil',0);

      }
})


/*=============================================
SUBIENDO LA FOTO DEL PERFIL
=============================================*/
var imagen = null;

$(".nuevaFoto").change(function(){

  imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 2000000){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

     }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizar").attr("src", rutaImagen);

      })

    }
})






/*=============================================
MOSTRAR PERFIL
=============================================*/
$(".tablaPerfiles").on("click", ".btnEditarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");
  
  var datos = new FormData();
  datos.append("id", idPerfil);
  datos.append("pro", 'administradores');
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
      $("#idPerfil").val(respuesta["id"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#passwordActual").val(respuesta["password"]);

      if(respuesta["foto"] != ""){

        $(".previsualizar").attr("src", IMG+'perfiles/'+respuesta["foto"]);

      }

    }


  })

})



/*=============================================
 REGISTRAR
=============================================*/
$('#formagregar').on('submit',function(e){
    e.preventDefault(e);
 var cadena = new FormData($("#formagregar")[0]);
    enviar(cadena);

});

/*=============================================
 EDITAR
=============================================*/
$('#formeditar').on('submit',function(e){
    e.preventDefault(e);
     var cadena = new FormData($("#formeditar")[0]);
    enviar(cadena);

});


/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablaPerfiles").on("click", ".btnEliminarPerfil", function(){

  var id = $(this).attr("idPerfil");
  var foto = $(this).attr("fotoPerfil");

  swal({
    title: '¿Está seguro de borrar el perfil?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar perfil!'
  }).then(function(result){

    if(result.value){

    $.post('',{pro:'administradores',op:'eliminar',id:id,foto:foto},function(respuesta){ 
      location.reload();
    })

    }

  })
})


})


















function enviarss(cadena,url=''){
  $('input[type="submit"]').attr('disabled',true);
  $('.load').show();
  //var envio = $.post('',cadena,function(){},'json');
 $.ajax({
      url: "",
      type: "POST",
      data: cadena,
      contentType: false,
      processData: false,
      cache: false,
      dataType: "json",

      success: function(datos)
      {
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


      }

  });

}
function enviarss(cadena,url=''){
  $('input[type="submit"]').attr('disabled',true);
  $('.load').show();
  //var envio = $.post('',cadena,function(){},'json');
  var envio = $.post('',cadena,function(){});
  envio.done(function(data){
    console.log(data);
   if(data==1){
      alert('Se guardo exitosamente');
      location.reload();

    }else{
      alert('No logro guardar');
    }
  });
  envio.always(function(){
    $('input[type="submit"]').removeAttr('disabled');
    $('.load').hide();
  });
}
