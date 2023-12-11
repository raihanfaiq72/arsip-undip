<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{$title}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{url('')}}/Assets/Landing/assets/img/favicon.png" rel="icon">
    <link href="{{url('')}}/Assets/Landing/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('')}}/Assets/Landing/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('')}}/Assets/Landing/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{url('')}}/Assets/Landing/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{url('')}}/Assets/Landing/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{url('')}}/Assets/Landing/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Amoeba - v4.7.0
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="index.html">Universitas Negri Semarang</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="{{url('')}}/Assets/Landing/assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#Petunjuk">Petunjuk</a></li>
                    <li><a class="nav-link scrollto" href="{{url('/login')}}">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End #header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <h1>{{$page}}</h1>
            <!-- <h2>We are team of talented designers making websites with Bootstrap</h2> -->
            <a href="#Petunjuk" class="btn-get-started scrollto">Petunjuk</a>
        </div>
    </section><!-- #hero -->

    <main id="main">


        <!-- ======= Services Section ======= -->
        <section id="Petunjuk" class="services section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Petunjuk</h2>
                    <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 icon-box">
                        <!-- <div class="icon"><i class="bi bi-circle"></i></div> -->
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
                                <path
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383z" />
                            </svg></div>
                        <h4 class="title"><a href="">Login</a></h4>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-2-circle" viewBox="0 0 16 16">
                                <path
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z" />
                            </svg></div>
                        <h4 class="title"><a href="">Ajukan Surat Masuk</a></h4>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-3-circle" viewBox="0 0 16 16">
                                <path
                                    d="M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318Z" />
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8" />
                            </svg></div>
                        <h4 class="title"><a href="">Tunggu Hingga Acc sekretaris dan ketua</a></h4>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Call To Action Section ======= -->
        <section class="call-to-action">
            <div class="container">

                <div class="text-center">

                </div>

            </div>
        </section><!-- End Call To Action Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>{{$footer}}</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/ -->

            </div>
        </div>
    </footer><!-- End #footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{url('')}}/Assets/Landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('')}}/Assets/Landing/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{url('')}}/Assets/Landing/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{url('')}}/Assets/Landing/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{url('')}}/Assets/Landing/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{url('')}}/Assets/Landing/assets/js/main.js"></script>

</body>

</html>
