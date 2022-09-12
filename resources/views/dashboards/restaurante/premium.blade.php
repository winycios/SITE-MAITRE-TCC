@extends('layouts.restaurante-adm')
@section('content')

<main>
    <div class="containerNoti">
        <h1>Nossos pacotes</h1>
        <div class="pricing-container">
            <div class="pricing-switcher">
                <p class="fieldset">
                    <input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
                    <label for="monthly-1">Mensal</label>
                    <input type="radio" name="duration-1" value="yearly" id="yearly-1">
                    <label for="yearly-1">Anual</label>
                    <span class="switch"></span>
                </p>
            </div>
            <ul class="pricing-list bounce-invert">
                <li>
                    <ul class="pricing-wrapper">
                        <li data-type="monthly" class="is-visible">
                            <header class="pricing-header">
                                <h2>Básico</h2>
                                <div class="price">
                                    <span class="currency">R$</span>
                                    <span class="text">grátis</span>
                                    <span class="duration">mês</span>
                                </div>
                            </header>
                            <div class="pricing-body">
                                <ul class="pricing-features">
                                    <li><em></em> Cadastro de restaurante</li>
                                    <li><em></em> Area de ADM</li>
                                    <li><em>25(semanal)</em> Reservas</li>
                                    <li><em></em> Suporte</li>
                                    <li>--</li>
                                    <li>--</li>
                                    <li>--</li>
                                </ul>
                            </div>
                            @if($rest->level == 1)
                                <footer class="pricing-footer">
                                    <a class="select">Em Uso</a>
                                </footer>
                            @else
                                <footer class="pricing-footer">
                                    <a class="select" href="#modal">Cancelar</a>
                                </footer>
                            @endif
                        </li>
                        <li data-type="yearly" class="is-hidden">
                            <header class="pricing-header">
                                <h2>Básico</h2>
                                <div class="price">
                                    <span class="currency">R$</span>
                                    <span class="text">grátis</span>
                                    <span class="duration">ano</span>
                                </div>
                            </header>
                            <div class="pricing-body">
                                <ul class="pricing-features">
                                    <li><em></em> Cadastro de restaurante</li>
                                    <li><em></em> Area de ADM</li>
                                    <li><em>25(semanal)</em> Reservas</li>
                                    <li><em></em> Suporte</li>
                                    <li>--</li>
                                    <li>--</li>
                                    <li>--</li>

                                </ul>
                            </div>
                            @if($rest->level == 1)
                                <footer class="pricing-footer">
                                    <a class="select">Em Uso</a>
                                </footer>
                            @else
                                <footer class="pricing-footer">
                                    <a class="select" href="#modal">Cancelar</a>
                                </footer>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="exclusive">
                    <ul class="pricing-wrapper">
                        <li data-type="monthly" class="is-visible">
                            <header class="pricing-header">
                                <h2>Premium</h2>
                                <div class="price">
                                    <span class="currency">R$</span>
                                    <span class="value">40.00</span>
                                    <span class="duration">mês</span>
                                </div>
                            </header>
                            <div class="pricing-body">
                                <ul class="pricing-features">
                                    <li><em></em> Cadastro de restaurante</li>
                                    <li><em></em> Area de ADM</li>
                                    <li><em>Ilimitado</em> Reservas</li>
                                    <li><em>24 horas</em> Suporte</li>
                                    <li><em></em> Gráficos inteligentes</li>
                                    <li><em></em> Restaurante em destaques</li>
                                    <li><em></em> Primeira indicação de restaurantes</li>
                                </ul>
                            </div>
                            @if($rest->level == 1)
                                <footer class="pricing-footer">
                                    <a class="select" href="#modalMesa">Aprimorar</a>
                                </footer>
                            @else
                                <footer class="pricing-footer">
                                    <a class="select">Em Uso</a>
                                </footer>
                            @endif
                        </li>
                        <li data-type="yearly" class="is-hidden">
                            <header class="pricing-header">
                                <h2>Premium</h2>
                                <div class="price">
                                    <span class="currency">R$</span>
                                    <span class="value">435.00</span>
                                    <span class="duration">ano</span>
                                </div>
                            </header>
                            <div class="pricing-body">
                                <ul class="pricing-features">
                                    <li><em></em> Cadastro de restaurante</li>
                                    <li><em></em> Area de ADM</li>
                                    <li><em>Ilimitado</em> Reservas</li>
                                    <li><em>24 horas</em> Suporte</li>
                                    <li><em></em> Gráficos inteligentes</li>
                                    <li><em></em> Restaurante em destaques</li>
                                    <li><em></em> Primeira indicação de restaurantes</li>
                                </ul>
                            </div>
                            @if($rest->level == 1)
                                <footer class="pricing-footer">
                                    <a class="select" href="#modalMesa">Aprimorar</a>
                                </footer>
                            @else
                                <footer class="pricing-footer">
                                    <a class="select">Em Uso</a>
                                </footer>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</main>
<!----------- end main ABERTA NO MENU.PHP ------------->

<div class="modal-container" id="modal" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <h2><b>
                    Ao cancelar o plano premium, seu restaurante irá parar de ser um dos primeiros a serem listados e você não terá mais acesso a gráficos e relátorios. Deseja cancelar?
                </b></h2>
                <div class="button-center">
            <a href="" class="button button__link">Não</a>
            <a href="" onclick="cancelarPlano(event, {{$rest->id}})" class="button button__link">Sim</a>
        </div>
            </div>
        </div>
        </p>
        <a href="#!" class="link-2"></a>
    </div>
</div>
<!-- Modal inativar-->

<!-- modal cadastro/atualização -->
<div class="modal-container" id="modalMesa" style="background: rgb(12 12 12 / 57%);">
    <div class="modalPay">
        <p class="modal__text">
        <div class="containerform">
                <div class="cardPay">
                    <div class="leftside">
                        <img src="/img/logos/atlanticCompleto.jpeg" class="product" alt="Shoes" />
                    </div>
                    <div class="rightside">
                        <form action="/restaurantes/premium/{{$rest->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <h1>Pagamento</h1>
                            <h2>Informações do cartão</h2>
                            <p>Nome </p>
                            <input type="text" class="inputbox" name="name" required />
                            <p>Número do cartão</p>
                            <input type="number" class="inputbox" name="card_number" id="card_number" required />

                            <p>Tipo do cartão</p>
                            <select class="inputbox" name="card_type" id="card_type" required>
                                <option value="">--Selecione o tipo do cartão--</option>
                                <option value="Visa">Visa</option>
                                <option value="MasterCard">MasterCard</option>
                            </select>
                            <div class="expcvv">

                                <p class="expcvv_text">Expiração</p>
                                <input type="date" class="inputbox" name="exp_date" id="exp_date" required />

                                <p class="expcvv_text2">CVV</p>
                                <input type="password" class="inputbox" name="cvv" id="cvv" required />
                            </div>
                            <p></p>
                            <button type="submit" class="buttonPay">Comprar</button>
                        </form>
                    </div>
                </div>

        </div>
        </p>
        <a href="#" class="link-2"></a>
    </div>
</div>
<!-- /modal Cadastro/atualizacao -->

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
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>
<script>

    async function cancelarPlano(e, id){
        e.preventDefault();
        await fetch('/api/restaurantes/premium/cancelar/'+id,{
             method: 'PATCH',
             headers: { 'Content-Type': 'application/json' },
        })
        .then((resp) =>{
            if(resp.ok){
                window.location.href = '/restaurantes/premium'
                alert('cancelou')
            }
        })
    }

</script>

@endsection