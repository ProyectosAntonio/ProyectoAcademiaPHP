<?php
  //Se crea el objeto de conexión ("localhost", "usuario", "contraseña", "nombre de base de datos creada en phpmyadmin")
  $mysqli = new mysqli("localhost", "root", "", "academia_el_faro");
  //Se utiliza la estructura condicional if else para saber si se ha realizado la conexión con la BD con éxito.
  if ($mysqli->connect_errno) {
    //Si existe algún tipo de error al conectar con la base de datos aparece el siguiente mensaje
  echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }else {
  
  }
 ?>
