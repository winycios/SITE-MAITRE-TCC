@extends('layouts.authRestaurante')

@section('content')


    <img src="/img/bem2.jpg" style="width: 100%; height:18vh;" alt="">
        <div class="section-title">
            <h2><span>Continuação do</span> Cadastro de restaurante</h2>
        </div>
        <div class="containerFormRes">
            <div class="card">
                <div class="form">
                    <div class="left-side">
                        <div class="left-heading">
                            <h3>Cadastrando seu restaurante</h3>
                        </div>
                        <div class="steps-content">
                            <h3>Passo <span class="step-number">1</span></h3>
                            <p class="step-number-content active">Entre com os dados principais do restaurante</p>
                            <input type="hidden" id="formLevel" value="0">
                        </div>
                        <ul class="progress-bar">
                            <li class="active">Dados necessarios</li>
                            <li>Localização</li>
                            <li>Foto restaurante</li>
                            <li>Dias</li>
                            <li>Horários</li>
                            <li>Mesas</li>
                        </ul>
                    </div>
                    <div class="right-side">
                        <!--inicio do formulario de dados-->
                
                        <form method="POST" id="form1" enctype="multipart/form-data">
                            @csrf
                            <div class="main active">
                                <input type="hidden" name="level" value="1">
                                <div class="text">
                                    <h2>Informações obrigatorias</h2>
                                    <p>Insira essas informações para se fazer seu negócio decolar</p>
                                </div>

                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="nome" id="user_name" required require>
                                        <span>Nome do restaurante</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="fone"  required require>
                                        <span>Tel.Restaurante(contato)</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <select name="categoria_restaurante_id"  id="link">
                                            <option value="0">Selecione a categoria de seu restaurante</option>
                                            <option value="#adicionar">Cadastrar categoria</option>
                                            @foreach($categorias as $c)
                                                <option value="{{$c->id}}">{{$c->categoria}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <textarea  placeholder="Descrição do restaraurante" name="descricao" rows="4" cols="50" style="padding:10px"></textarea>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button onclick="next(event)">Próxima etapa</button>
                                </div>
                            </div>
                            <div class="main">
                                <div class="text">
                                    <h2>Localização</h2>
                                    <p>Informe o endereço de seu restaurante</p>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="cep" id="cep" required require>
                                        <span>CEP:</span>
                                    </div>
                                    <div class="input-div">
                                        <input type="text" name="bairro" id="bairro" required require>
                                        <span>Bairro:</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="endereco" id="rua" required require>
                                        <span>Rua:</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="cidade" id="cidade" required require>
                                        <span>Cidade:</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
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
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="numero" required require>
                                        <span>Número do restaurante:</span>
                                    </div>
                                </div>
                                <div class="buttons button_space">
                                    <button onclick="goBack(event)">Voltar</button>
                                    <span onclick="next(event)">Próxima Etapa</span>
                                </div>
                            </div>
                            <!--img-->
                            <div class="main">
                                <div class="text">
                                    <h2>Foto do restaurante</h2>
                                    <p>Foto que iremos usar para apresentar seu restaurante</p>
                                </div>
                                <div class="text-center">
                                    <!--fileList-->
                                    <img src="/img/chefs/chefs-1.jpg" class="img-ftRest" id="preview" alt="">
                                    <div class="form-upload">
                                        <label class="input-personalizado">
                                            <span data-bs-toggle="modal" data-bs-target="#modalFoto" class="botao-selecionar">Trocar imagem de perfil</span>
                                            <img class="imagem" />
                                        </label>
                                    </div>
                                </div>
                                <div class="buttons button_space">
                                    <button onclick="goBack(event)">Voltar</button>
                                    <button id="cadastroRest" >Próxima Etapa</button>
                                    
                                    
                                </div>
                            </div>
                            <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalFotoLabel">Alteração de foto de perfil</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                            <div class="modal-body">
                                                <!--necessario colocar o codigo aqui tambem ou sobe esse modal lá para cima-->
                                                <div class="rowCenter">
                                                    <div class="text-center">
                                                        <div id="img-container">
                                                            <img src="/img/chefs/chefs-1.jpg" class="img-ftRest" id="preview2" alt="">
                                                        </div>
                                                        
                                                            <label class="input-personalizado">
                                                                <span class="botao-selecionar">Trocar foto</span>
                                                                <img class="imagem"/>
                                                                <input type="file" class="input-file" id="img-input"  name="foto" accept="image/*">
                                                            </label>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--fim do formulario-->
                    <!--</div> apaguei essa div--> 

                    <!--modal foto alteração-->
                    

                    <div class="main">
                        <div class="text">
                            <h2>Dias</h2>
                            <p>Selecione os dias que o seu restaurante estará aberto</p>
                            <p>Não se preocupe, você poderá cadastrar estes dados depois em sua dashboard</p>
                        </div>
                        <!--form para seleção de dias-->
                        <form id="formDia">
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="todos" value='0' role="switch" id="todos" onclick='lais()'>
                                        <label class="form-check-label" for="seg">Todos os dias</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">          
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='2' role="switch" id="seg">
                                        <label class="form-check-label" for="seg">Segunda-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='3' role="switch" id="ter">
                                        <label class="form-check-label" for="ter">Terça-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='4' role="switch" id="qua">
                                        <label class="form-check-label" for="qua">Quarta-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='5' role="switch" id="qui">
                                        <label class="form-check-label" for="qui">Quinta-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='6' role="switch" id="sex">
                                        <label class="form-check-label" for="sex">Sexta-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='7' role="switch" id="sab">
                                        <label class="form-check-label" for="sab">Sábado</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='1' role="switch" id="dom">
                                        <label class="form-check-label" for="dom">Domingo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons">
                                {{-- <button class="back_button">voltar</button> --}}
                                <button class="next_button">Próxima Etapa</button>
                            </div>
                        </form>
                    </div>

                    <div class="main">
                        <div class="text">
                            <h2>Horários</h2>
                            <p>Digite os horários que seu restaurante estará aberto</p>
                            <p>Não se preocupe, você poderá cadastrar estes dados depois em sua dashboard</p>
                        </div>
                        <!--form para seleção de horario (CASO QUISER QUE A PAGINA RECARREGUE TIRA O ID-->
                        <form id="formHorario">
                            <div class="input-text">
                                <!-- Custom select structure -->
                                <select id="dias">
                                    <option selected>Selecione um dia </option>
                                    
                                </select>
                                <!-- Custom select structure -->
                            </div>
                            <div class="input-text">
                                <label>Horário de Abertura</label>
                                <div class="input-div">
                                    <input type="time" name="inicio" id="inicio" min="01:00" max="23:59" >
                                </div>
                            </div>
                            <div class="input-text">
                                <label>Horário de fechamento</label>
                                <div class="input-div">
                                    <input type="time" name="fim" id="fim" min="01:00" max="23:59" >
                                </div>
                            </div>
                            <div class="input-text">
                                <label>Intervalo de reserva</label>
                                <button type="button" class="btn btn-primary" data-bs-toggle="popover" title="Intervalo de reserva ?" data-bs-content="Intervalo, serve para termos uma base de quanto tempo é necessario para uma reserva ficar em espera">(?)</button>
                                <div class="input-div">
                                    <input type="time" name="intervalo" id="intervalo" min="01:00" max="04:00" placeholder="01:00">
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="back_button" id="horarioVoltar">voltar</button>
                                <!--<span id="finalizar" class="disabled">Proxima Etapa</span>-->
                                <!--<button class="disabled" id="finalizar">Proximo</button>-->
                                <button onclick="cadastrarHorario()" id="teste">Cadastrar</button>
                                <button class="next_button">Proxíma Etapa</button>

                            </div>
                        </form>
                    </div>

                    <div class="main">
                        <div class="text">
                            <h2>Mesas</h2>
                            <p>Cadastre a quantidade de mesas que serão disponibilizadas para reservas</p>
                            <p>Não se preocupe, você poderá cadastrar estes dados depois em sua dashboard</p>
                        </div>
                        <!--form para mesas-->
                        <form id="formMesa">
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="number" name="qtd" id="qtdMesas">
                                    <span>Qtde. mesas</span>
                                </div>
                                <div class="input-div">
                                    <input type="number" name="cap" id="capMesa">
                                    <span>Capacidade pessoas</span>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button class="back_button" id="horarioVoltar">voltar</button>
                                <button onclick="cadastrarMesa()">Cadastrar</button>
                                <button class="next_button">Finalizar</button>
                                <!--<button id="finalizar" class="disabled">Finalizar</button>-->
                            </div>
                        </form>
                    </div>
                    <div class="main">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>

                        <div class="text congrats">
                            <h2>Obrigado!</h2>
                            <p>Obrigado<span class="shown_name"></span> Seu restaurante foi cadastrado com sucesso</p>
                            <div class="buttons button_space">
                                <a href="/restaurantes/admin"><button class="next_button">Finalizar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal-wrapper" id="adicionar">
            <div class="modal-body card">
                <div class="modal-header">
                    <h2 class="heading">Cadastrar categoria</h2>
                    <a href="#!" role="button" class="close" aria-label="close this modal">
                        <svg viewBox="0 0 24 24">
                            <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                        </svg>
                    </a>
                </div>
                <form  method="post" role="form" class="form">
                    @csrf
                    <p>*Por favor verificar se essa categoria já não foi cadastrada</p>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="categoria" id="nomeCat" required require>
                            <span>Nova categoria</span>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="button" onclick="sla(event)">Cadastrar</button>
                    </div>
                </form>
            </div>
            <a href="#!" class="outside-trigger"></a>
        </div>

        <script>
            async function sla(e){
                var local = 'http://127.0.0.1:8000/api/';
                var host = 'https://maitre-app.herokuapp.com/api/';



                var select = document.getElementById('link');
                var opt = document.createElement('option');
                var cat = document.getElementById('nomeCat').value;
                e.preventDefault()
                //fetch(local + "/categoria-restaurantes",
                 //fetch(host + "/categoria-restaurantes",
                fetch("/api/categoria-restaurantes",
                {
                    method: "POST",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({categoria: cat})
                })
                .then(function(res){ return res.json(); })
                .then(function(data){
                    
                    opt.value = data.id;
                    opt.innerHTML = data.categoria;
                    select.append(opt)
                    window.location.href = "#!" 
                })
            }
        
        </script>
@endsection