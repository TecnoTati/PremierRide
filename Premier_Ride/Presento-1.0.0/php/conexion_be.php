<?php
$conexion = mysqli_connect("localhost", "root", "", "login_register");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>

