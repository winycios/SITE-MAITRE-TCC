@extends('layouts.admin')
@section('content')

<main>
    <h1>Analise de Dados</h1>

    <div class="insights">
        <div class="income">
            <div class="middle">
                <div class="left">
                    <h3>Total de categorias</h3>
                    <h1>{{$count}}</h1>
                </div>
            </div>
            <small class="text-muted">atualizado a 24 horas</small>
        </div>
        <!-----------------end sales----------------->

        <!----------------- end income ----------------->
    </div>
    <!---------------- end insights ---------------->

    <div class="recent-orders">
        <h2>Categorias já cadastradas</h2>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>QTDE. de Restaurantes</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $c)
                    <tr>
                        <td>{{$c->descCategoria}}</td>
                        <td>{{$c->id}}</td>
                        <td><a href='' class="danger">Alterar dados</a>
                        <td><a href="#modal" role="button">Excluir dados</a>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        </script>
    </div>
</main>

<div class="modal-wrapper" id="modal">
    <div class="modal-body card">
        <div class="modal-header">
            <h2 class="heading">tem certeza ?</h2>
            <a href="#!" role="button" class="close" aria-label="close this modal">
                <svg viewBox="0 0 24 24">
                    <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                </svg>
            </a>
        </div>
        <h3>Esse dado será excluido permanentemente, tem certeza ?</h3>

        <div class="button-center">
            <a href="" class="button button__link">Não</a>
            <a href="" class="button button__link">Sim</a>
        </div>
    </div>
    <a href="#!" class="outside-trigger"></a>
</div>

<!----------- end main ABERTA NO MENU.PHP ------------->

<!--light and white mode-->
<div class="right">
    <div class="top">
        <button id="menu-btn">
            <span class="material-icons-sharp">menu</span>
        </button>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
        <div class="profile">
            <div class="info">
                <p>hey, <b>ADM</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="/images/admin/logos/atlanticSemfundo.png">
            </div>
        </div>
    </div>
    <!--end top-->
    
    <!-- Formulario -->
    <div id="containerForm">
        <h1>&bull;adicione Categorias&bull;</h1>
        <div class="underline"></div>
        <form action="/admin/categorias/create" method="post" id="contact_form">
            @csrf
            <div class="nameCat">
                <label for="name"></label>
                <input type="text" placeholder="Categoria a cadastrar" value="{{old('descCategoria')}}" name="descCategoria" id="txCat" required>
                @if($errors->has('descCategoria'))
                    <div class="error-msg">{{$errors->first('descCategoria')}}</div>
                @endif
            </div>
            <input type="submit" value="Cadastrar" id="form_button">
        </form>
    </div>
    <!--end top-->
    <!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>

@endsection