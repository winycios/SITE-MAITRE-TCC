@extends('layouts.restaurante-adm')
@section('content')
<main>
    <div class="containerNoti">
      <h1>Ultimos pedidos de reservas</h1>
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">Nome do cliente</div>
          <div class="col col-2">Email Cliente</div>
          <div class="col col-3">telefone</div>
          <div class="col col-4">Status</div>
        </li>
        @foreach($reservas as $r)
        <a href="#modal" onclick="carregaModal()">
          <li class="table-row">
            <input type="hidden" value="{{$r->id}}" id="id">
            <div class="col col-1" data-label="Nome do cliente">{{$r->nome}}</div>
            <div class="col col-2" data-label="Email Cliente">{{$r->email}}</div>
            <div class="col col-3" data-label="Telefone">$341</div>
            @if($r->status_reserva_id == 1)
              <div class="col col-4" data-label="Status"><span class="warning" id="status">Pendente</span></div>
            @elseif($r->status_reserva_id == 2)
              <div class="col col-4" data-label="Status"><span class="success" id="status">Aprovado</span></div>
            @else
            <div class="col col-4" data-label="Status"><span class="danger" id="status">Cancelado</span></div>
            @endif  
          </li>
        </a>
        @endforeach
      </ul>
    </div>
  
  
    <div class="recent-orders">
    <h1>Ultimas reservas feitas</h1>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
      <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Nome do cliente</th>
            <th>Cpf do cliente</th>
            <th>Telefone</th>
            <th>Dia Reserva</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Winycios</td>
            <td>111.111.111-86</td>
            <td>11 911111-1111</td>
            <td>13/09/2004</td>
          </tr>
        </tbody>
      </table>
      <script>
        $(document).ready(function() {
          $('#example').DataTable();
        });
      </script>
    </div>
  </main>
  
  <!-- Modal -->
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
        <h3>Telefone : <span class="text-muted"> (11) 946233-4046 </span></h3>
      </div>
      <div class="central">
        <h3>Dia reserva : <span class="text-muted" id="data"> 13/09/2004 </span></h3>
      </div>
      <div class="central">
        <h3>Dia semana : <span class="text-muted" id="diaSemana"> Segunda </span></h3>
      </div>
      <div class="central">
        <h3>Horario da Reserva : <span class="text-muted" id="horario"> 13:30 </span></h3>
      </div>
      <div class="central">
        <h3>Quantidade de pessoas : <span class="text-muted" id="qtd"> 5 </span></h3>
      </div>
  
  
  
      <div class="button-center">
        <a href="" class="button button__link">Voltar</a>
        <a href="#modalInput" class="button button__link">Avançar</a>
      </div>
    </div>
    <a href="#!" class="outside-trigger"></a>
  </div>
  
  
  <!-- Modal Input-->
  <div class="modal-wrapper" id="modalInput">
    <div class="modal-body card">
      <div class="modal-header">
        <h2 class="heading">Confirmar reserva</h2>
        <a href="#!" role="button" class="close" aria-label="close this modal">
          <svg viewBox="0 0 24 24">
            <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
          </svg>
        </a>
      </div>
      <div class="central">
        <h3>Nome completo: <span class="text-muted"> Winycios alves nascimento </span></h3>
      </div>
      <div class="central">
        <h3>Cpf : <span class="text-muted"> 527.690.598-31 </span></h3>
      </div>
      <div class="central">
        <h3>Telefone : <span class="text-muted"> (11) 946233-4046 </span></h3>
      </div>
      <div class="central">
        <h3>Data reserva : <span class="text-muted"> 13/09/2004 </span></h3>
      </div>
      <div class="central">
        <h3>Horario da Reserva : <span class="text-muted"> 13:30 </span></h3>
      </div>
      <div class="central">
        <h3>Quantidade de pessoas : <span class="text-muted"> 5 </span></h3>
      </div>
  
      <form action="/reservas/aprovar/{{$reservas[0]->id}}" method="post" id="contact_form">
        @csrf 
        @method('PATCH')
        <input type="hidden" name="status_reserva_id" value="2">
        <div class="name">
          <label for="name">
            <h3>Duração da reserva</h3>
          </label>
          <input type="time" name="txDuReserva" id="txDuReserva" required>
        </div>
        <p class='subject'>
          <label class='label' for='select'></label>
          <select placeholder="Dia da semana" name="txMesas">
            <option selected value="0">Mesas disponiveis no momento:</option>
            <option select value="1">SEGUNDA-FEIRA</option>
          </select>
        </p>
        <div class="button-center">
            
          <a href="#" class="button button__link" onclick="rejeitarReserva()">Rejeitar reserva</a>
          <button class="button button__link" onclick="launch_toast()">Confirmar reserva</button>
        </div>
      </form>
      <div id="toast">
        <div id="desc">Reserva feita com sucesso</div>
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
          <img src="/img/logos/atlanticSemfundo.png">
        </div>
      </div>
    </div>
    <!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
  </div>

@endsection