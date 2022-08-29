<?php
//Se incluye el objeto de conexión.
include('conexion.php');

//Recibimos las variables del formulario Post.
$Mail = $_POST["Mail"];
$Password = $_POST["Password"];

//Se realizan unas consultas en la base de datos para verificar los usuarios que tienen permitido acceder.
$alumnos = $mysqli->query("SELECT * FROM alumnos WHERE Mail = '$Mail' AND Password = '$Password'");
$profesores = $mysqli->query("SELECT * FROM profesores WHERE Mail = '$Mail' AND Password = '$Password'");


/*Ahora se comprueban las variables que tienen los usuarios y profesores y para cada tipo de usuario, se accederá a un tipo
distinto de documento*/
//Con este if se verifica que el que intenta acceder es un alumno.
if(mysqli_num_rows($alumnos) > 0){

  session_start();
  $_SESSION['alumnos'] = "$Mail";


  //Con header nos redirigirá al documento deseado, en este caso la sección de alumnos del aula virtual.
  header("Location: /ProyectoFinal/AlumnosPHP/Alumnos.php");
  exit();

//Y para verificar que el que ingresa es el profesor.
}elseif (mysqli_num_rows($profesores) > 0) {

  session_start();
  $_SESSION['profesores']="$Mail";

  //Nos redirige a la sección de profesores.
  header("Location: /ProyectoFinal/ProfesoresPHP/Profesores.php");
  exit();

//Si no se encuentra ni al usuario registrado como profesor ni como alumno, que aparezca el siguiente mensaje.
}else {
  header("Location: /ProyectoFinal/templates/fr/UsuarioNoEncontrado.html");
}


?>
