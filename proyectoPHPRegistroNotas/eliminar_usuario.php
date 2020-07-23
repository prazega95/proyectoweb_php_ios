<?php

include("db.php");

if(isset($_GET['idUsuario'])) {

  $idUsuario = $_GET['idUsuario'];

  $query = "DELETE FROM tb_usuario WHERE idUsuario=$idUsuario";
  $resultado_eliminado = mysqli_query($conexion, $query);
  if(!$resultado_eliminado) {
    die("query fallando..");
  }

  $_SESSION['message'] = 'Usuario(a) Eliminado(a)!';
  $_SESSION['message_type'] = 'danger';
  header('Location: 6-ADMINISTRADORES.php');
}

?>
