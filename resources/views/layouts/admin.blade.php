<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/img/favicons/maitre.png" rel="icon">
    <link href="" rel="apple-touch-icon">
    <title>AREA ADMINISTRADOR</title>

    <!--links internos-->
    <link rel="stylesheet" href="/css/adm.css">

     <!--Load the AJAX API-->
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     
    <!--Data table-->
    
    <link rel="stylesheet" href="/css/adm.css">
    <link rel="stylesheet" href="/css/lightbox.css">
    <link rel="stylesheet" href="/css/modal.css">
    <link rel="stylesheet" href="/css/formsRest.css">
    <link rel="stylesheet" href="/css/price.css">
    <link rel="stylesheet" href="/css/partePremium.css">
    <link rel="stylesheet" href="/css/pagamento.css">

    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Data table-->
    
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css">



    <!--Material CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    
</head>
<body>

    <!--side bar-->
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <a href="/"><img src="/img/logos/logo.png"></a>

                    <h2>MAÎ<span class="primary">TRE</span></h2>
                </div>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
            </div>

            <div class="sidebar">
                <a href="/admin" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="/admin/restaurantes" class="active">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Restaurantes</h3>
                </a>
                
                <a href="/admin/categorias/create" class="active">
                    <span class="material-icons-sharp">category</span>
                    <h3>Categoria de pratos</h3>
                </a>

                <a href="/admin/categorias/restaurantes/create" class="active">
                    <span class="material-icons-sharp">category</span>
                    <h3>Categoria de restaurantes</h3>
                </a>
                
                <form class="form-logout" method="POST" action="/logout">
                    @csrf
                      
                      <a class="active" href="#" onclick="event.preventDefault();
                      this.closest('form').submit();">
                      <span class="material-icons-sharp">logout</span>
                      <h3>Sair</h3>
                      
                    </a>
                </form>
            </div>
        </aside>


        @yield('content')

        <!--JQUERY -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>


        <!--links internos-->
        <script src="/js/style.js"></script>
        <script src="/js/form.js"></script>
        
        
        
    </body>
        
</html>