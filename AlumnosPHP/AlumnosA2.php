<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sección Alumnos</title>
    <link rel="stylesheet" href="/ProyectoFinal/styles/Alumnos.css">
    <link rel="stylesheet" href="/ProyectoFinal/styles/ProfesoresA2.css">
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

      //Al lugar donde redirigirá si el usuario no se encuentra matriculado en el curso actual:
      if ($fila['Curso'] != "A2") {
        header("location: /ProyectoFinal/AlumnosPHP/Alumnos.php");
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


<div class="main-contain-body">

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
        <!-- Para poder acceder a los archivos se crea una variable que permite indicar la ubicación donde
        se encuentran los archivos, mediante opendir podremos abrir la carpeta y readdir que lee la entrada desde nuestro directorio.
        Por lo que mostrará los archivos encontrados en nuestro directorio y al cual accedemos por la ruta con la variable archivo,
        para acceder a todos los archivos del directorio especificado, de tal manera que con el bucle while nos permitirá
        mostrar los archivos del directorio especificado. En el enlace se emplea la variable archivo para acceder a cada nombre del
        archivo y los muestre uno tras otro. Además se especifica dentro del while un condicional if para que no nos muestre los puntos
        mostrados de la ruta de archivo por defecto.-->
        <?php $dir1 = "../archivosA2/ComprensiónAuditiva";
        if($folder1 = opendir($dir1)){
          while ($archivo1 = readdir($folder1)) {
            if($archivo1 != "." && $archivo1 != ".."){
            echo "&nbsp-<a href='/ProyectoFinal/archivosA2/ComprensiónAuditiva/$archivo1'>".$archivo1."</a><br><br>";
           }
          }
        } ?>
        <?php $dir2 = "../archivosA2/ComprensiónLectora";
        if($folder2 = opendir($dir2)){
          while ($archivo2 = readdir($folder2)) {
            if($archivo2 != "." && $archivo2 != ".."){
            echo "&nbsp-<a href='/ProyectoFinal/archivosA2/ComprensiónLectora/$archivo2'>".$archivo2."</a><br><br>";
           }
          }
        } ?>
        <?php $dir3 = "../archivosA2/ProduccionEscrita";
        if($folder3 = opendir($dir3)){
          while ($archivo3 = readdir($folder3)) {
            if($archivo3 != "." && $archivo3 != ".."){
            echo "&nbsp-<a href='/ProyectoFinal/archivosA2/ProduccionEscrita/$archivo3'>".$archivo3."</a><br><br>";
           }
          }
        } ?>
        <?php $dir4 = "../archivosA2/ProduccionOral";
        if($folder4 = opendir($dir4)){
          while ($archivo4 = readdir($folder4)) {
            if($archivo4 != "." && $archivo4 != ".."){
            echo "&nbsp-<a href='/ProyectoFinal/archivosA2/ProduccionEscrita/$archivo4'>".$archivo4."</a><br>";
           }
          }
        } ?>
        <li><b>Mis cursos</b></li>
        <ul class="submenu-personal-area">
          <li><a href="/ProyectoFinal/AlumnosPHP/Alumnos<?php echo $fila['Curso']; ?>.php"> <?php echo $fila['Curso']; ?></a></li>
        </ul>
      </ul>
    </nav>
  </div>

  <div class="main-Courses">
    <div class="main-content-courses">
    <div class="tittle-main-Courses"><h2>Nivel: <?php echo $fila['Curso']; ?></h2></div>
      <div class="A2-content-courses">
        <div class="file-content">
        <h3>COMPRENSIÓN AUDITIVA</h3>
        <?php $dir1 = "../archivosA2/ComprensiónAuditiva";
        if($folder1 = opendir($dir1)){
          while ($archivo1 = readdir($folder1)) {
            if($archivo1 != "." && $archivo1 != ".."){
            echo "<a style='display:block; margin-top: 10px; margin-left: 5px;' href='/ProyectoFinal/archivosA2/ComprensiónAuditiva/$archivo1'>"."-".$archivo1."</a><br>";
           }
          }
        } ?>
        </div>
        <div class="file-content">
        <h3>COMPRENSIÓN LECTORA</h3>
        <?php $dir2 = "../archivosA2/ComprensiónLectora";
        if($folder2 = opendir($dir2)){
          while ($archivo2 = readdir($folder2)) {
            if($archivo2 != "." && $archivo2 != ".."){
            echo "<a style='display:block; margin-top: 10px; margin-left: 5px;' href='/ProyectoFinal/archivosA2/ComprensiónLectora/$archivo2'>"."-".$archivo2."</a><br>";
           }
          }
        } ?>
        </div>
        <div class="file-content">
        <h3>PRODUCCIÓN ESCRITA</h3>
        <?php $dir3 = "../archivosA2/ProduccionEscrita";
        if($folder3 = opendir($dir3)){
          while ($archivo3 = readdir($folder3)) {
            if($archivo3 != "." && $archivo3 != ".."){
            echo "<a style='display:block; margin-top: 10px; margin-left: 5px;' href='/ProyectoFinal/archivosA2/ProduccionEscrita/$archivo3'>"."-".$archivo3."</a><br>";
           }
          }
        } ?>
        </div>
        <div class="file-content">
        <h3>PRODUCCIÓN ORAL</h3>
        <?php $dir4 = "../archivosA2/ProduccionOral";
        if($folder4 = opendir($dir4)){
          while ($archivo4 = readdir($folder4)) {
            if($archivo4 != "." && $archivo4 != ".."){
            echo "<a style='display:block; margin-top: 10px; margin-left: 5px;' href='/ProyectoFinal/archivosA2/ProduccionEscrita/$archivo4'>"."-".$archivo4."</a><br>";
           }
          }
        } ?>
      </div>
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
