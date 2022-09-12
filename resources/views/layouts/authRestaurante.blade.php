<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MAÎTRE || SERVINDO A VOCÊ</title>

    <!-- Favicons -->
    <link href="/img/favicons/maitre.png" rel="icon">
    <link href="" rel="apple-touch-icon">

     <!--font aewsome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Template Main CSS File -->
    <link href="/css/login2.css" rel="stylesheet">

    <link href="/css/formsRestaurante.css" rel="stylesheet">
    <link href="/css/modal_select.css" rel="stylesheet">

</head>


<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <div class="logo me-auto">
                <a href="/"><img src="/img/logo/logoMaitre2.png" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
               
            </nav><!-- .navbar -->
            <a href="/" class="book-a-table-btn scrollto">TELA INICIAL</a>
            <a href="/login" class="book-a-table-btn scrollto">LOGIN</a>

        </div>
    </header>

        @yield('content')



        

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container">
                <div class="logo me-auto">
                    <a href="index.html"><img src="/img/logo/logoMaitre2.png" class="img-fluid"></a>
                </div>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
                <div class="copyright">
                    &copy; Copyright <strong><span>MAÎTRE</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Criado por <a href="">ATLANTIC</a>
                </div>
            </div>
        </footer>
      
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
      
      
        <!--ion icons-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      
        <!-- Vendor JS Files -->
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/vendor/swiper/swiper-bundle.min.js"></script>
      
      
        <!-- Template Main JS File -->
        <script src="/js/main.js"></script>
        <script src="/js/cep.js"></script>
        <script src="/js/forms.js"></script>
        <script src="/js/login.js"></script>
        <script src="/js/preview.js"></script>
        <script src="/js/formsRestaurante.js"></script>
        <script src="/js/selectInterativo.js"></script>
      

        
    </body>
      
</html>