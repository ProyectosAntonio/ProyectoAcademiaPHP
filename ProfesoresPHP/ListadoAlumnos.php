<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sección Profesores</title>
    <link rel="stylesheet" href="/ProyectoFinal/styles/Alumnos.css">
    <link rel="stylesheet" href="/ProyectoFinal/styles/profesores.css">
    <link rel="stylesheet" href="/ProyectoFinal/styles/ListadoAlumnos.css">
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
           <li><b>Subir archivos</b></li>
           <li><b>Alumnos inscritos</b></li>
           <ul class="submenu-personal-area">
             <li><b>Total alumnos inscritos:</b> <?php echo $all_alumnos; ?></li>
           </ul>
         </ul>
       </nav>
     </div>

     <div class="alumnos-list">
       <div class="main-alumnos-list">
         <table>
           <tr>
             <th>Nº alumno</th>
             <th>Nombre</th>
             <th>Email</th>
             <th>Curso</th>
             <th>Acciones</th>
           </tr>
         <?php
         /*Se recogen los datos obtenidos en la sentencia sql de muestreo de usuarios empleada anteriormente y se
         recoge en un array, por el cuál nos permitirá mostrar los datos de los alumnos registrados en una tabla.*/

            for ($i=0; $i < $alumnos->num_rows; $i++) {
              $fila_table=$alumnos->fetch_assoc();
              echo "<tr><td>".$fila_table['id']."</td>";
              echo "<td>".$fila_table['Name']."</td>";
              echo "<td>".$fila_table['Mail']."</td>";
              echo "<td>".$fila_table['Curso']."</td>";
              echo "<td> <a href='delete_alumno.php?id=".$fila_table['id']."' class='delete'> Eliminar</a></td></tr>";
            }
          ?>

          <?php
             if(isset($_POST['Registrar'])){
               $name = $_POST['Name'];
               $pass = $_POST['Password'];
               $email = $_POST['Mail'];
               $course = $_POST['Curso'];

               $email_exist = $mysqli->query("SELECT * FROM alumnos WHERE Mail = '$email'");


               /*Mediante condiciona if, elseif y else indicaremos que si los campos están vacíos, nos lo indique
               , si el correo electrónico ya existe, no se podrá registrar dicho usuario porque no existen dos correos iguales.
               Si el correo no existe en la base de datos y todos los campos han sido completados, se guardarán los datos en la base
               de datos y se mostrarán en la tabla.*/
               if($_POST['Name'] == '' || $_POST['Password'] == '' || $_POST['Mail'] == '' || $_POST['Curso'] == '') {
                 $Unfilled = 'Por favor rellene todos los campos.';
               }elseif($email_exist->num_rows >= 1){
                   $same_user = "Usuario ya existe";
                 }else{
                   $registry = $mysqli->query("INSERT INTO `alumnos` (`Name`, `Mail`, `Password`, `Curso`) VALUES ('$name', '$email', '$pass', '$course')");
                   $user_registry = "Alumno registrado exitosamente";
                   ?> <script> if (window.history.replaceState) {
                     window.history.replaceState(null, null, window.location.href);
                   } </script> <?php
                 }

             }else{
               echo "";
             }


           ?>

          </table>
     </div>
     </div>

     <div class="main-registry-form">
       <form class="registry-form" action="/ProyectoFinal/ProfesoresPHP/ListadoAlumnos.php" method="post">
         <h3>Registrar nuevo alumno</h3><br>
         <label for="Name">Nombre</label><br>
         <input type="text" name="Name" value=""><br>
         <label for="Password">Contraseña</label><br>
         <input type="password" name="Password" value=""><br>
         <label for="Mail">Email</label><br>
         <input type="text" name="Mail" value=""><br>
         <label for="Curso">Curso</label><br>
         <select class="" name="Curso">
           <option value="A2">A2</option>
           <option value="B1">B1</option>
           <option value="B2">B2</option>
         </select><br>
         <p>
         <?php
            if (isset($same_user)) {
              echo $same_user;
            }elseif (isset($user_registry)) {
              echo $user_registry;
            }elseif (isset($Unfilled)) {
              echo $Unfilled;
            }else{

            }

          ?>
        </p>
         <input type="submit" name="Registrar" value="Registrar">
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



    <script type="text/javascript" src="/ProyectoFinal/scripts/confirm.js"></script>
  </body>
</html>
