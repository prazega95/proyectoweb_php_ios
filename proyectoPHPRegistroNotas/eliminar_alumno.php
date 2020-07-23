<?php

include("db.php");

if(isset($_GET['cod_alumno'])) {

  $cod_alumno = $_GET['cod_alumno'];

  $query = "DELETE FROM tb_alumno WHERE cod_alumno=$cod_alumno";
  $resultado_eliminado = mysqli_query($conexion, $query);
  if(!$resultado_eliminado) {
    die("query fallando..");
  }

  $_SESSION['message'] = 'Alumno(a) Eliminado(a)!';
  $_SESSION['message_type'] = 'danger';
  header('Location: 1-ALUMNOS.php');
}

?>
