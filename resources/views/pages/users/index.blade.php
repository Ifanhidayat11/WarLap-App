<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>WarLap</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assetsuser/img/favicon.png" rel="icon">
    <link href="/assetsuser/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assetsuser/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assetsuser/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assetsuser/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assetsuser/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assetsuser/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assetsuser/css/style.css" rel="stylesheet">

    <style>
        .footer {
            background-color: #91A7D0;
            padding: 40px 0;
        }

        .footer .col h5 {
            font-weight: bold;
        }
    </style>

    <!-- =======================================================
  * Template Name: eNno - v4.10.0
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">WarLap</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#Kontak">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#Kontak">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- Hero Section -->
    <section id="hero" class="d-flex align-items-center">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Menampilkan SweetAlert jika ada session success
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    showClass: {
                        popup: 'animate_animated animate_fadeInUp' // animasi muncul
                    },
                    hideClass: {
                        popup: 'animate_animated animate_fadeOutDown' // animasi hilang
                    },
                    timer: 5000 // Waktu notifikasi muncul (dalam milidetik)
                });
            @endif

            // Menampilkan SweetAlert jika ada error
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ $errors->first() }}',
                    confirmButtonText: 'OK',
                    showClass: {
                        popup: 'animate_animated animate_fadeInUp'
                    },
                     hideClass: {
                        popup: 'animate_animated animate_fadeOutDown'
                    },
                    timer: 5000
                });
            @endif
        </script>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Suara Anda adalah Perubahan</h1>
                    <h5>Suara Anda, Perubahan Kita – Laporkan, Kami Tindak Lanjuti!</h5>
                    <div class="input-group mb-3">
                        <a href="#Suarakan" class="btn-lapor">Lapor</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="/assetsuser/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Wave Section -->
    <div style="position: relative; background: #B7C9F2;">
        <svg style="position: relative; display: block;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff"
                d="M0,128L80,144C160,160,320,192,480,192C640,192,800,160,960,144C1120,128,1280,128,1360,128L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- Suarakan Section -->
    <section id="Suarakan" class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold display-5">Suarakan Aduan <br>Anda!</h2>
            <div>
                <a href="{{ Route('login') }}" class="btn btn-dark me-2">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </a>
                <a href="{{ Route('registermasyarakat') }}" class="btn btn-dark">
                    <i class="fas fa-user-plus"></i> Daftar
                </a>
            </div>
        </div>
    </section>
    <main id="main">
        <footer id="Kontak" class="footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 mb-3">
                        <h5>Tentang Kami</h5>
                        <p>Aplikasi Pengaduan Masyarakat hadir sebagai solusi inovatif bagi warga untuk menyampaikan
                            keluhan, masukan, dan aspirasi secara cepat, mudah, dan transparan. Dengan sistem yang
                            terintegrasi, kami memastikan setiap laporan yang masuk akan diterima, diproses, dan
                            ditindaklanjuti oleh pihak yang berwenang.</p>
                        <hr>💡 Laporkan, Pantau, dan Bersama Kita Wujudkan Perubahan!
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>Kontak</h5>
                        <p><i class="fas fa-map-marker-alt"></i> Jl. Raya Tasikmalaya</p>
                        <p><i class="fas fa-phone"></i> 08823792993</p>
                        <p><i class="fas fa-envelope"></i> info@wanderform.id</p>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Vendor JS Files -->
        <script src="/assetsuser/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="/assetsuser/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assetsuser/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/assetsuser/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/assetsuser/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="/assetsuser/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="/assetsuser/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
