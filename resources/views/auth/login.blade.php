@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<img src="/img/bem.jpg" style="width: 100%; height:18vh;" alt="">
            <section id="book-a-table" class="book-a-table">
                <div class="containerForm">  
                        <div class="second-column">
                            <h2 class="title title-second">ENTRE COM SUA CONTA VINCULADA</h2>
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
                            <div class="section-title">
                                            <h4>ENTRE COM SEU EMAIL <span>E SENHA</span></h4>
                                        </div>
                            <form action="/login" method="post" class="form">
                                @csrf

                                <label class="label-input" for="">
                                    <i class="far fa-envelope icon-modify"></i>
                                    <input type="email" name="email" placeholder="Email">
                                </label>

                                <label class="label-input" for="">
                                                <i class="fas fa-lock icon-modify"></i>
                                                <input type="password" name="password" id="password-field2" placeholder="Senha">
                                                <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right: 5px;"></span>
                                            </label>
                                <ul class="confirmacoes">
                                    <li>
                                            <input type="checkbox">
                                        <label>Mantenha-me conectado.</label>
                                    </li>
                                </ul>
                                <a class="password" href="/forgot-password">Esqueceu a senha ?</a>
                                <button class="btn btn-second">ACESSAR</button>
                                <p>Não tem conta? <a class="msg" href="/register"> cadastre-se aqui</a></p>
                            </form>
                        </div><!-- second column -->
            </section><!-- End Book A Table Section -->

            <style>
            form ul {
                padding: 0;
                margin: 0;
                display: block;
            }

            label {
                margin-top: 11px;
            }

            form li {
                list-style: none;
                margin-bottom: 10px;
            }

            form h2 {
                font-size: 20px;
                color: #161616;
                padding: 0;
                margin: 0;
                margin-bottom: 20px;
            }

            .confirmacoes li {
                font-size: 14px;
                display: inline-flex;
            }

            .confirmacoes input {
                width: 16px;
                margin-right: 5px;
                position: relative;
            }
            </style>
            <!-- <div class="info-p">
                  <p>Já possui uma conta?<a href="login.php">Faça login</a></p>
                </div> -->


@endsection