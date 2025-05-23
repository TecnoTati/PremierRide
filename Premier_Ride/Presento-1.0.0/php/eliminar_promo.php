<?php
// Verificar si llegó el ID por POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Conexión
    $conexion = new mysqli("localhost", "root", "", "login_register");
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Eliminar
    $stmt = $conexion->prepare("DELETE FROM promo WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: admin_promos.php");
        exit;
    } else {
        echo "Error al eliminar la promoción.";
    }
} else {
    echo "Petición inválida.";
}
?>
