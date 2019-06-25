/*$(document).ready() permite ejecutar funciones una vez cargada en su totalidad una página web (DOM).*/
$(document).ready(function(){
  buscador_datos();
});


function buscador_datos(consulta) {
  //ajax() realiza una peticion AJAX asincrona.
  //url: dirección a la que se envía la petición.
  //type: tipo de la petición, GET o POST (GET por defecto).
  //dataType: tipo de datos que esperas obtener del servidor (si no se especifica, jQuery intenta averiguar de qué tipo se trata).
  //data: datos a enviar al servidor.
  $.ajax({
      url: 'app/buscar.php',
      type: 'POST',
      dataType: 'html',
      data: {
        consulta: consulta
      }
    })
    .done(function(respuesta) { //Si la petición Ajax se ha realizado correctamente, entra en este método.
      //console.log("success");
      $("#datos").html(respuesta); //acceder al id datos, y agregamos nuestro html con la respuesta.
      /*.tablesorter() agrega la funcion de ordenamiento en los encabezados de la tabla.*/
      $("#myTable").tablesorter();
    })
    .fail(function() { //Se ejecuta si ha ocurrido algún problema en la petición.
      console.log("Error (>_<)/");
    });
} //end buscador_datos()


//$(document).on() asigna controladores de eventos a los elementos.
$(document).on('keyup', '#caja_busqueda', function() {
  var valor = $(this).val(); //obtiene valor del input.
  if (valor != "") {
    buscador_datos(valor);
  } else {
    buscador_datos();
  }
}); //end $(document).on()
