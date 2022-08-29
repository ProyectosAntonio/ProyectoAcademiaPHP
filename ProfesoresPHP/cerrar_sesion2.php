<?php
include('../conexion.php');

session_start();

//Se comprueba que es el usuario que ha ingresado quien se encuentra activo en la sesión para finalizarla.
if (!isset($_SESSION['profesores']))
{
    //Al lugar donde redireccionará si no hay una sesión activa.
    header("location: /ProyectoFinal/templates/virtual.html");
}

//Para liberar la sesión.
session_unset();

//Para destruir la sesión.
session_destroy();

//Lugar que redireccionará cuando se finalice la sesión.
header("location: /ProyectoFinal/templates/virtual.html");  ?>
