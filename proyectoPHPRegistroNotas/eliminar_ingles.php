<?php

include("db.php");

if(isset($_GET['cod_ingles'])) {

  $cod_ingles = $_GET['cod_ingles'];

  $query = "DELETE FROM tb_ingles WHERE cod_ingles=$cod_ingles";
  $resultado_eliminado = mysqli_query($conexion, $query);
  if(!$resultado_eliminado) {
    die("query fallando..");
  }

  $_SESSION['message'] = 'Alumno(a) Eliminado(a)!';
  $_SESSION['message_type'] = 'danger';
  header('Location: 2-INGLES.php');
}

?>
