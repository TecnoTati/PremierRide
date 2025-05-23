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
  $stmt->bind_param("sddsss", $titulo, $precio_original, $precio_descuento, $etiqueta, $descripcion, $imagen_url);
  $stmt->execute();

  header("Location: admin_promos.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Promoción</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
     body {
      background-color: #fff;
      color: #000;
    }
    .form-container {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      border-radius: 10px;
    }
    h2 {
      color: #d10000;
      text-align: center;
      margin-bottom: 30px;
      font-weight: bold;
    }
    .btn-red {
      background-color: #d10000;
      color: #fff;
    }
    .btn-red:hover {
      background-color: #a80000;
    }
    .btn-black {
      background-color: #000;
      color: #fff;
    }
    .btn-black:hover {
      background-color: #333;
    }
    .form-control {
      border-radius: 10px;
      margin-bottom: 20px;
    }
    .btn-container {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>
<body>
  <div class="container form-container">
    <h2>Agregar Promoción</h2>
    <form action="guardar_promo.php" method="POST">
      <label>Título</label>
      <input type="text" name="titulo" class="form-control" required>

      <label>Precio Original</label>
      <input type="number" step="0.01" name="precio_original" class="form-control" required>

      <label>Precio con Descuento</label>
      <input type="number" step="0.01" name="precio_descuento" class="form-control" required>

      <label>Etiqueta</label>
      <input type="text" name="etiqueta" class="form-control" required>

      
      <label>Descripción</label>
      <input type="text" name="descripcion" class="form-control" required>

      <label>URL de Imagen</label>
      <input type="text" name="imagen_url" class="form-control" required>

      <div class="btn-container">
        <button type="submit" class="btn btn-red w-50 me-2">Guardar</button>
        <a href="admin_promos.php" class="btn btn-black w-50 ms-2">Cancelar</a>
      </div>
    </form>
  </div>
</body>
</html>
