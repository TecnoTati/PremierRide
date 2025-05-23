<?php
session_start();
include 'conexion_be.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

$correo = $_SESSION['usuario'];
$query = "UPDATE usuario SET terminos_aceptados = 1 WHERE correo = '$correo'";
mysqli_query($conexion, $query);

header("Location: ../usuarios1.html");
exit();
?>
