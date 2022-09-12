@extends('layouts.admin')
@section('content')


<main>
    <!---------------- crud cliente ---------------->
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
    <div class="recent-orders">
        <h1>Categoria de restaurante</h1>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="../../assets/DataTables/datatables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="../../assets/DataTables/datatables.js"></script>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade de Restaurantes</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $c)
                    <tr>
                        <td data-label="Nome">{{$c->categoria}}</td>
                        <td data-label="Qtde. de restaurante">9</td>
                        <td><a href='#inativar' onclick="abreModalAtualizar({{$c->id}})" class="danger">Alterar</a>
                        <td><a href="#modal" onclick="abreModal({{$c->id}})" role="button">Excluir dados</a>
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
<!----------- end main ------------->

<!-- Modal -->
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
            <a href="" onclick="excluir(event)" class="button button__link">Sim</a>
        </div>
    </div>
    <a href="#!" class="outside-trigger"></a>
</div>

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
                <img src="../../Assets/img/logos/atlanticSemfundo.png">
            </div>
        </div>
    </div>
    <!--end top-->
    <div class="sales-analytics">
        <h2 class="text-muted">Categoria</h2>
        <a href="#m1-o">
            <div class="item add-product">
                <div class="icon">
                    <span class="material-icons-sharp">event</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Cadastrar nova categoria</h3>
                        <smal class="text-muted">Cadastradas 00</smal>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


<!-- modal Cat -->
<div class="modal-container" id="m1-o" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">person_outline</span>
                <strong>Cadastre uma nova categoria</strong>
                <form action='/admin/categorias/restaurantes/create' method="post">
                    @csrf
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-file-signature"></i>
                                <label class="form-label" for="input">Nome da categoria</label>
                                @if($errors->has('categoria'))
                                    <div class="error-msg">{{$errors->first('descCategoria')}}</div>
                                @endif
                                <input type="text" name="categoria" id="txCat" class="form-text">
                            </div>
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button type="submit" class="btn btn-login">cadastrar<i class="fas fa-arrow-right"></i></button>
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#!" class="link-2"></a>
    </div>
</div>
<!-- /modal Cat -->


<!-- modal inativo -->
<div class="modal-container" id="inativar" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">person_outline</span>
                <strong>Atualizar uma categoria</strong>
                <form action='/admin/categorias/restaurantes/atualizar' method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" value="" name="id" id="teste"/>
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-file-signature"></i>
                                <label class="form-label" for="input">Nome da categoria</label>
                                @if($errors->has('categoria'))
                                    <div class="error-msg">{{$errors->first('descCategoria')}}</div>
                                @endif
                                <input type="text" name="categoria" id="cat" class="form-text">
                            </div>
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button type="submit" class="btn btn-login">Atualizar<i class="fas fa-arrow-right"></i></button>
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#!" class="link-2"></a>
    </div>
</div>


<script>

    var id;

    function abreModal(x){
        id = x
    }

    async function abreModalAtualizar(x){
        id = x

        var cat = document.getElementById('cat')
        var catId = document.getElementById('teste')

        console.log(id)

        await fetch('http://127.0.0.1:8000/api/categoria-restaurantes/'+id,{
            method: 'GET',
        })

        .then((resp) => {
            return resp.json()
        })

        .then((data) =>{
            catId.value = data.id
            cat.value = data.categoria
        })
    }

    async function atualizar(e){
        e.preventDefault()
        await fetch('http://127.0.0.1:8000/api/categoria-restaurantes',{
            method: 'PUT',
        })
        .then((resp) =>{
            if(resp.ok){
                alert('atualizou')
                window.location.href="http://127.0.0.1:8000/admin/categorias/restaurantes/create"
            }
        })
    }

    async function excluir(e){
        e.preventDefault()

        await fetch('http://127.0.0.1:8000/api/categoria-restaurantes/'+id,{
            method: 'DELETE',
        })
        .then((resp) =>{
            if(resp.ok){
                alert('destruiu')
                window.location.href="http://127.0.0.1:8000/admin/categorias/restaurantes/create"
            }
        })
    }

</script>
@endsection