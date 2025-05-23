<?php
session_start();
include 'conexion_be.php';

$correo = $_POST['correo'];
$password = $_POST['password'];

$query = "SELECT * FROM usuario WHERE correo='$correo' AND password='$password'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['usuario'] = $correo;
    $_SESSION['rol'] = $fila['rol'];

    if ($fila['rol'] == 'admin') {
        header("Location: ./admin_promos.php");
    } else {
        if ($fila['terminos_aceptados'] == 0) {
            header("Location: ../contrato.html");
        } else {
            header("Location: ../usuarios1.html");
        }
    }
    exit();
} else {
    echo '
        <script>
            alert("Correo o contraseña incorrectos.");
            window.location = "../index.php";
        </script>
    ';
}

mysqli_close($conexion);
?>
