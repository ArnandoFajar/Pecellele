<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pecel Lele Mbok Citro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/frontend/img/favicon.png" rel="icon">
  <link href="assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href=<?= base_url("assets/frontend/vendor/bootstrap/css/bootstrap.min.css") ?> rel="stylesheet">
  <link href=<?= base_url("assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css") ?> rel="stylesheet">
  <link href=<?= base_url("assets/frontend/vendor/aos/aos.css") ?> rel="stylesheet">
  <link href=<?= base_url("assets/frontend/vendor/glightbox/css/glightbox.min.css") ?> rel="stylesheet">
  <link href=<?= base_url("assets/frontend/vendor/swiper/swiper-bundle.min.css") ?> rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href=<?= base_url("assets/frontend/css/main.css") ?> rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>Pecel Lele <br/> <span>Mbok Citro</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#gallery">Galeri</a></li>
          <li><a href="#contact">Reservasi</a></li>
          <li><a href="#lokasi">Lokasi</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Solusi Makan<br>Nikmat & Nyaman</h2>
          <p data-aos="fade-up" data-aos-delay="100">Kenalin, Mbok Citro Merupakan Rumah Makan Pecel Lele Yang Berada Di Pusat <span class="text-danger"> Kota Bandar Lampung </span>, Dekat Mall Boemi Kedatan Atau Samping RADAR Lampung.</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#contact" class="btn-book-a-table">Pesan Sekarang</a>
            <a href="https://youtu.be/0uzCKNBWhMg" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Tonton Video</span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/frontend/img/ilustrasi-resto.jpg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

  <?= $this->renderSection('content') ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-4 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Alamat</h4>
            <p>
            Jl. Sultan Agung No.7, Sepang Jaya<br>
            Kec. Kedaton, Kota Bandar Lampung<br>
            </p>
          </div>

        </div>

        <div class="col-lg-4 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservasi</h4>
            <p>
              <strong>No Telp:</strong> 0821-1740-2004<br>
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Jam Buka</h4>
            <p>
              <strong>Setiap Hari: 10.00  - 21.00 </strong> <br>
              <strong>Kecuali Jumat : 13.00 - 21.00 </strong>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- jQuery -->
      <script src=<?= base_url("assets/backend/plugins/jquery/jquery.min.js"); ?>></script>

  <!-- Vendor JS Files -->
  <script src=<?= base_url("assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>></script>
  <script src=<?= base_url("assets/frontend/vendor/aos/aos.js") ?>></script>
  <script src=<?= base_url("assets/frontend/vendor/glightbox/js/glightbox.min.js") ?>></script>
  <script src=<?= base_url("assets/frontend/vendor/purecounter/purecounter_vanilla.js") ?>></script>
  <script src=<?= base_url("assets/frontend/vendor/swiper/swiper-bundle.min.js") ?>></script>

  <!-- Template Main JS File -->
  <script src=<?= base_url("assets/frontend/js/main.js") ?>></script>
  <?= $this->renderSection('script') ?>
</body>

</html>