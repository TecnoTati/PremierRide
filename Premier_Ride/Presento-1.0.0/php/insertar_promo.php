<?php
include("conexion_be.php");

$titulo = $_POST['titulo'];
$precio_original = $_POST['precio_original'];
$precio_descuento = $_POST['precio_descuento'];
$etiqueta = $_POST['etiqueta'];
$descripcion = $_POST['descripcion'];
$imagen_url = $_POST['imagen_url'];

$sql = "INSERT INTO promo (titulo,  precio_original, precio_descuento, etiqueta, descripcion, imagen_url)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssddsss", $titulo, $precio_original, $precio_descuento, $etiqueta, $descripcion, $imagen_url);

if ($stmt->execute()) {
  header("Location: admin_promos.php");
} else {
  echo "Error al guardar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
