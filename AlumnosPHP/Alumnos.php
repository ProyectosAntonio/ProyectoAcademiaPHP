<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sección Alumnos</title>
    <link rel="stylesheet" href="/ProyectoFinal/styles/Alumnos.css">
  </head>
  <body>

    <?php
    include('../conexion.php');

      //Se abre la sesión del alumno.
      session_start();

      //Si no existe la variable de la sesión del alumno nos regresará al formulario del aula virtual indicado en el header.
      if (!isset($_SESSION['alumnos'])){
        header("location: /ProyectoFinal/templates/virtual.html");
      }

      //Se realiza una consulta mysql a la base de datos para volcar la información del usuario con la sesión activa en el documento.
      $alumnos = $mysqli->query("SELECT * FROM alumnos WHERE Mail = '$_SESSION[alumnos]' ");

      //Se crea un bucle para guardar la información de la consulta en un array asociativo que mostrará la información.
      for ($i=0; $i < $alumnos->num_rows; $i++) {
        $fila=$alumnos->fetch_assoc();

      }
      if (!isset($fila['Name']))
      {
          //Al lugar donde redireccionará si no hay una sesión activa
          header("location: /ProyectoFinal/templates/virtual.html");
      }

     ?>


  <div class="contain-header">

    <div class="virtual-tittle">
      <h3>SECCIÓN ALUMNOS </h3>
    </div>

    <a href="/ProyectoFinal/index.html" class="logo">
      <img src="/ProyectoFinal/images/logo.png" alt="logo de la empresa">
      <h2 class="company-name">Spanish Academy <br> El Faro</h2>
    </a>

     <header>
     <nav class="menu">
       <ul>
         <li><span class="cursor-name"><?php echo $fila['Name']; ?></span><span class="down-arrow">  ▼</span><i></i>
           <ul class="submenu">
             <li><a href="/ProyectoFinal/AlumnosPHP/Alumnos.php">Inicio</a></li>
             <li><a href="/ProyectoFinal/AlumnosPHP/EditarPerfilAlumnos.php">Editar perfil</a></li>
             <li><a href="Alumnos<?php echo $fila['Curso'];?>.php">Archivos</a></li>
             <li><a href="/ProyectoFinal/AlumnosPHP/cerrar_Sesion.php">Cerrar sesión</a></li>
           </ul>
         </li>
       </ul>
     </nav>
   </header>
  </div>


<div class="main-contain-body-index">

  <div class="personal-area">
    <nav class="menu-personal-area">
      <ul>
        <div class="main-title-nav"><li class="tittle-nav">Area personal</li></div>
        <a href="/ProyectoFinal/AlumnosPHP/Alumnos.php"><li><b>Inicio</b></li></a>
        <li><b>Mi perfil</b></li>
        <ul class="submenu-personal-area">
          <li><b>Nº expediente alumno:</b> <?php echo $fila['id']; ?></li>
          <li><b>Alumno:</b> <?php echo $fila['Name']; ?></li>
          <li><b>Email:</b> <?php echo $fila['Mail']; ?></li>
          <li><b>Cursos:</b> <?php echo $fila['Curso']; ?></li>
        </ul>
        <li><b>Documentos y archivos</b></li>
        <?php include("ShowCoursesAlumnosPersonalArea.php");?>
        <li><b>Mis cursos</b></li>
        <ul class="submenu-personal-area">
          <li> <a href="/ProyectoFinal/AlumnosPHP/Alumnos<?php echo $fila['Curso']; ?>.php"> <?php echo $fila['Curso']; ?></a></li>
        </ul>
      </ul>
    </nav>
  </div>

  <div class="main-Courses">
    <div class="main-content-courses">
    <div class="tittle-main-Courses"><h2>Cursos</h2></div>
      <div class="link-content-courses">
        <!-- Si el alumno no está inscrito en algún curso, no podrá acceder a él mediante condicionales
      if que permiten indicar que si no pertenece a dicho curso, regrese a la página de inicio de Alumnos.php -->
        <div class="">  <a href=<?php if ($fila['Curso'] == "A2") {
          echo "/ProyectoFinal/AlumnosPHP/AlumnosA2.php";
        }else{
          echo "/ProyectoFinal/AlumnosPHP/Alumnos.php";
        } ?>><img class="image-course" src="/ProyectoFinal/images/BanderaCursosA2.png" alt="Imagen con bandera de España de curso de español A2"></a></div>
        <div class=""><a href=<?php if ($fila['Curso'] == "B1") {
          echo "/ProyectoFinal/AlumnosPHP/AlumnosB1.php";
        }else{
          echo "/ProyectoFinal/AlumnosPHP/Alumnos.php";
        } ?>><img class="image-course" src="/ProyectoFinal/images/BanderaCursosB1.png" alt="Imagen con bandera de España de curso de español B1"></a></div>
        <div class=""><a href=<?php if ($fila['Curso'] == "B2") {
          echo "/ProyectoFinal/AlumnosPHP/AlumnosB2.php";
        }else{
          echo "/ProyectoFinal/AlumnosPHP/Alumnos.php";
        } ?>><img class="image-course" src="/ProyectoFinal/images/BanderaCursosB2.png" alt="Imagen con bandera de España de curso de español B2"></a></div>
      </div>
    </div>
  </div>

</div>

<div class="background-final-contain">

  <div class="final-contain">
    <div class="final-contain-contact">
      <p> C.Álamos, 42 - Málaga. 29012 <br> elfaroacedemy@gmail.com </p>
    </div>
    <div class="final-contain-DELE">
      <img src="/ProyectoFinal/images/DELE.png" alt="logo DELE">
      <img class="cervantes-logo" src="/ProyectoFinal/images/Cervantes.png" alt="logo Instituto Cervantes">
    </div>
    <div class="final-contain-socialmedia">
      <p>¡Síguenos en nuestras redes sociales!</p>
      <a href="https://twitter.com/"> <img src="/ProyectoFinal/images/twitter.png" alt="logo de twitter"> </a>
      <a href="https://facebook.com/"> <img src="/ProyectoFinal/images/facebook.png" alt="logo de facebook"> </a>
      <a href="https://instagram.com/"> <img src="/ProyectoFinal/images/instagram.png" alt="logo de instagram"> </a>
    </div>

  </div>

  </div>



  </body>
</html>
