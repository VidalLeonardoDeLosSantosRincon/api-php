<?php 
function conectar(){
    $user="root";
    $pass="";
    $host="localhost";
    $db="dbapi";
    $con = mysqli_connect($host, $user, $pass,$db) or die("Error al conectar con la base de datos");
    mysqli_set_charset($con,"utf-8");
    return $con;
}   
?>