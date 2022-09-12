@extends('layouts.index')

@section('title', 'MAÎTRE || SERVINDO A VOCÊ')

@section('content')
<section id="hero">
  <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

          <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

          <div class="carousel-inner" role="listbox">

            @auth
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(/img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"><span>Seja bem vindo ao </span>MaÎtre</h2>
                            <p class="animate__animated animate__fadeInUp">Olá {{auth()->user()->name}} </p>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(/img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                            <p class="animate__animated animate__fadeInUp">Servindo a você.</p>
                            <div>
                                <a href="/restaurantes"
                                    class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                                <a href="#restaurantePremium"
                                    class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
              
                
            @guest
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(/img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                            <p class="animate__animated animate__fadeInUp">Servindo a você.</p>
                            <div>
                                <a href="/restaurantes"
                                    class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                                <a href="#restaurantePremium"
                                    class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(/img/slide/slide-2.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                            <p class="animate__animated animate__fadeInUp">Encontre os melhores restaurantes perto de você.</p>
                            <div>
                                <a href="/restaurantes"
                                    class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                                <a href="#restaurantePremium"
                                    class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(/img/slide/slide-3.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                            <p class="animate__animated animate__fadeInUp">Fazer reservas nos seus restaurantes favoritos nunca foi tão fácil.</p>
                            <div>
                                <a href="/restaurantes"
                                    class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                                <a href="#restaurantePremium"
                                    class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest

            @auth
                @if(count($premium) == 0)
                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url(/img/slide/slide-2.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                                <p class="animate__animated animate__fadeInUp">Encontre os melhores restaurantes perto de você.</p>
                                <div>
                                    <a href="/restaurantes"
                                        class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                                    <a href="#restaurantePremium"
                                        class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url(/img/slide/slide-3.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                                <p class="animate__animated animate__fadeInUp">Fazer reservas nos seus restaurantes favoritos nunca foi tão fácil.</p>
                                <div>
                                    <a href="/restaurantes"
                                        class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                                    <a href="#restaurantePremium"
                                        class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @else
                    @foreach($premium as $p)
                        <div class="carousel-item" style="background-image: url(/img/slide/slide-2.jpg);">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown"><span>{{$p->nome}}</span></h2>
                                    <p class="animate__animated animate__fadeInUp">{{$p->descricao}}</p>
                                    <p class="animate__animated animate__fadeInUp"><span class="golden">{{$p->endereco}}, {{$p->numero}} - {{$p->bairro}}, {{$p->cidade}} - {{$p->estado}}, {{$p->cep}}</span></p>
                                    <div>
                                        <a href="/restaurantes/{{$p->id}}" class="btn-menu animate__animated animate__fadeInUp scrollto">VER MAIS</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endauth

          </div>

          <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>

          <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>
      </div>
  </div>
</section><!-- End Hero -->

<main id="main">

<!-- ======= restaurantes Premium Section ======= -->
@guest
    @if(count($premium) != 0)
        <section id="restaurantePremium" class="events">
            <div class="container">

                <div class="section-title">
                    <h2>Restaurantes <span>Em Destaque</span></h2>
                </div>

                <div class="events-slider swiper">
                    <div class="swiper-wrapper">


                        @foreach($restaurantes as $r)
                            @if($r->level == 2)
                                <div class="swiper-slide">
                                    <div class="row event-item">
                                        <div class="col-lg-6">
                                            <img src="/storage/{{$r->foto}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                                            <div class="containerDesc">
                                                <p class="fst-italic descSlide">
                                                   {{$r->descricao}}

                                                </p>
                                            </div>
                                            <p>
                                                <i class="bi bi-check-circle"></i>  {{$r->endereco}}, {{$r->numero}} - {{$r->bairro}}, {{$r->cidade}} - {{$r->estado}}, {{$r->cep}}
                                            </p>
                                            <a href="/restaurantes/{{$r->id}}"><button type="submit"
                                                    class="button-coment">Visitar restaurante</button></a>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            @endif
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- End restaurante premiu Section -->
    @endif
@endguest

  <!--======= restaurantes Section ======= -->
  <section id="restaurantes" class="chefs">
      <div class="container">

          <div class="section-title">
              <h2>Alguns <span>restaurantes</span></h2>
          </div>

          <div class="row">
          @if(count($restaurantes) == 0)
            <div class="col-lg-4 col-md-6">
              <div class="member">
                  <div class="pic"><img class="restaurante-img" src="img/notFound.png" class="img-fluid" alt=""></div>
                  <div class="member-info">
                      <p>Não foi possivel encontrar nenhum restaurante</p>


                  </div>
              </div>
            </div>
          @endif
          @foreach ($restaurantes as $r)
            @if($r->level == 1)
                <div class="col-lg-4 col-md-6">
                    <div class="member">
                        <div class="pic"><img class="restaurante-img" src="/storage/{{$r->foto}}" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>{{$r->nome}}</h4>
                            <div class="stars">
                                @if($estrelas != null)
                                    @for($i = 0; $i < $estrelas[$loop->index]->estrelas; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                @else
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                @endif
                            </div>
                            <div class="social">
                                <p>{{$r->categoria}}</p>
                            </div>
                            <div class="center-button">
                                <a href="/restaurantes/{{$r->id}}"><button type="submit"
                                class="button-coment">Visitar restaurante</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
          @endforeach
      </div>
  </section><!-- End restaurante Section -->




</main><!-- End #main -->
@endsection

  
