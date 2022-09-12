<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AvaliacaoController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\CategoriaController;
use App\Http\Controllers\Web\CategoriaRestauranteController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\DiaSemanaController;
use App\Http\Controllers\Web\HorarioController;
use App\Http\Controllers\Web\PratoController;
use App\Http\Controllers\Web\PratoEspecialController;
use App\Http\Controllers\Web\PremiumController;
use App\Http\Controllers\Web\RestauranteController;
use App\Http\Controllers\Web\ReservasController;
use App\Http\Controllers\Web\MesaController;
use App\Http\Controllers\Web\UserController;
use App\Http\Middleware\Restaurante;
use Laravel\Jetstream\Role;

Route::get('/', [ClienteController::class, 'index'])->middleware('userAgent');
Route::get('/index', [ClienteController::class, 'index']);

Route::get('/app', function(){
    return view('app');
});
  
Route::get('/buscar', [RestauranteController::class, 'buscar']);

Route::get('/teste', [RestauranteController::class, 'teste']);

Route::post('/create/user', [UserController::class, 'store']);


Route::prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->middleware('auth', 'admin');
   
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->middleware('auth', 'admin');
    Route::post('/categorias/create', [CategoriaController::class, 'store'])->middleware('auth', 'admin');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->middleware('auth', 'admin');
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->middleware('auth', 'admin');


    Route::get('/restaurantes', [AdminController::class, 'restDash'])->middleware('auth', 'admin');
    Route::delete('/restaurantes/{id}', [AdminController::class, 'restDestroy'])->middleware('auth', 'admin');
    
    Route::get('/categorias/restaurantes/create', [CategoriaRestauranteController::class, 'index'])->middleware('auth', 'admin');
    Route::post('/categorias/restaurantes/create', [CategoriaRestauranteController::class, 'store'])->middleware('auth', 'admin');
    Route::delete('/categorias/restaurantes/{id}}', [CategoriaRestauranteController::class, 'destroy'])->middleware('auth', 'admin');
    Route::put('/categorias/restaurantes/atualizar', [CategoriaRestauranteController::class, 'update'])->middleware('auth', 'admin');
   

});

Route::prefix('/horarios')->group(function(){
    Route::get('/diaSemana', [DiaSemanaController::class, 'index'])->middleware('auth', 'restaurante');
    Route::get('/create', [HorarioController::class, 'create'])->middleware('auth', 'restaurante');
    Route::post('/create', [HorarioController::class, 'store']);
});

Route::prefix('/mesas')->group(function(){
    Route::get('/create', [MesaController::class, 'create'])->middleware('auth', 'restaurante');
    Route::post('/create', [MesaController::class, 'store'])->middleware('auth', 'restaurante');
    Route::delete('/{id}', [MesaController::class, 'destroy'])->middleware('auth', 'restaurante');
});

Route::prefix('/pratos')->group(function(){
    Route::get('/cardapio', [PratoController::class, 'create'])->middleware('auth', 'restaurante');
    Route::post('/create', [PratoController::class, 'store'])->middleware('auth', 'restaurante');
});

Route::prefix('/pratos/especiais')->group(function(){
    Route::get('/cardapio', [PratoEspecialController::class, 'create'])->middleware('auth', 'restaurante');
    Route::post('/create', [PratoEspecialController::class, 'store'])->middleware('auth', 'restaurante');
});




Route::prefix('/restaurantes')->group(function(){



    Route::get('/admin', [RestauranteController::class, 'home'])->middleware('auth', 'restaurante');
    Route::get('/slides', [RestauranteController::class, 'slides'])->middleware('auth', 'restaurante');
    Route::post('/slides', [RestauranteController::class, 'criarSlide'])->middleware('auth', 'restaurante');
    Route::put('/slides', [RestauranteController::class, 'atualizarSlide'])->middleware('auth', 'restaurante');
    Route::get('/reservas', [RestauranteController::class, 'reservas'])->middleware('auth', 'restaurante');
    Route::get('/create', [RestauranteController::class, 'create'])->middleware('auth', 'restaurante', 'has_restaurante');
    Route::post('/create', [RestauranteController::class, 'store'])->middleware('auth', 'restaurante');
    Route::get('/edit/{id}', [RestauranteController::class, 'edit'])->middleware('auth', 'restaurante');
    Route::put('/edit/{id}', [RestauranteController::class, 'update'])->middleware('auth', 'restaurante');
   
    Route::get('/graficos', [RestauranteController::class, 'dash'])->middleware('auth', 'restaurante');

    Route::get('/premium', [PremiumController::class, 'index'])->middleware('auth', 'restaurante');
    Route::patch('/premium/{id}', [PremiumController::class, 'getPremium'])->middleware('auth', 'restaurante');
    Route::patch('/premium/cancelar/{id}', [PremiumController::class, 'cancelPremium'])->middleware('auth', 'restaurante');

    Route::get('/', [RestauranteController::class, 'index']);
    Route::get('/{id}', [RestauranteController::class, 'show']);



    
});

Route::prefix('/clientes')->group(function(){
    Route::get('/{id}', [ClienteController::class, 'profile'])->middleware('auth', 'cliente');
    Route::match(array('PUT', 'PATCH'), "/{id}", [ClienteController::class, 'update'])->middleware('auth', 'cliente');
    Route::delete('/{id}', [ClienteController::class, 'destroy'])->middleware('auth', 'cliente');
    

});

Route::prefix('/reservas')->group(function(){
    Route::get('/', [ReservasController::class, 'index']);
    Route::get('/{id}', [ReservasController::class, 'find']);
    Route::post('/create', [ReservasController::class, 'store'])->middleware('auth', 'cliente');
    Route::put('/alterar', [ReservasController::class, 'update'])->middleware('auth', 'cliente');
    Route::patch('/rejeitar/{id}', [ReservasController::class, 'rejeitar']);
    Route::patch('/aprovar/{id}', [ReservasController::class, 'aprovar']);
    Route::patch('/checkin/{id}', [ReservasController::class, 'checkin']);
    Route::patch('/checkout/{id}', [ReservasController::class, 'checkout']);
});



Route::prefix('/avaliacoes')->group(function(){
    Route::post('/create', [AvaliacaoController::class, 'store'])->middleware('auth', 'cliente');
});

Route::prefix('/categoria-restaurante')->group(function(){
    Route::post('/create', [CategoriaRestauranteController::class, 'store']);
});

Route::prefix('/categoria-prato')->group(function(){
    Route::post('/create', [CategoriaController::class, 'store']);
});



