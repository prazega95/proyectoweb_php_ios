<?php

include('db.php');


if (isset($_POST['grabar_tb_usuario'])) {

  $nombre = $_POST['nom_usuario'];
  $apellido = $_POST['ape_usuario'];
  $curso = $_POST['curso_usuario'];
  $login = $_POST['login_usuario'];
  $pass = $_POST['pass_usuario'];


  $query="INSERT INTO tb_usuario(nom_usuario, ape_usuario,curso_usuario,login_usuario,pass_usuario) VALUES('{$nombre}','{$apellido}','{$curso}','{$login}','{$pass}')";
  $resultado_insert=mysqli_query($conexion,$query);


  if(!$resultado_insert) {
    die("Query Failed.");
  }

 

  $_SESSION['message'] = 'Usuario(a) Registrado Exitosamente!';
  $_SESSION['message_type'] = 'success';
  header('Location: 6-ADMINISTRADORES.php');

}

?>
