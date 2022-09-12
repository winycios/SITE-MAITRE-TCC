@extends("layouts.index")

@section('content')
<img src="/img/bem.jpg" style="width: 100%; height:18vh;" alt="">

            <section id="contact" class="contact">

                <!--IMAGEM DO CLIENTE-->
                <div class="container mt-5">
                    <div class="php-email-form">
                        <div class="section-title">
                            <h2>Dados do <span>Usuario</span></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group ">
                                <div class="text-center">
                                    @if($cliente->foto != null)
                                        <img src="/storage/{{$cliente->foto}}" class="img-logo" alt="">
                                    @else
                                        <img src="{{$cliente->profile_photo_url}}" class="img-logo" alt="">

                                    @endif
                                    <form class="form-upload">
                                        <label class="input-personalizado">
                                            <span data-bs-toggle="modal" data-bs-target="#modalFoto" class="botao-selecionar">Trocar imagem de perfil</span>
                                            <img class="imagem" />
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 form-goup">
                                <div class=" container mt-5">
                                    <div class="rowLine">
                                        <div class=" info">
                                            <i class="bi bi-person-circle"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalNome">Nome</h4>
                                            <p>{{$cliente->nome}}</p>
                                        </div>

                                        <div class=" info">
                                            <i class="bi bi-telephone"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalTel">Seu telefone</h4>
                                            <p>{{$fone->descFone}}</p>
                                        </div>
                                        <div class=" info mt-4 mt-lg-0">
                                            <i class="fas fa-user-slash icon-modify"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalExcluirConta">Excluir conta</h4>
                                            <p data-bs-toggle="modal" data-bs-target="#modalExcluirConta" class="altSenha">apagar conta</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 form-goup">
                                <div class="container mt-5">
                                    <div class="rowLine">
                                        <div class=" info">
                                            <i class="bi bi-globe"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalEndereco">Endereço </h4>
                                            <p>{{$cliente->endereco}}, {{$cliente->numero}}</p>
                                        </div>
                                        <div class=" info mt-4 mt-lg-0">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalEmail">E-mail cadastrado</h4>
                                            <p>{{$cliente->email}}</p>
                                        </div>
                                        <div class=" info mt-4 mt-lg-0">
                                            <i class="fas fa-lock icon-modify"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalSenha">Senha cadastrada</h4>
                                            <p data-bs-toggle="modal" data-bs-target="#modalSenha" class="altSenha">Alterar senha</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>


            <!--foto alteração-->
            <div class="modal fade" id="modalExcluirConta" tabindex="-1" aria-labelledby="modalExcluirContaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalExcluirContaLabel">Excluir conta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/clientes/{{$cliente->user_id}}" method="POST" class="form">
                                @csrf
                                @method('DELETE')
                               Essa conta será excluida, perdendo todos os comentarios, reservas e quaisquer conteudo que tenha mexido, tem certeza ?
                               <br>
                                <button type="submit" class="btn btn-primaryBoot" data-bs-dismiss="modal">Sim</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--modal Alteração-->

            <!--foto alteração-->
            <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFotoLabel">Alteração de foto de perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <div class="text-center">
                                    <div id="img-container">
                                        <img src="/storage/{{$cliente->foto}}" class="img-logo" id="preview" alt="">
                                    </div>
                                    <form class="form-uploadNot" action="/clientes/{{$cliente->user_id}}" method="post" role="form">
                                        @csrf
                                        @method('put')
                                        <label class="input-personalizado">
                                            <span class="botao-selecionar">Trocar foto</span>
                                            <img class="imagem" />
                                            <input type="file" class="input-file" id="img-input" name="foto" accept="image/*">
                                        </label>
                                        <div class="modal-footer"></div>
                                        <a href=""><button class="btn btn-primaryBoot">Salvar Foto</button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Nome de usuario-->
            <div class="modal fade" id="modalNome" tabindex="-1" aria-labelledby="modalNomeLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalNomeLabel">Alteração de nome</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                            <form action="/clientes/{{$cliente->user_id}}" method="POST" role="form" class="form">
                                    @csrf
                                    @method('PATCH')
                                    <label class="label-input" for="">
                                        <i class="far fa-user icon-modify"></i>
                                        <input type="text" name="nome" placeholder="Novo nome do usuario">
                                    </label>
                                    <button class="btn btn-primaryBoot">Salvar dados</button>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- telefone do usuario-->
            <div class="modal fade" id="modalTel" tabindex="-1" aria-labelledby="modalTelLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTelLabel">Alteração de contato</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <form action="" method="post" role="form" class="form">
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-phone-volume icon-modify"></i>
                                        <input type="text" placeholder="Telefone(contato)">
                                    </label>

                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- email  do usuario-->
            <div class="modal fade" id="modalEmail" tabindex="-1" aria-labelledby="modalEmailLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEmailLabel">Alteração de Email</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                            <form action="/clientes/{{$cliente->user_id}}" method="POST" role="form" class="form">
                                    @csrf
                                    @method('PATCH')
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-at icon-modify"></i>
                                        <input type="email" placeholder="Digite seu Email atual">
                                    </label>
                                    <h6>DIGITE SEU NOVO <span>EMAIL</span></h6>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-at icon-modify"></i>
                                        <input type="email" placeholder="Digite seu novo email">
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-at icon-modify"></i>
                                        <input type="email" placeholder="Confirmar email">
                                    </label>
                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- senha do usuario-->
            <div class="modal fade" id="modalSenha" tabindex="-1" aria-labelledby="modalSenhaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSenhaLabel">Alteração de senha</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <form action="" method="post" role="form" class="form">
                                    <label class="label-input" for="">
                                        <i class="fas fa-lock icon-modify"></i>
                                        <input type="text" placeholder="Digite sua senha atual">
                                    </label>
                                    <h6>DIGITE SUA NOVA <span>SENHA</span></h6>
                                    <label class="label-input" for="">
                                        <i class="fas fa-lock icon-modify"></i>
                                        <input type="password" id="password-field" placeholder="Senha">
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right: 5px;"></span>
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fas fa-lock icon-modify"></i>
                                        <input type="password" id="password-field2" placeholder="Confirmar Senha">
                                        <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right: 5px;"></span>
                                    </label>
                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- endereço-->
            <div class="modal fade" id="modalEndereco" tabindex="-1" aria-labelledby="modalEnderecoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEnderecoLabel">Alteração de endereço</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                            <form action="/clientes/{{$cliente->user_id}}" method="POST" role="form" class="form">
                                    @csrf
                                    @method('PATCH')
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-house-flag icon-modify"></i>
                                        <input type="text" name="cep" id="cep" placeholder="CEP :">
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-road icon-modify"></i>
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
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-road icon-modify"></i>
                                        <input type="text" name="cidade" id="cidade" placeholder="Cidade :">
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-road icon-modify"></i>
                                        <input type="text" name="bairro" id="bairro" placeholder="Bairro :">
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-road icon-modify"></i>
                                        <input type="text" name="endereco" id="rua" placeholder="Rua :">
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-house-user icon-modify"></i>
                                        <input type="number" name="numero" placeholder="Numero residencial :">
                                    </label>
                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

@endsection