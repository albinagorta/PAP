/*=============================================
ACTUALIZAR NOTIFICACIONES
=============================================*/

$(".actualizarNotificaciones").click(function(e){

  e.preventDefault();

  var item = $(this).attr("item");

   $.post('',{pro:'notificaciones',op:'editar',item:item},function(respuesta){ 
          if(respuesta == 1){

              if(item == 'nuevosUsuarios'){ 

                window.location=URL_DOMINIO_ADMIN+'usuarios';
              }

              if(item == 'nuevasVentas'){

                window.location = URL_DOMINIO_ADMIN+'ventas';
              }

              if(item == 'nuevasVisitas'){

                window.location = URL_DOMINIO_ADMIN+'visitas';
              }

            }
    });
})
