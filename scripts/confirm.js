function confirm_message(e){
  //Mensaje de confirmación para estar seguros de que queremos eliminar al usuario seleccionado.
  //Confirm mostrará una ventana con un botón de aceptar y otro de cancelar la acción.
  if (confirm("¿Está seguro que desea eliminar este alumno?")){
    return true;
  }else{
    //Se cancela el evento por defecto, para que no elimine usuarios.
    e.preventDefault();
  }
}
//Se selecciona el elemento que tiene la clase delete.
var deleteLink = document.querySelectorAll('.delete');
//Se inicia el evento de confirmación.
for (var i = 0; i < deleteLink.length; i++) {
  deleteLink[i].addEventListener('click', confirm_message);
}
