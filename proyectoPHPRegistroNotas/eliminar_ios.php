<?php

include("db.php");

if(isset($_GET['cod_ios'])) {

  $cod_ios = $_GET['cod_ios'];

  $query = "DELETE FROM tb_ios WHERE cod_ios=$cod_ios";
  $resultado_eliminado = mysqli_query($conexion, $query);
  if(!$resultado_eliminado) {
    die("query fallando..");
  }

  $_SESSION['message'] = 'Alumno(a) Eliminado(a)!';
  $_SESSION['message_type'] = 'danger';
  header('Location: 5-IOS.php');
}

?>
