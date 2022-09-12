@extends('layouts.restaurante-adm')
@section('content')

<main>
    <div class="recent-orders">
        <h1>Sliders premium</h1>


        <section style="padding: 60px 0;">
            <div class="containerImg mt-5">
                <div class="premium-form">
                    <div style="display: flex;align-items: center;">
                        <img class="img" id="preview">
                        <form class="form-upload" action="/restaurantes/slides" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="wrapper">
                            <h2>Descrição do banner</h2>
                            <textarea spellcheck="false" placeholder="Escreva sua descrição aqui" name="descFoto" required></textarea>
                        </div>
                    </div>
                    <div class="form-row button-login centerPremium">
                        <label class="input-personalizado">
                            <span class="botao-selecionar">Trocar banner</span>
                            <img class="imagem" id="testeIMG"/>
                            <input type="file" class="input-file" id="img-input" name="foto" onchange="previewIMG(this)" accept="image/*">
                            <input type="submit" class="input-file">
                        </label>

                            </div>
                            <div style="display: flex;justify-content: center;padding: 10px;">
                                <input type="submit" class="btn ">
                            </div>
                        </form>

                </div>
            </div>
        
        </section>

        <h1>Sliders atualmente usados</h1>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
            <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
            <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Banner</th>
                    <th>descrição</th>
                    <th>alteração</th>
                    <th>exclusão</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slides as $s)
                    <tr>
                        <td data-label="Prato"><a href="/storage/{{$s->foto}}" data-lightbox="portfolio">Ver banner</a></td>
                        <td data-label="Descrição">{{$s->descFoto}}</td>
                        <td><a href="#modalBanner" onclick="abreModalAtualizar({{$s->id}})" class="warning">Alterar slide</a></td>
                        <td><a href="#modal" onclick="abreModal({{$s->id}})" role="button" class="danger">Excluir slide</a></td>
                    </tr>
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
                <p>hey, <b></b></p>
                <small class="text-muted">Dono do restaurante</small>
            </div>
            <div class="profile-photo">
                <img src="/img/logos/atlanticSemfundo.png">
            </div>
        </div>
    </div>
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>





<!-- modal Atualização -->
<div class="modal-container" id="modalBanner" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">
        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">restaurant_menu</span>
                <strong>Atualizar esse banner</strong>
                <form action="/restaurantes/slides" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="slide_id"  id="slide_id"/>
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-file-signature"></i>
                                <label class="form-label" for="input">Descrição</label>
                                <textarea class="form-text textFigure" spellcheck="false" id="desc" name="descFoto" placeholder="Escreva sua descrição aqui" required></textarea>
                            </div>
                            <div class="form-row">
                                <div class="file-upload">
                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Adicionar banner</button>

                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" type='file' name="foto" onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Arraste e solte um arquivo ou selecione adicionar banner</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remover  <span class="image-title"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="create-account"></span>
                        <div class="form-row button-login">
                            <button type="submit" class="btn btn-login">Finalizar<i class="fas fa-arrow-right"></i></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#" class="link-2"></a>
    </div>
</div>
<!-- /modal Cadastro/atualizacao -->

<!-- Modal exclusao-->
<div class="modal-wrapper" id="modal">
    <div class="modal-body card">
        <div class="modal-header">
            <h2 class="heading">tem certeza ?</h2>
            <a href="#!" role="button" class="close" aria-label="close this modal">
                <svg viewBox="0 0 24 24">
                    <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                </svg>
            </a>
        </div>
        <h3>Esse dado será excluido permanentemente, tem certeza ?</h3>

        <div class="button-center">
            <a href="" class="button button__link">Não</a>
            <a href="" onclick="excluirSlide(event)" class="button button__link">Sim</a>
        </div>
    </div>
    <a href="#" class="outside-trigger"></a>
</div>

<script>

    const textarea = document.querySelector("textarea");
    var id;
    textarea.addEventListener("keyup", e => {
        textarea.style.height = "63px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
    });

 

    // const previewImg = $('.imagem');
    const previewImg = $('#preview')
    const fileChooser = $('.input-file');

    function previewIMG(e){
        // const fileToUpload = e.target.files.item(0);
        // const reader = new FileReader();
        // reader.onload = e => previewImg.src = e.target.result;
        // reader.readAsDataURL(fileToUpload);


        if (e.files && e.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').hide();

                $('#preview').attr('src', e.target.result);

                $('#preview').show();
                //$('.file-upload-content').show();

                //$('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(e.files[0]);

        } else {
            removeUpload();
        }

        console.log('teste')

    }



    // fileChooser.onchange = e => {
    

    // };
    


    function abreModal(x){

        id = x;
        console.log(id)
    }

    async function excluirSlide(e){
        e.preventDefault();

   
        await fetch('/api/slides/'+id,{
             method: 'DELETE',
        })
        .then((resp) =>{
            if(resp.ok){
                window.location.href = '/restaurantes/slides'
                //window.location.href = host +'/slides'
                alert('destruiu')
            }
        })
        
    }

    async function abreModalAtualizar(x){
        id = x

        var desc = document.getElementById('desc')
        var slide = document.getElementById('slide_id')



       //await fetch(local + '/slides/'+id,{
        //await fetch(host + '/slides/'+id,{
        await fetch('/api/slides/'+id,{
             method: 'GET',
        })
        .then((resp) =>{
            return resp.json()
        })

        .then((data) =>{
            desc.value = data.descFoto
            slide.value = data.id
        })
        
    }

    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
@endsection