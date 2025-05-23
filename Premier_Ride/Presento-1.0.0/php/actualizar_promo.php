<?php
$conexion = new mysqli("localhost", "root", "", "login_register");
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = $_POST['id'];
  $titulo = $_POST['titulo'];
  $precio_original = $_POST['precio_original'];
  $precio_descuento = $_POST['precio_descuento'];
  $etiqueta = $_POST['etiqueta'];
  $descripcion = $_POST['descripcion'];
  $imagen_url = $_POST['imagen_url'];

  $sql = "UPDATE promo SET titulo=?, precio_original=?, precio_descuento=?, etiqueta=?, descripcion=?, imagen_url=? WHERE id=?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("sddsssi", $titulo,  $precio_original, $precio_descuento, $etiqueta, $descripcion, $imagen_url, $id);
  $stmt->execute();

  header("Location: admin_promos.php");
  exit;
}
?>
