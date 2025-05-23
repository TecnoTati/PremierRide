<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $conexion = new mysqli("localhost", "root", "", "login_register");
  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  $titulo = $_POST['titulo'];
  $precio_original = $_POST['precio_original'];
  $precio_descuento = $_POST['precio_descuento'];
  $etiqueta = $_POST['etiqueta'];
  $descripcion = $_POST['descripcion'];
  $imagen_url = $_POST['imagen_url'];

  $sql = "INSERT INTO promo (titulo, precio_original, precio_descuento, etiqueta, descripcion, imagen_url)
          VALUES (?, ?, ?, ?, ?, ?)";
  
  $stmt = $conexion->prepare($sql);
  if (!$stmt) {
    die("Error en la consulta: " . $conexion->error);
  }

  $stmt->bind_param("sddsss", $titulo,  $precio_original, $precio_descuento, $etiqueta, $descripcion, $imagen_url);

  if (!$stmt->execute()) {
    die("Error al ejecutar la consulta: " . $stmt->error);
  }

  $stmt->close();
  $conexion->close();

  header("Location: admin_promos.php");
  exit;
}
?>

