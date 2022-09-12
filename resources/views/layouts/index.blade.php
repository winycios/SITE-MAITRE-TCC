<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="/img/favicons/maitre.png" rel="icon">
    <link href="" rel="apple-touch-icon">

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

    <link rel="stylesheet" type="text/css" href="/vendor/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="/vendor/DataTables/datatables.min.css">

    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/modais.css" rel="stylesheet">
    <link href="/css/filtroPesquisa.css" rel="stylesheet">

</head>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <div class="logo me-auto">
              <a href="/"><img src="/img/logo/maitre.png" class="img-fluid"></a>
          </div>
          <nav id="navbar" class="navbar order-last order-lg-0">
              <ul>
                  <div class="search">
                      <label>
                          <input type="text" placeholder="pesquise aqui..." id="search" autocomplete="off">
                          <ion-icon name="search"></ion-icon>
                      </label>
                      <div class="resultado" id="resultado">

                    </div>
                  </div>
                  <li><a class="nav-link scrollto active" href="/">Inicio</a></li>
                  <li><a class="nav-link scrollto" href="/app">APP</a></li>
                  <li><a class="nav-link scrollto" href="/restaurantes">Restaurantes</a></li>
                  @auth
                    @if(auth()->user()->level == 1)
                        <li><a class="nav-link scrollto" href="/reservas">Minhas Reservas</a></li>
                    @endif
                  @endauth
                  
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          @guest
            <a href="/login" class="book-a-table-btn scrollto">LOGIN</a>
            <a href="/register" class="book-a-table-btn scrollto">CADASTRE-SE</a>
          @endguest

          @auth
            @if(auth()->user()->level == 2)
                <a href="/restaurantes/admin" class="book-a-table-btn scrollto"><i class="far fa-user"></i>  DASHBOARD</a>
            @elseif(auth()->user()->level == 3)
                <a href="/admin" class="book-a-table-btn scrollto"><i class="far fa-user"></i>  DASHBOARD</a>
            @else
                <a href="/clientes/{{auth()->user()->id}}" class="book-a-table-btn scrollto"><i class="bi bi-person-circle">
                    </i> OLÁ, {{explode(" ", auth()->user()->name)[0]}}</a>
                {{-- <a href="/clientes/{{auth()->user()->id}}"  class="book-a-table-btn scrollto"><i class="far fa-user"></i>  MEU PERFIL</a> --}}
            @endif
          <form action="/logout" method="POST">
              @csrf
              <a href="/logout" class="book-a-table-btn scrollto" onclick="event.preventDefault();
              this.closest('form').submit();"><i class="fas fa-sign-out"></i>  SAIR</a>
            </form>  
          @endauth
         
      </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
@yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
      <div class="container">
          <div class="logo me-auto">
              <a href="/"><img src="/img/logo/maitre.png" class="img-fluid"></a>
          </div>
          <div class="social-links">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
          <div class="copyright">
              &copy; Copyright <strong><span>Maître</span></strong>. All Rights Reserved
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
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>
  <script src="/js/cep.js"></script>
  <script src="/js/toast.js"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="/vendor/DataTables/datatables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="/vendor/DataTables/datatables.js"></script>

  <script src="/js/filtros.js"></script>

  
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#search").keyup(function(){
        var b = $("#search").val();
        $("#resultado").css("display", "block");
        $.ajax({
            type:"GET",
            data: {search:b},
            url: "/buscar",
            dataType: "json",
            success: function(data, textStatus, xhr) {
                if(xhr.status == 200){
                    $("#resultado").empty();
                    for(var i = 0; i < data.length; i++){
                        $("#resultado").append( `<a class="busca" href='/restaurantes/${data[i].id}'>` + data[i].nome + "</a>");
                    }
                }else{
                    $("#resultado").empty();
                    $("#resultado").append( "<a class='busca'>" + 'Restaurante não encontrado' + "</a>");
                }
                
            },
            error: function(error){
                console.log("Error:");
                console.log(error);
            }

        });
    });
    
    $("#resultado").mouseleave(function(){
        $("#resultado").empty();
        $("#search").val('');
        $("#resultado").css("display", "none");
    });

</script>

</body>

</html>