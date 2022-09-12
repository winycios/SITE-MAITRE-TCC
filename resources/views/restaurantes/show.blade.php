@extends('layouts.index')

@section('title')

MAÎTRE || {{strtoupper($restaurante->nome)}}
@endsection

@section('content')
<main id="main">

        <!-- ======= restaurante Section ======= -->
        <section id="restaurante" class="events">
            <div class="container">

                <div class="section-title">
                    <h2><span>{{$restaurante->nome}}</span></h2>
                </div>

                <div class="events-slider swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                                <div class="row event-item">
                                    <div class="col-lg-6">
                                        <img src="/storage/{{$restaurante->foto}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                                        
                                        <div class="containerDesc">
                                            <p class="fst-italic descSlide">
                                                {{$restaurante->descricao}}
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                        @if(count($slides) != 0)
                            
                            @foreach($slides as $s)
                                <div class="swiper-slide">
                                    <div class="row event-item">
                                        <div class="col-lg-6">
                                            <img src="/storage/{{$s->foto}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                                           
                                            <div class="containerDesc">
                                                <p class="fst-italic descSlide">
                                                   {{$s->descFoto}}
                                                </p>
                                            </div>
           
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            @endforeach
                        @endif

                    </div>
                    
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End restaurante Section -->

        <!-- ======= informacao Section ======= -->
        <section id="informacao" class="why-us">
            <div class="container">



                <!-- ======= Contact Section ======= -->
                <section id="contato" class="contact">
                    <div class="container mt-5">

                        <div class="section-title">
                            <h2>Restaurante :<span> {{$restaurante->nome}}</span></h2>
                        </div>
                    </div>

                    <div class="container mt-5">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Sobre o restaurante:</h4>
                                    <p>{{$restaurante->nome}}</p>
                                </div>

                                <div class="col-lg-3 col-md-6 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Localização:</h4>
                                    <p>{{$restaurante->endereco}}, {{$restaurante->numero}}<br>{{$restaurante->bairro}}, {{$restaurante->cidade}} - {{$restaurante->estado}}, {{$restaurante->cep}}</p>
                                </div>

                                <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                                    <i class="bi bi-clock"></i>
                                    <h4>Horarios aberto:</h4>
                                    <p>segunda-domingo:<br>11:00 AM - 23:00 PM</p>
                                </div>

                                <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                                    <i class="bi bi-phone"></i>
                                    <h4>Contato</h4>
                                    <p>{{$restaurante->descFone}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </section><!-- End Contact Section -->

                <!-- ======= cardapio Section ======= -->
                <section id="cardapio" class="specials">
                    <div class="container">

                        <div class="section-title">
                            <h2>Pratos<span> Especiais</span></h2>
                            <p>Pratos dedicados as dias especiais</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <ul class="nav nav-tabs flex-column">
                                    @foreach($especiais as $e)
                                        @if($loop->index == 0)
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-{{ $loop->index }}">{{$e->diaSemana}}</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#tab-{{ $loop->index }}">{{$e->diaSemana}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                   
                                </ul>
                            </div>
                            <div class="col-lg-9 mt-4 mt-lg-0">
                                <div class="tab-content">
                                    @foreach($especiais as $e)
                                        @if($loop->index == 0)
                                            <div class="tab-pane active show" id="tab-{{ $loop->index }}">
                                                <div class="row">
                                                    <div class="col-lg-8 details order-2 order-lg-1">
                                                        <h3>{{$e->nome}}</h3>
                                                        <p class="fst-italic">{{$e->descPrato}}</p>
                                                        <p>R$ {{number_format((float)$e->valor, 2, '.', '')}}</p>
                                                    </div>
                                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                                        <img src="/storage/{{$e->nome}}" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="tab-pane" id="tab-{{ $loop->index }}">
                                                <div class="row">
                                                    <div class="col-lg-8 details order-2 order-lg-1">
                                                        <h3>{{$e->nome}}</h3>
                                                        <p class="fst-italic">{{$e->descPrato}}</p>
                                                        <p>R$ {{number_format((float)$e->valor, 2, '.', '')}}</p>
                                                    </div>
                                                    
                                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                                        <img src="/storage/{{$e->foto}}" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>                                         
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section><!-- End cardapio Section -->



        <!--cardapio completo-->
        <section class="menu">
            <div class="container">

                <div class="section-title">
                    <h2>Cardápio <span>completo</span></h2>
                </div>


                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">Tudo</li>

                            @foreach($categorias as $c)
                                <li data-filter=".filter-{{$c->descCategoria}}">{{$c->descCategoria}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <input type="search" placeholder="Pequise por pratos" />
                </div>

                <div class="row menu-container">
                   
                    @foreach($pratos as $p)
                   
                        <div class="col-lg-6 menu-item filter-{{$p->descCategoria}}">
                            <div class="menu-content">
                                <a onclick="modalPrato({{$p->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal">{{$p->nome}}</a><span id="{{$p->id}}">R$</span>
                            </div>
                            <div class="menu-ingredients">
                                {{$p->descPrato}}
                            </div>
                        </div>
                        <script>
                            var valor = document.getElementById({{$p->id}})
                            valor.innerHTML += parseFloat({{$p->valor}}).toFixed(2)
                        </script>
                    @endforeach

                    
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="nomePrato">Nome do prato</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="/img/chefs/chefs-1.jpg" class="img-prato" alt="">
                                    <div class="section-subtitle">
                                        <h4>DES<span>CRIÇÃO</span></h4>
                                    </div>
                                    <div class="menu-ingredients" id="desc">
                                        Lorem, deren, trataro, filede, nerada
                                    </div>
                                    <div class="section-title">
                                        <h4>Preço: R$ <span id="preco">$14.99</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"  class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal-->

        </section><!-- End Menu Section -->

        <!-- ======= reservaSection ======= -->
        <section id="reserva" class="book-a-table">
            <div class="container">
                <div class="section-title">
                    <h2>Fazer <span>Reserva</span></h2>
                    <p>Caso gostou desse restaurante e estiver logado em uma conta pode fazer a reserva a qualquer
                        momento.</p>
                </div>

                <form action="/reservas/create" method="post" role="form" class="php-email-form" id="formReserva">
                    @csrf
                    <input type="hidden" value="{{$restaurante->id}}" name="restId">
                    <input type="hidden" name="dia"/>
                    <div class="rowLine">
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <input type="number" class="form-control" name="qtd" id="qtd" placeholder="QTDE. Pessoas" data-msg="Digitar quantidade de pessoas">
                            <div class="validate"></div>
                        </div>   
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <input type="hidden" value="{{ $restaurante->id }}" id="rest_id"/>
                            <input type="date" class="form-control" name="data" id="dataInput" onchange="getDia()">
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <select placeholder="Horario da reserva" class="form-control" id="horarios" name="horario">
                                <option selected value="0">Horário da reserva</option>
                                {{-- @foreach($horarios as $h)
                                    <option value="{{$h->horario}}">{{$h->horario}}</option>
                                @endforeach --}}
                            </select>
                            <div class="validate"></div>
                        </div>
                      
                    </div>
                    <div class="text-center"><button type="submit" onclick="batata(event)">Agendar</button></div>
                    {{-- <button onclick="batata(event)">Teste</button> --}}
                </form>
            </div>
        </section><!-- reserva Section -->

        <!-- ======= comentarios Section ======= -->
        <section id="comentario" class="testimonials">
            <div class="container position-relative">
                <div class="section-title">
                    <h2><span>Alguns comentários</span></h2>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @if(count($avaliacoes) == 0)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="$restaurante->foto" class="testimonial-img" alt="">
                                    <h3>ESTE RESTAURANTE AINDA NÃO POSSUÍ AVALIAÇÕES</h3>
                                    <!--<h4>Ceo &amp; Founder</h4>-->
                                    <div class="stars">
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                        <!--<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>-->
                                    </div>
                                    {{-- <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Caso você queria fazer um comentário, é só apertar no botão abaixo.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p> --}}
                                </div>
                            </div>
                        @endif

                        @foreach($avaliacoes as $a)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="$restaurante->foto" class="testimonial-img" alt="">
                                    <h3>{{$a->nome}}</h3>
                                    <!--<h4>Ceo &amp; Founder</h4>-->
                                    <div class="stars">
                                        @for($i = 0; $i < $a->estrelas; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        <!--<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>-->
                                    </div>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{$a->descAvaliacao}}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        @endforeach                    
                    </div>
                    
                    <div class="swiper-pagination"></div>
                    <div class="center-button">
                       
                        <button type="submit" class="button-coment" data-bs-toggle="modal" data-bs-target="#modalComent">Compartilhe sua opinião também</button>

                    </div>
                </div>

            </div>
        </section><!-- comentarios Section -->

        <!--modal comentario-->
        <div class="modal fade" id="modalComent" tabindex="-1" aria-labelledby="modalComentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalComentLabel">Opinião sobre esse restaurante</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/avaliacoes/create" method="post">
                            @csrf
                            <input type="hidden" name="restaurante_id" value="{{$restaurante->id}}"/>
                            
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Avaliação</label>
                                <div class="estrelas">
                                    <input type="radio" id="cm_star-empty" name="estrelas" value="" checked />
                                    <label for="cm_star-1"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-1" name="estrelas" value="1" />
                                    <label for="cm_star-2"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-2" name="estrelas" value="2" />
                                    <label for="cm_star-3"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-3" name="estrelas" value="3" />
                                    <label for="cm_star-4"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-4" name="estrelas" value="4" />
                                    <label for="cm_star-5"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-5" name="estrelas" value="5" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Escreva seu comentário</label>
                                <textarea class="form-control" name="descAvaliacao" id="message-text"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" value="Enviar Comentario">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

       
    </main>

    <script src="/js/modalPrato.js"></script>
    <script>
        //Script para definir a data minima e maxima do calendario de reservas.


        const today = new Date();
        const yyyy = today.getFullYear();
        let mm = today.getMonth() + 1; // Months start at 0!
        let mmNext = today.getMonth() + 2; // Months start at 0!
        let dd = today.getDate();
        

        if (dd < 10) dd = '0' + dd;
        if (mm < 10) mm = '0' + mm;
        if (mmNext < 10) mmNext = '0' + mmNext;

        var date = yyyy + '-' + mm + '-' + dd;
        //var dateNext = yyyy + '-' + mmNext;
        var dateNext = yyyy + '-' + mmNext + '-31';

        document.getElementById('dataInput').setAttribute("min", date);
        document.getElementById('dataInput').setAttribute("max", dateNext);


        function getDia(){
            var data = document.getElementById('dataInput').value
            var id = document.getElementById('rest_id').value;
            var select = document.getElementById('horarios');


            $('#horarios').empty();

            var DiaSemana = [
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '1',

            ];

            var d = new Date(data);
            var dia = DiaSemana[d.getDay()];
            var url = '/api/horarios/'+ id +'/' + dia
            console.log(url)
            fetch(url)
            .then((resp) => resp.json())
            .then(function(data) {
                console.log(data)
                let horarios = data.horarios;
                let size = Object.keys(horarios).length
                if(size >0){
                    return horarios.map(function(horario) {
                    var opt = document.createElement('option');
                    opt.value = horario.horario;
                    opt.innerHTML = horario.horario;
                    select.append(opt)
                    })
                }else{
                    var opt = document.createElement('option');
                    opt.innerHTML = 'Não há horários disponíveis para este dia.';
                    select.append(opt)
                }
                
            })


            document.querySelector('input[name="dia"]').value = DiaSemana[d.getDay()];
        }


        function batata(e){
            e.preventDefault();
     
           
            document.getElementById("formReserva").submit();
            
        }
        

    </script>
@endsection