@extends('layouts.restaurante-adm')
@section('content')

<main>
    <h1>Análise de Mesas</h1>

    <div class="recent-orders">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Mesa</th>
                    <th>Capacidade </th>
                    <th>Disponível </th>
                    <th>Alterar</th>
                    <th>Inativar</th>
                    <th>Reativar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mesas as $m)
                    <tr>
                        <td data-label="Mesa">{{$m->mesa}}</td>
                        <td data-label="Capacidade">{{$m->capacidade}}</td>
                        @if($m->disponivel == 1)
                            <td data-label="Disponível">Sim</td>
                        @else
                            <td data-label="Disponível">Não</td>
                        @endif
                        <td><a href="#modalAtualizar" onclick="modalAtualizar({{$m->id}})"" class="warning">Alterar mesa</a></td>
                        @if($m->disponivel != 0)
                            <td><a href="#modalInativar" onclick="abreModal({{$m->id}})" class="warning">Inativar mesa</a></td>
                            <td><a class="warning"> @php echo '&nbsp' @endphp</a></td>
                        @else
                            <td><a class="warning"> @php echo '&nbsp' @endphp </a></td>
                            <td><a href="#modalReativar" onclick="abreModal({{$m->id}})" class="warning">Reativar mesa</a></td>
                        @endif
                        <td><a href="#modal" onclick="abreModal({{$m->id}})" role="button" class="danger">excluir mesa</a></td>
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
<!----------- end main ABERTA NO MENU.PHP ------------->


<!-- modal Cadastro -->
<div class="modal-container" id="modalMesa" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">table_bar</span>
                <strong>Cadastre uma mesa</strong>
                <form action="/mesas/create" method="post">
                    @csrf
                    <input type='hidden' value='1' name="disponivel"/>
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-table"></i>
                                <label class="form-label" id="numMesa"  for="input">Mesa</label>
                                <input type="number" name="mesa" class="form-text">
                            </div>
                            <div class="form-row">
                            <i class="fas fa-user"></i>
                                <label class="form-label" id="numQtdeMesa" for="input">Capacidade</label>
                                <input type="number"  name="capacidade" class="form-text">
                            </div>
                            
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button class="btn btn-login" onclick="launch_toast()">Finalizar<i class="fas fa-arrow-right"></i></button>
                                <div id="toast">
                                    <div id="desc">Dado inserido com sucesso</div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#m1-c" class="link-2"></a>
    </div>
</div>
<!-- /modal Cadastro-->


<!-- modal Atualização -->
<div class="modal-container" id="modalAtualizar" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">table_bar</span>
                <strong>Atualize uma mesa</strong>   
                    <fieldset>
                        <input type="hidden" value="{{\Auth::user()->id}}" id="restId"/>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-table"></i>
                                <label class="form-label" for="input">Mesa</label>
                                <input type="number" name="mesa" id="mesa" class="form-text">
                            </div>
                            <div class="form-row">
                            <i class="fas fa-user"></i>
                                <label class="form-label"  for="input">Capacidade</label>
                                <input type="number"  name="capacidade" id="capacidade" class="form-text">
                            </div>
                            
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button class="btn btn-login" onclick="atualizarMesa(event)">Finalizar<i class="fas fa-arrow-right"></i></button>
                                <div id="toast">
                                    <div id="desc">Dado inserido com sucesso</div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
            </div>
        </div>
        </p>
        <a href="#m1-c" class="link-2"></a>
    </div>
</div>
<!-- /modal Atualizacao -->

<!-- Modal inativar-->
<div class="modal-container" id="modalInativar" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <strong>Esse dado será reativado. Os usuário poderão ve-lo novamente. Deseja reativar?</strong>

                <div class="button-center">
            <a href="" class="button button__link">Não</a>
            <a href="" onclick="inativarMesa(event)" class="button button__link">Sim</a>
        </div>
            </div>
        </div>
        </p>
        <a href="#!" class="link-2"></a>
    </div>
</div>
<!-- Modal inativar-->

<!-- Modal reativar-->
<div class="modal-container" id="modalReativar" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <strong>Esse dado será reativado. Os usuário poderão ve-lo novamente. Deseja reativar?</strong>

                <div class="button-center">
            <a href="" class="button button__link">Não</a>
            <a href="" onclick="reativarMesa(event)" class="button button__link">Sim</a>
        </div>
            </div>
        </div>
        </p>
        <a href="#!" class="link-2"></a>
    </div>
</div>
<!-- Modal reativar-->

<!-- Modal exclusao-->
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
            <a href="" onclick="deletarMesa(event)" class="button button__link">Sim</a>
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
                <p>hey, <b>{{Auth::user()->name}}</b></p>
                <small class="text-muted">Admin</small>
                
            </div>
            <div class="profile-photo">
                <img src="/img/logos/atlanticSemfundo.png">
            </div>
        </div>
    </div>
    <!------------------- end recent updates --------------------->
    <a href="#modalMesa">
        <div class="sales-analytics">
            <div class="item add-product">
                <div class="icon">
                    <span class="material-icons-sharp">event</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Cadastrar nova mesa</h3>
                        <smal class="text-muted">1 de 7 cadastrados</smal>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>
<script>
    var id;
    function abreModal(x){
        id = x;

        console.log(id)
    }


    async function deletarMesa(e){
        e.preventDefault();
        console.log('deletar mesa', id)

        await fetch('/api/mesas/destroy/'+id,{
             method: 'DELETE',
        })
        .then((resp) =>{
            if(resp.ok){
                window.location.href = '/mesas/create'
                alert('destruiu')
            }
        })
    }

    async function modalAtualizar(x){
        id = x;

        console.log(id)

        var mesa = document.getElementById('mesa')
        var cap = document.getElementById('capacidade')
        await fetch('/api/mesas/'+id,{
             method: 'GET',
             headers: { 'Content-Type': 'application/json' },
        })
        .then((resp) =>{
            if(resp.ok){
                return resp.json()
            }
        })
        .then((data) =>{
            mesa.value = data.mesa
            cap.value = data.capacidade
        })
    }


    async function atualizarMesa(e){     
        e.preventDefault();
        console.log('atualizar mesa', id)

        var mesa = document.getElementById('mesa').value
        var cap = document.getElementById('capacidade').value
        var restId = document.getElementById('restId').value

       

        console.log(mesa)
        console.log(cap)
        console.log(restId)

        await fetch('/api/mesas/atualizar/'+id,{
             method: 'PUT',
             headers: { 'Content-Type': 'application/json' },
             body: JSON.stringify({ mesa: mesa, capacidade:cap, id: restId })
        })
        .then((resp) =>{
            if(resp.ok){
                window.location.href = '/mesas/create'
                alert('atualizado')
            }
        })
    }



    async function inativarMesa(e){     
        e.preventDefault();
        console.log('inativar mesa', id)

        await fetch('/api/mesas/inativar/'+id,{
             method: 'PATCH',
        })
        .then((resp) =>{
            if(resp.ok){
                window.location.href = '/mesas/create'
                alert('inativado')
            }
        })
    }

    async function reativarMesa(e){
        e.preventDefault();
        console.log('deletar mesa', id)

        await fetch('/api/mesas/reativar/'+id,{
             method: 'PATCH',
        })
        .then((resp) =>{
            if(resp.ok){
                window.location.href = '/mesas/create'
                alert('reativou')
            }
        })
    }


</script>

@endsection