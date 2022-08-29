//Al cargar el documento
$(document).ready(function(){
/*Realizar las funciones de click en botones. Al hacer click en un botón mostrar una imagen u otra.
Y cambiar colores de botones al realizar click en dicho botón.*/
  $("#button1").click(function(){
    $("#button1").css("background-color", "#D31A1B");
    $("#button2").css("background-color", "white");
    $("#slide2").hide();
    $("#slide1").show();
  });
  $("#button2").click(function(){
    $("#button1").css("background-color", "white");
    $("#button2").css("background-color", "#D31A1B");
    $("#slide1").hide();
    $("#slide2").show();
  });

  });
