<?php
session_start(); // Iniciando sesion

$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submit'])) {
if (empty($_POST['login_usuario']) || empty($_POST['pass_usuario'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username y $password
$login_usuario=$_POST['login_usuario'];
$pass_usuario=$_POST['pass_usuario'];

// Estableciendo la conexion a la base de datos
include("db.php");//Contiene de conexion a la base de datos
 

$sql = "SELECT curso_usuario, login_usuario, pass_usuario FROM tb_usuario WHERE login_usuario = '" .$login_usuario. "' and pass_usuario='".$pass_usuario."';";
$query=mysqli_query($conexion,$sql);
$counter=mysqli_fetch_array($query);



if($counter['curso_usuario']=="Administrador"){
	
	header("location: 0-PRINCIPAL.php");

	//$_SESSION['login_user_sys']=$login_usuario; // Iniciando la sesion
	//header("location: 0-PRINCIPAL.php"); // Redireccionando a la pagina profile.php


}
else if($counter['curso_usuario']=="Ingles"){
	
	header("location: 2-INGLES.php");

	//$_SESSION['login_user_sys']=$login_usuario; // Iniciando la sesion
	//header("location: 0-PRINCIPAL.php"); // Redireccionando a la pagina profile.php


}
else if($counter['curso_usuario']=="Matematicas"){

	//$_SESSION['login_user_sys']=$login_usuario; // Iniciando la sesion
	header("location: 3-MATEMATICAS.php"); // Redireccionando a la pagina profile.php


}
else if($counter['curso_usuario']=="Informatica"){

	//$_SESSION['login_user_sys']=$login_usuario; // Iniciando la sesion
	header("location: 4-INFORMATICA.php"); // Redireccionando a la pagina profile.php


}
else if($counter['curso_usuario']=="IOS"){


	//$_SESSION['login_user_sys']=$login_usuario; // Iniciando la sesion
	header("location: 5-IOS.php"); // Redireccionando a la pagina profile.php


}


else {
$error = "El correo electrónico o la contraseña es inválida.";	
}
}
}



?>