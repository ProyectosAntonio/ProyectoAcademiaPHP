<?php
/*Para poder acceder a los archivos se crea una variable que permite indicar la ubicación donde
se encuentran los archivos, mediante opendir podremos abrir la carpeta y readdir que lee la entrada desde nuestro directorio.
Por lo que mostrará los archivos encontrados en nuestro directorio y al cual accedemos por la ruta con la variable archivo,
para acceder a todos los archivos del directorio especificado, de tal manera que con el bucle while nos permitirá
mostrar los archivos del directorio especificado. En el enlace se emplea la variable archivo para acceder a cada nombre del
archivo y los muestre uno tras otro. Además se especifica dentro del while un condicional if para que no nos muestre los puntos
mostrados de la ruta de archivo por defecto.*/
if($fila['Curso'] == "A2"){
$dir1A2 = "../archivosA2/ComprensiónAuditiva";
if($folder1A2 = opendir($dir1A2)){
  while ($archivo1A2 = readdir($folder1A2)) {
    if($archivo1A2 != "." && $archivo1A2 != ".."){
    echo "&nbsp-<a href='/ProyectoFinal/archivosA2/ComprensiónAuditiva/$archivo1A2'>".$archivo1A2."</a><br>";
   }
  }
}
 $dir2A2 = "../archivosA2/ComprensiónLectora";
if($folder2A2 = opendir($dir2A2)){
  while ($archivo2A2 = readdir($folder2A2)) {
    if($archivo2A2 != "." && $archivo2A2 != ".."){
    echo "<br>&nbsp-<a href='/ProyectoFinal/archivosA2/ComprensiónLectora/$archivo2A2'>".$archivo2A2."</a><br>";
   }
  }
}
 $dir3A2 = "../archivosA2/ProduccionEscrita";
if($folder3A2 = opendir($dir3A2)){
  while ($archivo3A2 = readdir($folder3A2)) {
    if($archivo3A2 != "." && $archivo3A2 != ".."){
    echo "<br>&nbsp-<a href='/ProyectoFinal/archivosA2/ProduccionEscrita/$archivo3A2'>".$archivo3A2."</a><br>";
   }
  }
}
  $dir4A2 = "../archivosA2/ProduccionOral";
if($folder4A2 = opendir($dir4A2)){
  while ($archivo4A2 = readdir($folder4A2)) {
    if($archivo4A2 != "." && $archivo4A2 != ".."){
    echo "<br>&nbsp-<a href='/ProyectoFinal/archivosA2/ProduccionEscrita/$archivo4A2'>".$archivo4A2."</a><br>";
   }
  }
}
}elseif ($fila['Curso'] == "B1") {
  $dir1B1 = "../archivosB1/ComprensiónAuditiva";
  if($folder1B1 = opendir($dir1B1)){
    while ($archivo1B1 = readdir($folder1B1)) {
      if($archivo1B1 != "." && $archivo1B1 != ".."){
      echo "&nbsp-<a href='/ProyectoFinal/archivosB1/ComprensiónAuditiva/$archivo1B1'>".$archivo1B1."</a><br>";
     }
    }
  }
   $dir2B1 = "../archivosB1/ComprensiónLectora";
  if($folder2B1 = opendir($dir2B1)){
    while ($archivo2B1 = readdir($folder2B1)) {
      if($archivo2B1 != "." && $archivo2B1 != ".."){
      echo "<br>&nbsp-<a href='/ProyectoFinal/archivosB1/ComprensiónLectora/$archivo2B1'>".$archivo2B1."</a><br>";
     }
    }
  }
   $dir3B1 = "../archivosB1/ProduccionEscrita";
  if($folder3B1 = opendir($dir3B1)){
    while ($archivo3B1 = readdir($folder3B1)) {
      if($archivo3B1 != "." && $archivo3B1 != ".."){
      echo "<br>&nbsp-<a href='/ProyectoFinal/archivosB1/ProduccionEscrita/$archivo3B1'>".$archivo3B1."</a><br>";
     }
    }
  }
    $dir4B1 = "../archivosB1/ProduccionOral";
  if($folder4B1 = opendir($dir4B1)){
    while ($archivo4B1 = readdir($folder4B1)) {
      if($archivo4B1 != "." && $archivo4B1 != ".."){
      echo "<br>&nbsp-<a href='/ProyectoFinal/archivosB1/ProduccionEscrita/$archivo4B1'>".$archivo4B1."</a><br>";
     }
    }
  }
}elseif ($fila['Curso'] == "B2") {
  $dir1B2 = "../archivosB2/ComprensiónAuditiva";
  if($folder1B2 = opendir($dir1B2)){
    while ($archivo1B2 = readdir($folder1B2)) {
      if($archivo1B2 != "." && $archivo1B2 != ".."){
      echo "&nbsp-<a href='/ProyectoFinal/archivosB2/ComprensiónAuditiva/$archivo1B2'>".$archivo1B2."</a><br>";
     }
    }
  }
   $dir2B2 = "../archivosB2/ComprensiónLectora";
  if($folder2B2 = opendir($dir2B2)){
    while ($archivo2B2 = readdir($folder2B2)) {
      if($archivo2B2 != "." && $archivo2B2 != ".."){
      echo "<br>&nbsp-<a href='/ProyectoFinal/archivosB2/ComprensiónLectora/$archivo2B2'>".$archivo2B2."</a><br>";
     }
    }
  }
   $dir3B2 = "../archivosB2/ProduccionEscrita";
  if($folder3B2 = opendir($dir3B2)){
    while ($archivo3B2 = readdir($folder3B2)) {
      if($archivo3B2 != "." && $archivo3B2 != ".."){
      echo "<br>&nbsp-<a href='/ProyectoFinal/archivosB2/ProduccionEscrita/$archivo3B2'>".$archivo3B2."</a><br>";
     }
    }
  }
    $dir4B2 = "../archivosB2/ProduccionOral";
  if($folder4B2 = opendir($dir4B2)){
    while ($archivo4B2 = readdir($folder4B2)) {
      if($archivo4B2 != "." && $archivo4B2 != ".."){
      echo "<br>&nbsp-<a href='/ProyectoFinal/archivosB2/ProduccionEscrita/$archivo4B2'>".$archivo4B2."</a><br>";
     }
    }
  }
}else {
  echo "error";
}
?>
