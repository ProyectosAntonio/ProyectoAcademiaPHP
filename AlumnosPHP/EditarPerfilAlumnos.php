<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sección Alumnos</title>
    <link rel="stylesheet" href="/ProyectoFinal/styles/Alumnos.css">
    <link rel="stylesheet" href="/ProyectoFinal/styles/EditarPerfilAlumnos.css">
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
             <li><a href="Alumnos.php">Inicio</a></li>
             <li><a href="EditarPerfilAlumnos.php">Editar perfil</a></li>
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
        <a href="Alumnos.php"><li><b>Inicio</b></li></a>
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
          <li><a href="/ProyectoFinal/AlumnosPHP/Alumnos<?php echo $fila['Curso']; ?>.php"> <?php echo $fila['Curso']; ?></a></li>
        </ul>
      </ul>
    </nav>
  </div>

  <?php
  /*Si existe el post del formulario recogido del html nos mostrará los datos especificados, si los datos
  a modificar ya existen, nos mostrará un mensaje. Si los datos introducidos son diferentes a los de la base de datos
  nos realizará los cambios de datos correctamente, utilizando la sentencia SQL UPDATE*/
    if (isset($_POST['edit'])) {
      $email_update = $_POST['user_email'];
      $password_update = $_POST['user_password'];

      $sql_db = $mysqli->query("SELECT * FROM alumnos WHERE Mail ='$email_update' AND Password = '$password_update' ");
      $exist = $sql_db->num_rows;

      if($exist > 0){
        $update_exist = "<p>Ya existen los datos introducidos</p>";
      }else{

      $db_edit = "UPDATE alumnos SET Mail='$email_update', Password='$password_update' WHERE id=".$fila['id'];
    if (mysqli_query($mysqli, $db_edit)) {
    $update = "<p>Datos actualizados</p>";
  }


  }
  }
  if (!isset($fila['Name']))
  {
      //Al lugar donde redireccionará si no hay una sesión activa
      header("location: /ProyectoFinal/templates/virtual.html");
  }

  ?>



  <div class="edit-profile-contain">

    <form class="edit-profile-form" action="EditarPerfilAlumnos.php" method="post">
      <div class="title-edit-profile">Editar perfil</div>
      <div class="label-edit-profile"><label for="user_email">Cambiar email</label></div><br>
      <input type="text" name="user_email" value="<?php echo $fila['Mail']; ?>"><br><br>
      <div class="label-edit-profile"><label for="user_password">Cambiar contraseña</label></div><br>
      <input type="password" name="user_password" value="<?php echo $fila['Password']; ?>"><br><br>
      <input class="submit-edit-profile" type="submit" name="edit" value="Guardar cambios"><br><br>
      <?php
        if (isset($update)) {
          echo $update;
        };
        if (isset($update_exist)) {
          echo $update_exist;
        };
       ?>
    </form>

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
