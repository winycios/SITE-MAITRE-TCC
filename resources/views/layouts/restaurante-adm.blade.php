<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/img/favicons/maitre.png" rel="icon">
    <link href="" rel="apple-touch-icon">
    <title>DASHBOARD || Restaurante</title>

    <!--modern -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

      <!--Load the AJAX API-->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--ionIcons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!--links pages-->

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
 <!--side bar-->
 <div class="container">
    <aside>
        <div class="top">
            <div class="logo">
                <a href="/">
                    <img src="/img/logos/logo.png">
                    <h2>MAÎ<span class="primary">TRE</span></h2>
                </a>
            </div>
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
        </div>

        <div class="sidebar">

            <!--crud restaurante-->
            <a class="active">
                <span class="material-icons-sharp">inventory</span>
                <h3><div class="text-muted">Plano atual:</div><div class="plano">Básico</div></h3>
            </a>
            <div class="dropdownRes">
                <a class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <div class="dropdown-contentRes">
                    <a href="/restaurantes/admin" class="active">
                        <span class="material-icons-sharp">inventory</span>
                        <h3>Tela inicial</h3>
                    </a>
                    <a href="/restaurantes/graficos" class="active">
                        <span class="material-icons-sharp">insights</span>
                        <h3>Grafícos</h3>
                    </a>
                    <a href="/restaurantes/graficos" class="active">
                    </a>
                </div>
            </div>
            <div class="dropdownRes">
                <a class="active">
                    <span class="material-icons-sharp">inventory</span>
                    <h3>Dados       </h3>
                </a>
                <div class="dropdown-contentRes">
                <a href="/restaurantes/edit/{{Auth::user()->id}}" class="active">
                    <span class="material-icons-sharp">inventory</span>
                    <h3>Dados do restaurante</h3>
                </a>
                <a href="/restaurantes/slides" class="active">
                    <span class="material-icons-sharp">slideshow</span>
                    <h3>Sliders</h3>
                </a>
                <a class="active"></a>
                </div>
            </div>

            
            <a href="/horarios/create" class="active">
                <span class="material-icons-sharp">event</span>
                <h3>Horários</h3>
            </a>
            <a href="/mesas/create" class="active">
                <span class="material-icons-sharp">table_bar</span>
                <h3>total de mesas</h3>
            </a>
            <a href="/pratos/cardapio" class="active">
                <span class="material-icons-sharp">restaurant_menu</span>
                <h3>Cardápio</h3>
            </a>
            <a href="/pratos/especiais/cardapio" class="active">
                <span class="material-icons-sharp">menu</span>
                <h3>Pratos especiais</h3>
            </a>
            <a href="/restaurantes/premium" class="active">
                <span class="material-icons-sharp">workspace_premium</span>
                <h3>Serviço premium</h3>
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





    <script src='https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js'></script><script  src="./script.js"></script>

    <!--links internos-->
    <script src="/js/modalReserva.js"></script>
    <script src="/js/selectModal.js"></script>
    <script src="/js/price.js"></script>
    <script src="/js/style.js"></script>
    <script src="/js/cep.js"></script>
    <script src="/js/lightbox.min.js"></script>




    </body>

</html>