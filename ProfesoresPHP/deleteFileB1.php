<?php
//Para eliminar archivos se utiliza la función unlink.
$file = $_GET['item'];
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  header("Location: /ProyectoFinal/ProfesoresPHP/ProfesoresB1.php");
}

 ?>
