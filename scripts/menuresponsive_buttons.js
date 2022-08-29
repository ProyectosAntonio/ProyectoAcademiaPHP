
//Efecto de slide (de arriba a abajo y viceversa) al hacer click en el elemento con la clase indicada.
$("#buttonburguermenu").click(function(){
  $(".header-menu-responsive").slideToggle(200).addClass('.mostrar');
});
