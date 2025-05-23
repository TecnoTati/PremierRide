<?php
$conexion = new mysqli("localhost", "root", "", "login_register");
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Eliminar promo si se recibe id en GET
if (isset($_GET['delete_id'])) {
  $idEliminar = intval($_GET['delete_id']);
  $conexion->query("DELETE FROM promo WHERE id = $idEliminar");
  header("Location: admin_promos.php");
  exit;
}

// Consultar promociones
$sql = "SELECT * FROM promo ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Panel de Administración - Promociones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #000;
      padding: 20px;
    }
    h1 {
      color: #d10000;
      margin-bottom: 30px;
      font-weight: bold;
      text-align: center;
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
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    img {
      max-width: 120px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <h1>Promociones</h1>
  <a href="crear_promo.php" class="btn btn-red mb-3">Agregar Nueva Promoción</a>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Imagen</th>
        <th>Título</th>
        <th>Precio Original</th>
        <th>Precio con Descuento</th>
        <th>Etiqueta</th>
        <th>descripción</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php while($promo = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?= $promo['id'] ?></td>
          <td>
            <?php if (!empty($promo['imagen_url'])): ?>
              <img src="<?= htmlspecialchars($promo['imagen_url']) ?>" alt="Imagen Promo">
            <?php endif; ?>
          </td>
          <td><?= htmlspecialchars($promo['titulo']) ?></td>
          <td>$<?= number_format($promo['precio_original'], 2) ?></td>
          <td>$<?= number_format($promo['precio_descuento'], 2) ?></td>
          <td><?= htmlspecialchars($promo['etiqueta']) ?></td>
          <td><?= htmlspecialchars($promo['descripcion']) ?></td>
          <td>
            <a href="editar_promo.php?id=<?= $promo['id'] ?>" class="btn btn-black btn-sm me-1">Editar</a>
            <a href="admin_promos.php?delete_id=<?= $promo['id'] ?>" onclick="return confirm('¿Seguro que quieres eliminar esta promoción?');" class="btn btn-red btn-sm">Eliminar</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <?php $conexion->close(); ?>
</body>
</html>
