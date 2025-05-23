<?php
session_start();
include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$rol = $_POST['rol'];

// Validar rol
if ($rol != 'cliente' && $rol != 'admin') {
    echo '
        <script>
            alert("Rol inválido seleccionado.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

// Verificar correo duplicado
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
        <script>
            alert("Este correo ya está registrado.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

// Verificar usuario duplicado
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '
        <script>
            alert("Este nombre de usuario ya está en uso.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

// Insertar usuario con términos aceptados en 0 por defecto
$query = "INSERT INTO usuario(nombre_completo, correo, usuario, password, rol, terminos_aceptados) 
          VALUES('$nombre_completo', '$correo', '$usuario', '$password', '$rol', 0)";
$ejecutar = mysqli_query($conexion, $query);

// Si se registró correctamente
if ($ejecutar) {
    $_SESSION['usuario'] = $correo;
    $_SESSION['rol'] = $rol;

    if ($rol === 'admin') {
        // Admin va directo a su panel
        echo '
            <script>
                alert("Administrador registrado exitosamente.");
                window.location = "./admin_promos.php";
            </script>
        ';
    } else {
        // Cliente va a términos
        echo '
            <script>
                alert("Usuario registrado exitosamente.");
                window.location = "../contrato.html";
            </script>
        ';
    }
} else {
    echo '
        <script>
            alert("No se pudo registrar el usuario.");
            window.location = "../index.php";
        </script>
    ';
}

mysqli_close($conexion);
?>
