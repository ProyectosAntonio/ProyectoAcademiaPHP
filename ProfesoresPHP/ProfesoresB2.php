<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sección Profesores</title>
    <link rel="stylesheet" href="/ProyectoFinal/styles/Alumnos.css">
    <link rel="stylesheet" href="/ProyectoFinal/styles/profesores.css">
    <link rel="stylesheet" href="/ProyectoFinal/styles/ProfesoresA2.css">
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
           <li class="ini-personal-area"><b><a href="/ProyectoFinal/ProfesoresPHP/Profesores.php">Inicio</a></b></li>
           <li><b>Mi perfil</b></li>
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
       <div class="tittle-main-Courses"><h2>Nivel: B2</h2></div>
         <div class="A2-content-courses">
           <div class="file-content">
           <h3>COMPRENSIÓN AUDITIVA</h3>
           <?php $dir1 = "C:/xampp/htdocs/ProyectoFinal/archivosB2/ComprensiónAuditiva";
           if($folder1 = opendir($dir1)){
             while ($archivo1 = readdir($folder1)) {
               if($archivo1 != "." && $archivo1 != ".."){
               echo "&nbsp-<a href='/ProyectoFinal/archivosB2/ComprensiónAuditiva/$archivo1'>".$archivo1."</a> ..........&nbsp&nbsp<a href='deleteFileB2.php?item=../archivosB2/ComprensiónAuditiva/$archivo1'><img  src='/ProyectoFinal/images/papelera.png' class='paper-icon' alt='Icono de papelera'></a><br>";
              }
             }
           } ?>
         </div>
         <div class="file-content">
           <h3>COMPRENSIÓN LECTORA</h3>
           <?php $dir2 = "C:/xampp/htdocs/ProyectoFinal/archivosB2/ComprensiónLectora";
           if($folder2 = opendir($dir2)){
             while ($archivo2 = readdir($folder2)) {
               if($archivo2 != "." && $archivo2 != ".."){
               echo "&nbsp-<a href='/ProyectoFinal/archivosB2/ComprensiónLectora/$archivo2'>".$archivo2."</a> ..........&nbsp&nbsp<a href='deleteFileB2.php?item=../archivosB2/ComprensiónLectora/$archivo2'><img  src='/ProyectoFinal/images/papelera.png' class='paper-icon' alt='Icono de papelera'></a><br>";
              }
             }
           } ?>
          </div>
          <div class="file-content">
           <h3>PRODUCCIÓN ESCRITA</h3>
           <?php $dir3 = "C:/xampp/htdocs/ProyectoFinal/archivosB2/ProduccionEscrita";
           if($folder3 = opendir($dir3)){
             while ($archivo3 = readdir($folder3)) {
               if($archivo3 != "." && $archivo3 != ".."){
               echo "&nbsp-<a href='/ProyectoFinal/archivosB2/ProduccionEscrita/$archivo3'>".$archivo3."</a> ..........&nbsp&nbsp<a href='deleteFileB2.php?item=../archivosB2/ProduccionEscrita/$archivo3'><img  src='/ProyectoFinal/images/papelera.png' class='paper-icon' alt='Icono de papelera'></a><br>";
              }
             }
           } ?>
          </div>
          <div class="file-content">
           <h3>PRODUCCIÓN ORAL</h3>
           <?php $dir4 = "C:/xampp/htdocs/ProyectoFinal/archivosB2/ProduccionOral";
           if($folder4 = opendir($dir4)){
             while ($archivo4 = readdir($folder4)) {
               if($archivo4 != "." && $archivo4 != ".."){
               echo "&nbsp-<a href='/ProyectoFinal/archivosB2/ProduccionEscrita/$archivo4'>".$archivo4."</a> ..........&nbsp&nbsp<a href='deleteFileB2.php?item=../archivosB2/ProduccionOral/$archivo4'><img  src='/ProyectoFinal/images/papelera.png' class='paper-icon' alt='Icono de papelera'></a><br>";
              }
             }
           } ?>
           <?php
           /*Mediante el formulario de subida de archivos, se recoge en el siguiente código el post de dicho formulario.
           Los archivos subidos tendrán el formato indicado en la variable creada formats, de tal manera que mediante el condicional if
           indidicaremos que si los archivos subidos no coinciden con dicho formato, mostrará un mensaje de error, en caso contrario
           el archivo subido será ubicado en el repositorio indicado, dependiendo de la opción seleccionada en el Select.*/

           $formats = array('.jpg', '.pdf');
           if (isset($_POST['upload-button'])) {
             $name_file = $_FILES['file']['name'];
             $TMPname_file = $_FILES['file']['tmp_name'];
             /*En la variable extension se almacena el nombre del archivo, acompañado de un punto y la extension de dicho archivo.
             Se utiliza la función strrpos para indicar que visualice el formato apartir del punto del archivo y de esta manera
             se podrá comprobar si la extensión del archivo coincide con la indicada en la variable formats.*/
             $extension = substr($name_file, strrpos($name_file, '.'));
             $skills = $_POST['select-skill'];

             if (in_array($extension, $formats)) {
               if($skills == "Comprensión-auditiva"){
                 if (move_uploaded_file($TMPname_file, "../archivosB2/ComprensiónAuditiva/$name_file")) {
                   $archivosubido = "Archivo subido correctamente";
                 }else{
                   $error_archivo = "Error al subir archivo";
                 }
               }elseif($skills == "Comprensión-lectora"){
                 if (move_uploaded_file($TMPname_file, "../archivosB2/ComprensiónLectora/$name_file")) {
                   $archivosubido = "Archivo subido correctamente";
                 }else{
                   $error_archivo = "Error al subir archivo";
                 }
               }elseif($skills == "Producción-escrita"){
                 if (move_uploaded_file($TMPname_file, "../archivosB2/ProduccionEscrita/$name_file")) {
                   $archivosubido = "Archivo subido correctamente";
                 }else{
                   $error_archivo = "Error al subir archivo";
                 }
               }elseif($skills == "Producción-oral"){
                 if (move_uploaded_file($TMPname_file, "../archivosB2/ProduccionOral/$name_file")) {
                   $archivosubido = "Archivo subido correctamente";
                 }else{
                   $error_archivo = "Error al subir archivo";
                 }
               }
             }else{
               $Notaccept = "Formato de archivo no aceptado";
             }

           }

            ?>

          </div>
          <div class="content-form-file">
           <form action="" method="post" enctype="multipart/form-data">
             <h3>Subir Archivo</h3>
             <input type="file" name="file"><br><br>
             <select class="" name="select-skill">
               <option value="Comprensión-auditiva">Comprensión auditiva</option>
               <option value="Comprensión-lectora">Comprensión lectora</option>
               <option value="Producción-escrita">Producción escrita</option>
               <option value="Producción-oral">Producción oral</option>
             </select>
             <input type="submit" name="upload-button" value="Subir Archivo">
             <p><br> <?php
              if (isset($archivosubido)) {
                echo $archivosubido;
              }elseif(isset($error_archivo)){
                echo $error_archivo;
              }elseif(isset($Notaccept)){
                echo $Notaccept;
              }else{

              }

              ?>
           </form>
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
