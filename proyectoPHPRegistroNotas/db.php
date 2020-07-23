<?php

if(!isset($_SESSION)) 
    { 
        session_start(); //(esto se agrego para poder darle el alert en los registros)
    } 



$conexion = mysqli_connect(
   'localhost',
   'root',
   '',
   'sistema_notasv2'
) or die(mysqli_erro($mysqli));

?>
