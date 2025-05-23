<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "login_register");

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Consultar promociones
$sql = "SELECT * FROM promo ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Premier ride</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../assets/img/Logocarro.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
        <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
    }

    header {
      background-color: #000;
      color: white;
      padding: 15px 30px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }

    nav a {
      text-decoration: none;
      color: white;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
    }

    .promo-card {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .promo-card img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .precio-original {
      text-decoration: line-through;
      color: #999;
    }

    .precio-descuento {
      font-size: 1.2em;
      color: #e60000;
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <h1 class="sitename">Promociones</h1>
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="../usuarios1.html#hero" class="active">Inicio<br></a></li>
          <li><a href="../usuarios1.html#about">Acerca de</a></li>
          <li><a href="../usuarios1.html#services">Servicios</a></li>
          <li><a href="../usuarios1.html#team">Equipo</a></li>
          <li><a href="#promociones.php">Promociones</a></li>
          <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Rolls-Royce</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="../Carros/Rolls-Royce Phantom.html">Rolls-Royce Phantom</a></li>
                  <li><a href="../Carros/Rolls-Royce Ghost.html">Rolls-Royce Ghost</a></li>
                  <li><a href="../Carros/Rolls-Royce Wraith.html">Rolls-Royce Wraith</a></li>
                  <li><a href="../Carros/Rolls-Royce Cullinan.html">Rolls-Royce Cullinan</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Ferrari</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="../Carros/Ferrari SF90 Stradale.html">Ferrari SF90 Stradale</a></li>
                  <li><a href="../Carros/Ferrari 812 Superfast.html">Ferrari 812 Superfast</a></li>
                  <li><a href="../Carros/Ferrari F8 Tributo.html">Ferrari F8 Tributo</a></li>
                  <li><a href="../Carros/Ferrari Roma.html">Ferrari Roma</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Bentley</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="../Carros/Bentley Continental GT.html">Bentley Continental GT</a></li>
                  <li><a href="../Carros/Bentley Flying Spur.html">Bentley Flying Spur</a></li>
                  <li><a href="../Carros/Bentley Bentayga.html">Bentley Bentayga</a></li>
                  <li><a href="../Carros/Bentley Mulsanne.html">Bentley Mulsanne</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Porsche</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="../Carros/Porsche 911 Turbo S.html">Porsche 911 Turbo S</a></li>
                  <li><a href="../Carros/Porsche Cayenne Turbo GT.html">Porsche Cayenne Turbo GT</a></li>
                  <li><a href="../Carros/Porsche Panamera Turbo S E-Hybrid.html">Porsche Panamera Turbo S E-Hybrid</a></li>
                  <li><a href="../Carros/Porsche Taycan Turbo S.html">Porsche Taycan Turbo S</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="../usuarios1.html#contact">Contacto</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
<div class="container">
 <?php while($promo = $resultado->fetch_assoc()): ?>
  <div class="promo-card">
    <?php if (!empty($promo['imagen_url'])): ?>
      <img src="<?= $promo['imagen_url'] ?>" alt="<?= $promo['id'] ?>">
    <?php endif; ?>
    <h2><?= htmlspecialchars($promo['titulo']) ?></h2>
    <p class="precio-original">$<?= number_format($promo['precio_original'], 2) ?></p>
    <p class="precio-descuento">$<?= number_format($promo['precio_descuento'], 2) ?></p>
    <p><?= htmlspecialchars($promo['etiqueta']) ?></p>
    <p><?= htmlspecialchars($promo['descripcion']) ?></p>
    
  </div>
<?php endwhile; ?>

</div>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Premier Ride</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Universidad Manuela Beltran</p>
            <p>Colombia</p>
            <p class="mt-3"><strong>Phone:</strong> <span>3006580193</span></p>
            <p><strong>Email:</strong> <span>ridepremier28@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Enlaces</h4>
          <ul>
            <ul>
              <li><a href="../usuarios1.html#hero" class="active">Inicio<br></a></li>
              <li><a href="../usuarios1.html#about">Acerca de</a></li>
              <li><a href="../usuarios1.html#services">Servicios</a></li>
              <li><a href="../usuarios1.html#team">Equipo</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <!-- <p>©
        <strong class="px-1 sitename">Premier Ride</strong> <span>All Rights Reserved</span></p> -->
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>
  <?php $conexion->close(); ?>
</body>

</html>