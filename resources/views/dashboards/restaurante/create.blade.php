@extends('layouts.restaurante-adm')
@section('content')


<form action='/restaurantes/create' method="post" enctype="multipart/form-data" class='form'>
    @csrf
    <h1>Cadastro do restaurante</h1>
    <p class='name'>
        <label class='label required' for='name'>Nome Restaurante</label>
        <input id='name' name='txtNome' required type='text'>
    </p>
    <p class='email'>
        <label class='label' for='name'>telefone do Restaurante</label>
        <input id='fone' name='txtFone' placeholder="ex: (11) 98467-5735" maxlength="15" type='text'>
    </p>
    <p class='name'>
        <label class='label' for='email'>CEP restaurante</label>
        <input id='cep' name='cep' required type='text'>
    </p>
    <p class='email'>
        <label class='label' for='name'>Bairro</label>
        <input id='bairro' name='bairro' required type='text'>
    </p>
    <p class='name'>
        <label class='label' for='name'>cidade</label>
        <input id='cidade' name='cidade' required type='text'>
    </p>
    <p class='email'>
        <label class='label' for='name'>Endereço</label>
        <input name='rua' id="rua" required type='text'>
    </p>
    <p class='name'>
        <label class='label' for='name'>Numero endereço</label>
        <input name='txtNum' required type='text'>
    </p>
    <p class='email'>
        <label class='label' for='name'>Foto do restaurante</label>
        <input type="file" placeholder="Foto" name="fotoRestaurante">
    </p>

    <p class='subject'>
        <label class='label' for='select'>Categoria:</label>
        <select placeholder="Categoria" name="txtCategoria">
            <option selected value="0">Escolha a categoria:</option>
            
        </select>
    </p>
    <p class='email'>
        <label class='label' for='name'></label>
        <input  type='hidden'>
    </p>
    <p class='field half'>
        <input class='button' type='submit' value='Cadastrar'>
    </p>
</form>

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
                <small class="text-muted">Cliente</small>
            </div>
            <div class="profile-photo">
                <img src="/img/logos/atlanticSemfundo.png">
            </div>
        </div>
    </div>
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>


@endsection