const button_send = document.getElementById('send');
button_send.addEventListener('click', function(e) {
  //Prevenir que se actualice la página para que no se actualice de nuevo una vez enviado el formulario.
  //Por lo que el evento puede ser llamado de nuevo.
  e.preventDefault()
  //Se definen las constantes que recogeran el valor del formulario
  const name = document.getElementById('Nombre').value;
  const email = document.getElementById('mail').value;
  const phone = document.getElementById('Phone').value;
  const subject = document.getElementById('Subject').value;
  const message = document.getElementById('Message').value;
  /*Para enviar el formulario al correo electrónico definido en el siguiente código, al cuál se le pasan los parámetros con
  las constantes obtenidas anteriormente*/
  window.location.href=`mailto:elfaroacedemy@gmail.com?subject=EnviodesdeFormulario&body=Nombre%3A%20${name}%0Amail%3A%20${email}%0APhone%3A%20${phone}%0ASubject%3A%20${subject}%0AMessage%3A%20${message}`;
});
