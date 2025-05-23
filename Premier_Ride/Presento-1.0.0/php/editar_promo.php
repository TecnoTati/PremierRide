<?php
$conexion = new mysqli("localhost", "root", "", "login_register");
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

if (!isset($_GET['id'])) {
  header("Location: admin_promos.php");
  exit;
}

$id = intval($_GET['id']);

// Obtener datos actuales
$sql = "SELECT * FROM promo WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$promo = $resultado->fetch_assoc();

if (!$promo) {
  header("Location: admin_promos.php");
  exit;
}

// Procesar formulario al enviar
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $precio_original = $_POST['precio_original'];
  $precio_descuento = $_POST['precio_descuento'];
  $etiqueta = $_POST['etiqueta'];
  $descripcion = $_POST['descripcion'];
  $imagen_url = $_POST['imagen_url'];

  $sql_update = "UPDATE promo SET titulo = ?, precio_original = ?, precio_descuento = ?, etiqueta = ?, descripcion=?, imagen_url = ? WHERE id = ?";
  $stmt_update = $conexion->prepare($sql_update);
  $stmt_update->bind_param("sddsssi", $titulo, $precio_original, $precio_descuento, $etiqueta, $descripcion, $imagen_url, $id);
  $stmt_update->execute();
  $stmt_update->close();

  header("Location: admin_promos.php");
  exit;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Promoción</title>
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
    <h2>Editar Promoción</h2>
    <form action="editar_promo.php?id=<?= $id ?>" method="POST">
      <label>Título</label>
      <input type="text" name="titulo" class="form-control" required value="<?= htmlspecialchars($promo['titulo']) ?>">

      <label>Precio Original</label>
      <input type="number" step="0.01" name="precio_original" class="form-control" required value="<?= $promo['precio_original'] ?>">

      <label>Precio con Descuento</label>
      <input type="number" step="0.01" name="precio_descuento" class="form-control" required value="<?= $promo['precio_descuento'] ?>">

      <label>Etiqueta</label>
      <input type="text" name="etiqueta" class="form-control" required value="<?= htmlspecialchars($promo['etiqueta']) ?>">

      <label>Descripción</label>
      <input type="text" name="descripcion" class="form-control" required value="<?= htmlspecialchars($promo['descripcion']) ?>">

      <label>URL de Imagen</label>
      <input type="text" name="imagen_url" class="form-control" required value="<?= htmlspecialchars($promo['imagen_url']) ?>">

      <div class="btn-container">
        <button type="submit" class="btn btn-red w-50 me-2">Guardar Cambios</button>
        <a href="admin_promos.php" class="btn btn-black w-50 ms-2">Cancelar</a>
      </div>
    </form>
  </div>
</body>
</html>

<?php $conexion->close(); ?>
