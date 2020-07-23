<?php

include("db.php");

if(isset($_GET['cod_matematicas'])) {

  $cod_matematicas = $_GET['cod_matematicas'];

  $query = "DELETE FROM tb_matematicas WHERE cod_matematicas=$cod_matematicas";
  $resultado_eliminado = mysqli_query($conexion, $query);
  if(!$resultado_eliminado) {
    die("query fallando..");
  }

  $_SESSION['message'] = 'Alumno(a) Eliminado(a)!';
  $_SESSION['message_type'] = 'danger';
  header('Location: 3-MATEMATICAS.php');
}

?>
