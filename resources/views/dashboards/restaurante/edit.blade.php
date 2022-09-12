@extends('layouts.restaurante-adm')
@section('content')


<main>
    <div class="recent-orders">
        <h1>informações do restaurante</h1>


        <section style="padding: 60px 0;">
            <div class="containerImg mt-5">
                <div class="php-email-form">
                    <div class="abriModal" style="margin-top: 20px;">
                        <a href="#modalNome">
                            <div class="itemJun">
                                <div class="right">
                                    <div class="info">
                                        <h3>Restaurante</h3>
                                        <smal class="text-muted">
                                            <h2>{{$restaurante->nome}}</h2>
                                        </smal>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <img class="img" id="preview" src="/storage/{{$restaurante->foto}}">
                    <form class="form-upload" action="" method="post" role="form">
                        <label class="input-personalizado">
                            <span class="botao-selecionar">Trocar foto</span>
                            <img class="imagem" />
                            <input type="file" class="input-file" id="img-input" name="imagem" accept="image/*">
                            <input type="submit" class="input-file">
                        </label>
                        <button class="btn btn-login rest" disabled onclick="launch_toast()">Salvar<i class="fas fa-arrow-right"></i></button>
                    </form>
                    <div class="form-row button-login long">
                        <a href="/horarios/create"><button class="btn buttonLocation">Horários<i class="fas fa-arrow-right"></i></button></a>
                        <a href="/pratos/cardapio"><button class="btn buttonLocation">Pratos<i class="fas fa-arrow-right"></i></button></a>
                    </div>
                </div>
                <div id="toast">
                    <div id="desc">Foto atualizada com sucesso</div>
                </div>
        </section>

        <div class="insights">
            <div class="middle">
                <div>
                    <div class="itemJun">
                        <a class="abriModal" href="#categoria">
                            <div class="icon">
                                <span class="material-icons-sharp">category</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Categoria</h3>
                                    <smal class="text-muted">{{$restaurante->categoria}}</smal>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="itemJun">
                        <a class="abriModal" href="#modalTelefone">
                            <div class="icon">
                                <span class="material-icons-sharp">contact_page</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Telefone</h3>
                                    <smal class="text-muted">Ultimo vez online 1 horas</smal>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="itemJun">
                        <a class="abriModal" href="#modalEndereco">
                            <div class="icon">
                                <span class="material-icons-sharp">navigation</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Endereço</h3>
                                    <smal class="text-muted">{{$restaurante->endereco}}</smal>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="itemJun">
                        <a class="abriModal" href="#modalEndereco">
                            <div class="icon">
                                <span class="material-icons-sharp">edit_location</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>CEP</h3>
                                    <smal class="text-muted">{{$restaurante->cep}}</smal>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="sales">
                <div>
                    <div class="itemJun">
                        <a class="abriModal" href="#modalEndereco">
                            <div class="icon">
                                <span class="material-icons-sharp">pin_drop</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Bairro</h3>
                                    <smal class="text-muted">{{$restaurante->bairro}}</smal>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="itemJun">
                        <a class="abriModal" href="#modalEndereco">
                            <div class="icon">
                                <span class="material-icons-sharp">location_city</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Cidade</h3>
                                    <smal class="text-muted">{{$restaurante->cidade}}</smal>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="itemJun">
                        <a class="abriModal" href="#modalEndereco">
                            <div class="icon">
                                <span class="material-icons-sharp">map</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Estado</h3>
                                    <smal class="text-muted">{{$restaurante->estado}}</smal>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="itemJun">
                        <a class="abriModal" href="#modalEndereco">
                            <div class="icon">
                                <span class="material-icons-sharp">looks_one</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Número</h3>
                                    <smal class="text-muted">{{$restaurante->numero}}</smal>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                <img src="/img/logos/atlanticSemfundo.png">
            </div>
        </div>
    </div>
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>


<div class="modal-container" id="modalTelefone" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">
        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">inventory</span>
                <strong>Contato do restaurante</strong>
                <form>
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                            <i class="fas fa-address-book"></i>
                                <label class="form-label" for="input">Nome de contato</label>
                                <input type="text" id="txContato" name="txContato" class="form-text">
                            </div>
                            <div class="form-row">
                                <i class="fas fa-list-ol"></i>
                                <label class="form-label" for="input">Telefone</label>
                                <input type="text" id="txTel" name="txTel" class="form-text">
                            </div>

                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button class="btn btn-login">Finalizar<i class="fas fa-arrow-right"></i></button>
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

<!-- /modal telefone -->


<!-- modal categoria -->
<div class="modal-container" id="categoria" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">event</span>
                <strong>Atualizar catégoria</strong>
                <form action="/restaurantes/edit/{{$restaurante->id}}" method="post">
                    @csrf
                    @method('put')
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-calendar-check"></i>
                                <label class="form-label" for="input">Dias</label>
                                <select class="form-text" name="txDia" id='link'>
                                    <option selected value="0">Escolha a categoria:</option>
                                
                                    @foreach($categorias as $c)
                                        <option value="{{$c->id}}">{{$c->categoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button type="submit" class="btn btn-login">Finalizar<i class="fas fa-arrow-right"></i></button>
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


<!-- modal endereço -->
<div class="modal-container" id="modalEndereco" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">inventory</span>
                <strong>Dados do restaurante</strong>
                <form action="/restaurantes/edit/{{$restaurante->id}}" method="POST">
                    @csrf
                    @METHOD('PUT')
                    <fieldset>
                        <div class="form">
                            <div class="line">
                                <div class="form-row">
                                    <i class="fas fa-hashtag"></i>
                                    <label class="form-label" for="input">CEP</label>
                                    <input type="text" id="cep" name="cep" class="form-text">
                                </div>
                                <div class="form-row">
                                    <i class="fas fa-hashtag"></i>
                                    <label class="form-label" for="input">número residencial</label>
                                    <input type="number" id="numRes" name="numero" class="form-text">
                                </div>
                            </div>
                            <div class="line">
                                <div class="form-row">
                                    <i class="fas fa-street-view"></i>
                                    <label class="form-label" for="input">Bairro</label>
                                    <input type="text" id="bairro" name="bairro" class="form-text">
                                </div>
                                <div class="form-row">
                                    <i class="fas fa-city"></i>
                                    <label class="form-label" for="input">Estado</label>
                                    <input type="text" id="uf" name="estado" class="form-text">
                                </div>
                            </div>
                            <div class="line">
                                <div class="form-row">
                                    <i class="fas fa-map-pin"></i>
                                    <label class="form-label" for="input">Cidade</label>
                                    <input type="cidade" id="cidade" class="form-text">
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <i class="fas fa-map"></i>
                                <label class="form-label" for="input">Endereço</label>
                                <input type="text" id="endereco" name="endereco" class="form-text">
                            </div>
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button type="submit" class="btn btn-login">Finalizar<i class="fas fa-arrow-right"></i></button>
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

<!-- /modal endereco -->

<!-- modal nome -->
<div class="modal-container" id="modalNome" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">inventory</span>
                <strong>Alteração do nome</strong>
                <form action="/restaurantes/edit/{{$restaurante->id}}" method="POST">
                    @csrf
                    @METHOD('PUT')
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-file-signature"></i>
                                <label class="form-label" for="input">Novo nome do estabelecimento</label>
                                <input type="text" id="nomeRest" name="nome" class="form-text">
                            </div>
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button class="btn btn-login">Finalizar<i class="fas fa-arrow-right"></i></button>
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


@endsection