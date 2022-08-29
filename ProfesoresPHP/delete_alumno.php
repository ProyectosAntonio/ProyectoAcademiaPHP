<?php
/*Para poder eliminar a los usuarios registrados en la base de datos, cuyo id coincida con el id del expediente
del alumno. Si se produce algún error en la eliminación del alumno aparecerá un mensaje de alerta, en caso
contrario nos recargará la página nuevamente. Se utiliza la instrucción SQL DELETE*/
  include('../conexion.php');

  session_start();

  if (!isset($_SESSION['profesores'])){
    header("location: /ProyectoFinal/templates/virtual.html");
  }

  $alumn_id = $_GET['id'];

  $delete_query = $mysqli->query("DELETE FROM alumnos WHERE id = '$alumn_id'");

  if ($delete_query) {
    header("Location: /ProyectoFinal/ProfesoresPHP/ListadoAlumnos.php");
    echo "<script>alert('No se pudo eliminar el alumno seleccionado');</script>";
  }else{
    echo "<script>alert('No se pudo eliminar el alumno seleccionado'); window.history.go(-1);</script>";
  }
 ?>
