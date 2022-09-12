@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<img src="/img/bem.jpg" style="width: 100%; height:18vh;" alt="">

    <section id="contact" class="contact">
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <div class="containerForm">
            <div class="content first-content">
                <div class="first-column">
                    <h2 class="title title-primary">Seja bem-vindo</h2>
                    <p class="description description-primary">Você esta se cadastrando como usuário</p>
                    <p class="description description-primary">Gostaria de cadastrar-se como restaurante ?
                        clique abaixo</p>
                    <button id="signin" class="btn btn-primary">Cadastrar como dono</button>
                    <p class="description description-primary">Voltar para tela de login ? </p>
                    <a href="/login"><button class="btn btn-primary">Voltar(login)</button></a>
                </div>
                <div class="second-column">
                    <h2 class="title title-second">Cadastro como usuário</h2>
                    <div class="social-media">
                        <ul class="list-social-media">
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-facebook-f"></i>
                                </li>
                            </a>
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-google-plus-g"></i>
                                </li>
                            </a>
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-linkedin-in"></i>
                                </li>
                            </a>
                        </ul>
                    </div><!-- social media -->
                    <p class="description description-second">Crie sua conta como usuário :</p>
                    <form action="/create/user" method="post" role="form" class="formCadas" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="level" value="1">

                        <p class="password">DADOS DO USUÁRIO</p>
                        <div class="form-content">
                            <label class="label-input" for="">
                                <i class="far fa-user icon-modify"></i>
                                <input type="text" name="nome" id="nome" placeholder="Nome do usuário">
                            </label>
                            <label class="label-input" for="">
                                <i class="fa-solid fa-phone-volume icon-modify"></i>
                                <input type="text" name="fone" id="tel" placeholder="Telefone(contato)">
                            </label>
                        </div>
                        <div class="form-content">
                            <label class="label-input" for="">
                                <i class="fa-solid fa-clipboard-list icon-modify"></i>
                                <input type="text" name="cpf" id="cpf" placeholder="CPF do usuário">
                            </label>
                            <label class="label-input" for="">
                                <i class="fa-solid fa-at icon-modify"></i>
                                <input type="email" name="email" id="email" placeholder="email do usuário">
                            </label>
                        </div>
                        <div class="form-content">
                            <label class="label-input">
                                <i class="fa-solid fa-user icon-modify"></i>
                                <span class="botao-selecionar">Foto de perfil</span>
                                <input type="file" name="foto" id="foto" class="input-file" accept="image/*">
                            </label>
                        </div>
                        <div class="form-content">
                            <label class="label-input" for="">
                                <i class="fas fa-lock icon-modify"></i>
                                <input type="password" name="password"  id="password-field" placeholder="Senha">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </label>
                            <label class="label-input" for="">
                                <i class="fas fa-lock icon-modify"></i>
                                <input type="password" name="password_confirmation" id="password-field2" placeholder="Confirmar Senha">
                                <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </label>
                        </div>
                        <p class="password">CADASTRO DE ENDEREÇO</p>
                        <div class="form-content">
                            <label class="label-input" for="">
                                <i class="fa-solid fa-house-flag icon-modify"></i>
                                <input type="text" name="cep" id="cep" placeholder="CEP :">
                            </label>
                            <label class="label-input" for="">
                                <i class="fa-solid fa-building-columns icon-modify"></i>
                                <select id="estado" name="estado">
                                    <option>Estado:</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-content">
                            <label class="label-input" for="">
                                <i class="fa-solid fa-building-circle-arrow-right icon-modify"></i>
                                <input type="text" name="bairro" id="bairro" placeholder="Bairro :">
                            </label>
                            <label class="label-input" for="">
                                <i class="fa-solid fa-city icon-modify"></i>
                                <input type="text" name="cidade" id="cidade" placeholder="Cidade :">
                            </label>
                        </div>
                        <div class="form-content">
                            <label class="label-input" for="">
                                <i class="fa-solid fa-road icon-modify"></i>
                                <input type="text" name="endereco" id="rua" placeholder="Rua :">
                            </label>
                            <label class="label-input" for="">
                                <i class="fa-solid fa-house-user icon-modify"></i>
                                <input type="number" name="numero" id="num" placeholder="Número residencial :">
                            </label>
                        </div>
                        <button class="btn btn-second">Cadastrar dados</button>
                    </form>
                </div><!-- second column -->
            </div><!-- first content -->

            <div class="content second-content">
                <div class="first-column">
                    <h2 class="title title-primary">Seja bem-vindo</h2>
                    <p class="description description-primary">Você esta se cadastrando como dono de restaurante
                    </p>
                    <p class="description description-primary">Gostaria de cadastrar-se como usuário ? clique
                        abaixo</p>
                    <button id="signup" class="btn btn-primary">Cadastrar como usuário</button>
                    <p class="description description-primary">Voltar para tela de login ? </p>
                    <a href="./login.php"><button class="btn btn-primary">Voltar(login)</button><a>
                </div>
                <div class="second-column">
                    <h2 class="title title-second">Cadastro como dono</h2>
                    <div class="social-media">
                        <ul class="list-social-media">
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-facebook-f"></i>
                                </li>
                            </a>
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-google-plus-g"></i>
                                </li>
                            </a>
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-linkedin-in"></i>
                                </li>
                            </a>
                        </ul>
                    </div><!-- social media -->
                    <p class="description description-second">Crie sua conta como dono de restaurante :</p>
                    <form action="/create/user" method="post" role="form" class="formCadas" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="level" value="2">
                        <p class="password">DADOS DO DONO</p>
                        <div class="form-content">
                            <label class="label-input" for="">
                                <i class="far fa-user icon-modify"></i>
                                <input type="text" name="nome" id="nomeDono" placeholder="Nome do usuário">
                            </label>
                            <label class="label-input" for="">
                                <i class="fa-solid fa-at icon-modify"></i>
                                <input type="email" name="email" id="emailDono" placeholder="email do usuário">
                            </label>
                        </div>
                        <div class="form-content">
                            <label class="label-input" for="">
                                <i class="fas fa-lock icon-modify"></i>
                                <input type="password" name="password" id="passwordDono" placeholder="Senha">
                                <span toggle="#passwordDono" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right: 5px;"></span>
                            </label>
                            <label class="label-input" for="">
                                <i class="fas fa-lock icon-modify"></i>
                                <input type="password" name="password_confirmation" id="passwordDono2" placeholder="Confirmar Senha">
                                <span toggle="#passwordDono2" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right: 5px;"></span>
                            </label>
                        </div>
                        
                        <!--
                        <button class="btn btn-second">Continuar cadastro</button>
-->
                        <button type="submit" class="btn btn-second"><a style="color:black">Cadastrar</a></button>
                    </form>
                </div><!-- second column -->
            </div><!-- second-content -->
        </div>
    </section><!-- End Contact Section -->
@endsection