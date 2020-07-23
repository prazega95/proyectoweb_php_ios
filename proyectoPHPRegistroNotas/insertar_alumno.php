<?php

include('db.php');


if (isset($_POST['grabar_tb_alumno'])) {

  $nombre = $_POST['nom_alumno'];
  $apellido = $_POST['apell_alumno'];
  $curso1 = $_POST['curso1'];
  $curso2 = $_POST['curso2'];
  $curso3 = $_POST['curso3'];
  $curso4 = $_POST['curso4'];
  $login = $_POST['login'];
  $pass = $_POST['pass'];


  $query="INSERT INTO tb_alumno(nom_alumno, apell_alumno,curso1,curso2,curso3,curso4,login,pass) VALUES('{$nombre}','{$apellido}','{$curso1}','{$curso2}','{$curso3}','{$curso4}','{$login}','{$pass}')";
  $resultado_insert=mysqli_query($conexion,$query);


  if(!$resultado_insert) {
    die("Query Failed.");
  }

 

  $_SESSION['message'] = 'Alumno(a) Registrado Exitosamente!';
  $_SESSION['message_type'] = 'success';
  header('Location: 1-ALUMNOS.php');

}

?>
