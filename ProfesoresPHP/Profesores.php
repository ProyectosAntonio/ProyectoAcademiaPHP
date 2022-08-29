<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sección Profesores</title>
    <link rel="stylesheet" href="/ProyectoFinal/styles/Alumnos.css">
    <link rel="stylesheet" href="/ProyectoFinal/styles/profesores.css">
  </head>
  <body>
    <?php
    include('../conexion.php');

      //Se abre la sesión del profesor.
      session_start();

      //Si no existe la variable de la sesión del profesor nos regresará al formulario del aula virtual indicado en el header.
      if (!isset($_SESSION['profesores'])){
        header("location: /ProyectoFinal/templates/virtual.html");
      }

      //Se realiza una consulta mysql a la base de datos para volcar la información del usuario con la sesión activa en el documento.
      $profesores = $mysqli->query("SELECT * FROM profesores WHERE Mail = '$_SESSION[profesores]' ");
      $alumnos = $mysqli->query("SELECT * FROM alumnos");
      $all_alumnos = mysqli_num_rows($alumnos);

      //Se crea un bucle para guardar la información de la consulta en un array asociativo que mostrará la información.
      for ($i=0; $i < $profesores->num_rows; $i++) {
        $fila=$profesores->fetch_assoc();

      }
      if (!isset($fila['Name']))
      {
          //Al lugar donde redireccionará si no hay una sesión activa
          header("location: /ProyectoFinal/templates/virtual.html");
      }
     ?>

     <div class="contain-header">

       <div class="virtual-tittle">
         <h3>SECCIÓN PROFESORES</h3>
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
                <li><a href="/ProyectoFinal/ProfesoresPHP/Profesores.php">Inicio</a></li>
                <li><a href="/ProyectoFinal/ProfesoresPHP/EditarPerfilProfesores.php">Editar perfil</a></li>
                <li><a href="/ProyectoFinal/ProfesoresPHP/ListadoAlumnos.php">Mis alumnos</a></li>
                <li><a href="/ProyectoFinal/ProfesoresPHP/cerrar_sesion2.php">Cerrar sesión</a></li>
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
           <a href="Profesores.php"><li><b>Inicio</b></li></a>
           <li class="ini-personal-area"><b>Mi perfil</b></li>
           <ul class="submenu-personal-area">
             <li><b>Nº expediente académico:</b> <?php echo $fila['id']; ?></li>
             <li><b>Profesor:</b> <?php echo $fila['Name']; ?></li>
             <li><b>Email:</b> <?php echo $fila['Mail']; ?></li>
           </ul>
           <li><b>Alumnos inscritos</b></li>
           <ul class="submenu-personal-area">
             <li><b>Total alumnos inscritos:</b> <?php echo $all_alumnos; ?></li>
           </ul>
         </ul>
       </nav>
     </div>

     <div class="main-Courses">
       <div class="main-content-courses">
       <div class="tittle-main-Courses"><h2>Cursos</h2></div>
         <div class="link-content-courses">
           <div class=""><a href="/ProyectoFinal/ProfesoresPHP/ProfesoresA2.php"><img class="image-course" src="/ProyectoFinal/images/BanderaCursosA2.png" alt="Imagen con bandera de España de curso de español A2"></a></div>
           <div class=""><a href="/ProyectoFinal/ProfesoresPHP/ProfesoresB1.php"><img class="image-course" src="/ProyectoFinal/images/BanderaCursosB1.png" alt="Imagen con bandera de España de curso de español B1"></a></div>
           <div class=""><a href="/ProyectoFinal/ProfesoresPHP/ProfesoresB2.php"><img class="image-course" src="/ProyectoFinal/images/BanderaCursosB2.png" alt="Imagen con bandera de España de curso de español B2"></a></div>
         </div>
       </div>
     </div>


     <div class="">

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
