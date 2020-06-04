function enviar(cadena,url=''){
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
      //dataType: "json",

      success: function(datos)
      {
        if(datos==1){
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
          swal("!!! ERROR !!!", datos ,"error");
        }

      }

  });

}