<?php

include("db.php");

if(isset($_GET['cod_informatica'])) {

  $cod_informatica = $_GET['cod_informatica'];

  $query = "DELETE FROM tb_informatica WHERE cod_informatica=$cod_informatica";
  $resultado_eliminado = mysqli_query($conexion, $query);
  if(!$resultado_eliminado) {
    die("query fallando..");
  }

  $_SESSION['message'] = 'Alumno(a) Eliminado(a)!';
  $_SESSION['message_type'] = 'danger';
  header('Location: 4-INFORMATICA.php');
}

?>
