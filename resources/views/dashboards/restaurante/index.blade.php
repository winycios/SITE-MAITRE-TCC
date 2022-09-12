@extends('layouts.restaurante-adm')
@section('content')
<main>
    <h1>Reservas do dia</h1>

    <div class="insights">
        <div class="sales">
            <div class="middle">
                <div class="left">
                    <h3>Total de reservas(hoje)</h3>
                    <h1>{{$reservasHoje->id}}</h1>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-----------------end sales----------------->
        <div class="expenses">
            <div class="middle">
                <div class="left">
                    <h3>Porcentagem de mesas disponíveis</h3>
                    <h1>{{number_format((float)$mesasDisponiveis, 2, '.', '')}} %</h1>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-----------------end of expenses----------------->
    </div>
    <!---------------- end insights ---------------->
    <div class="containerNoti">
        <h1>Últimas reservas feitas</h1>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Nome do cliente</div>
                <div class="col col-2">Email do Cliente</div>
                <div class="col col-3">telefone</div>
                <div class="col col-4">Status</div>
            </li>
            @foreach($reservas as $r)
               
                    
                        <li class="table-row">
                            <input type="hidden" value="{{$r->id}}" id="id">
                            <div class="col col-1" data-label="Nome do cliente">{{$r->nome}}</div>
                            <div class="col col-2" data-label="Email Cliente">{{$r->email}}</div>
                            <div class="col col-3" data-label="Telefone">{{$r->descFone}}</div>
                            @if($r->status_reserva_id == 1)                   
                                <div class="col col-4" data-label="Status">
                                    <a href="#modal" onclick="carregaModal({{$r->id}})">
                                        <span class="warning" id="status{{$r->id}}">Pendente</span>
                                    </a>
                                </div>
                            @elseif($r->status_reserva_id == 2)
                                <div class="col col-4" data-label="Status">
                                    <a href="#modalInfo" onclick="carregaModal({{$r->id}})">
                                        <span class="success" id="status{{$r->id}}">Aprovado</span>
                                    </a>
                                </div>
                            @else
                                <div class="col col-4" data-label="Status">
                                    <a href="#modalInfo" onclick="carregaModal({{$r->id}})">
                                        <span class="danger" id="status{{$r->id}}">Cancelado</span>
                                    </a>
                                </div>
                            @endif  
                        </li>
                    

            @endforeach

           
        </ul>
    </div>


    <div class="recent-orders">
        <h2 class="text-muted">Reservas finalizadas</h2>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nome do cliente</th>
                    <th>Email do cliente</th>
                    <th>Telefone</th>
                    <th>Dia Reserva</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $r)
                    @if($r->status_reserva_id == 6)
                        <tr>
                            <td data-label="Nome">{{$r->nome}}</td>
                            <td data-label="Email">{{$r->email}}</td>
                            <td data-label="Telefone">{{$r->descFone}}</td>
                            <td data-label="Dia da Reserva">{{$r->horario}}</td>
                        </tr>
                    @else
                    <tr>
                        <td data-label="Nome">@php echo '&nbsp' @endphp</td>
                        <td data-label="Email">@php echo '&nbsp' @endphp</td>
                        <td data-label="Telefone">@php echo '&nbsp' @endphp</td>
                        <td data-label="Dia da Reserva">@php echo '&nbsp' @endphp</td>
                    </tr>
                    @endif  
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
                <img src="/img/logos/atlanticSemFundo.png">
            </div>
        </div>
    </div>
    <!--end top-->
    
    <div class="sales-analytics">
        <h2 class="text-muted">Opção de conta</h2>
        
        <a href="#exclusao">
            <div class="item offline">
                <div class="icon">
                    <span class="material-icons-sharp">delete_forever</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Excluir restaurante</h3>
                    </div>
                </div>
            </div>
        </a>
        <a href="/restaurantes/premium">
            <div class="item customers">
                <div class="icon">
                    <span class="material-icons-sharp">upgrade</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3><div class="text-muted">Plano atual:</div> <div class="plano">básico</div></h3>
                        <smal class="text-muted">Aumentar plano</smal>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>

<!-- Modal Dados-->
<div class="modal-wrapper" id="modal">
    <div class="modal-body card">
        <div class="modal-header">
            <h2 class="heading">Dados da reserva</h2>
            <a href="#!" role="button" class="close" aria-label="close this modal">
                <svg viewBox="0 0 24 24">
                    <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                </svg>
            </a>
        </div>

        <div class="central">
            <h3>Nome completo: <span class="text-muted" id="nome"> Winycios alves nascimento </span></h3>
        </div>
        <div class="central">
            <h3>Email : <span class="text-muted" id="email"> 527.690.598-31 </span></h3>
        </div>
        <div class="central">
            <h3>Telefone : <span class="text-muted" id="telefone"> (11) 946233-4046 </span></h3>
        </div>
        <div class="central">
            <h3>Data reserva : <span class="text-muted" id="data"> 13/09/2004 </span></h3>
        </div>
        <div class="central">
            <h3>Horario da Reserva : <span class="text-muted" id="horario"> 13:30 </span></h3>
        </div>
        <div class="central">
            <h3>Quantidade de pessoas : <span class="text-muted" id="qtd"> 5 </span></h3>
        </div>



        <div class="button-center">
            <a href="" class="button button__link">Voltar</a>
            <a href="#popup" class="button button__link">Avançar</a>
        </div>
    </div>
    <a href="#!" class="outside-trigger"></a>
</div>

<!-- end Modal Dados-->

<!-- Modal Info -->
<div class="modal-wrapper" id="modalInfo">
    <div class="modal-body card">
        <div class="modal-header">
            <h2 class="heading">Dados da reserva</h2>
            <a href="#!" role="button" class="close" aria-label="close this modal">
                <svg viewBox="0 0 24 24">
                    <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                </svg>
            </a>
        </div>

        <div class="central">
            <h3>Nome completo: <span class="text-muted" id="nome2"> Winycios alves nascimento </span></h3>
        </div>
        <div class="central">
            <h3>Email : <span class="text-muted" id="email2"> 527.690.598-31 </span></h3>
        </div>
        <div class="central">
            <h3>Telefone : <span class="text-muted" id="telefone2"> (11) 946233-4046 </span></h3>
        </div>
        <div class="central">
            <h3>Data reserva : <span class="text-muted" id="data2"> 13/09/2004 </span></h3>
        </div>
        <div class="central">
            <h3>Horario da Reserva : <span class="text-muted" id="horario2"> 13:30 </span></h3>
        </div>
        <div class="central">
            <h3>Quantidade de pessoas : <span class="text-muted" id="qtd2"> 5 </span></h3>
        </div>



        <div class="button-center">
            <a href="" class="button button__link">Fechar</a> 
        </div>
    </div>
    <a href="#!" class="outside-trigger"></a>
</div>
<!-- End Modal Info -->


<!-- Modal Input-->
<div class="popup" id="popup">
    <div class="popup-inner">
        <div class="popup__photo">
            <table class="rwd-table">
                <tr>
                    <th>Mesas</th>
                    <th>Cadeira por mesa</th>
                </tr>
                <tr>
                    <td data-th="Mesas">
                        <ul id="mesas"></ul>
                    </td>
                    <td data-th="Qtde">
                        <ul id="assentos"></ul>
                    </td>
                </tr>
                <tfoot class="rwd-table">
                    <tr>
                        <th id="totalMesas">Total de mesas selecionadas: 0</th>
                    </tr>
                    <tr>
                        <th id="totalAssentos">Total de assentos: 0</th>
                    </tr>
                   
                </tfoot>
            </table>
            <h4>Mesas adicionadas</h4>

        </div>
        <div class="popup__text">
            <div class="central">
                <h3>Nome completo: <span class="text-muted" id="nome1"> Winycios alves nascimento </span></h3>
            </div>
            <div class="central">
                <h3>Email : <span class="text-muted" id="email1"> 527.690.598-31 </span></h3>
            </div>
            <div class="central">
                <h3>Telefone : <span class="text-muted" id="telefone1"> (11) 946233-4046 </span></h3>
            </div>
            <div class="central">
                <h3>Data reserva : <span class="text-muted" id="data1"> 13/09/2004 </span></h3>
            </div>
            <div class="central">
                <h3>Horario da Reserva : <span class="text-muted" id="horario1"> 13:30 </span></h3>
            </div>
            <div class="central">
                <h3>Quantidade de pessoas : <span class="text-muted" id="qtd1"> 5 </span></h3>
                <input type="hidden" value="" id="qtdP">
            </div>
    
            <form id="contact_form">
                <div class="name">
                    <label for="name">
                        <h3>Duração da reserva</h3>
                    </label>
                    <input type="time" name="duracao" id="duracao" required>
                </div>
                <p class='subject'>
                    <label class='label' for='select'></label>
                    <select placeholder="Selecione a quantidade de mesas" id="selectMesa" name="txMesas">
                        <option selected value="0">Mesas disponiveis no momento:</option>
                        @foreach($mesas as $m)
                            <option value='{{$m->id}}, {{$m->capacidade}}, {{$m->mesa}}'>Mesa {{$m->mesa}} = {{$m->capacidade}}</option>
                        @endforeach
                    </select>
                <div style="display:inline-flex; gap: 10px;">
                    <span class="button button__link" id="btn" onclick="addMesa()">Cadastrar</span>
                    <span class="button button__link" id="btnClear" onclick="limpar()">Limpar</span>
                </div>
                </p>
                <div class="button-center">
                    <a href="#!" onclick="rejeitarReserva()" class="button button__link">Rejeitar reserva</a>
                    <a onclick="aprovarReserva(event)" class="button button__link">Confirmar reserva</a>
                </div>
            </form>
            <div id="toast">
                <div id="desc">Reserva feita com sucesso</div>
            </div>
        </div>
        <a class="popup__close" href="#">X</a>
    </div>
</div>



<!-- modal inativo -->
<div class="modal-container" id="inativar" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <strong>tem certeza ?</strong>
                <form>
                    <fieldset>
                        <span class="create-account"></span>
                        <p>Esse restaurante será inativado por tempo identerminado ou até que o dono desse estabelecimento entre em contato com os administradores da maître. tem certeza disso ?</p>
                        <span class="create-account"></span>
                        <div class="form-row button-login long">
                            <a href="/login"><button class="btn btn-login">Não</button></a>
                            <a href="#!"><button class="btn btn-login">Inativar<i class="fas fa-arrow-right"></i></button></a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#m!" class="link-2"></a>
    </div>
</div>
<!-- /modal inativo -->

<!-- Modal Exclusao-->
<div class="modal-container" id="exclusao" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <strong>tem certeza ?</strong>
                <form>
                    <fieldset>
                        <span class="create-account"></span>
                        <p>Esse restaurante será excluido permanentemente, tem certeza ?</p>
                        <span class="create-account"></span>
                        <div class="form-row button-login long">
                            <a href="/login"><button class="btn btn-login">Não</button></a>
                            <a href="#!"><button class="btn btn-login">Excluir<i class="fas fa-arrow-right"></i></button></a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#m1-c" class="link-2"></a>
    </div>
</div>





@endsection