<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\CategoriaRestauranteController;
use App\Http\Controllers\Api\RestauranteController;
use App\Http\Controllers\Api\ReservasController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\MesaController;
use App\Http\Controllers\Api\MesaReservaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AvaliacaoController;
use App\Http\Controllers\Api\PratoController;
use App\Http\Controllers\Api\PratoEspecialController;
use App\Http\Middleware\Restaurante;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return "4.444";
});


Route::apiResource('/clientes', ClienteController::class);
Route::apiResource('/categorias', CategoriaController::class);
Route::apiResource('/categoria-restaurantes', CategoriaRestauranteController::class);
Route::apiResource('/restaurantes', RestauranteController::class);
Route::apiResource('/horarios', HorarioController::class);
Route::apiResource('/avaliacoes', AvaliacaoController::class);
Route::apiResource('/user', UserController::class);
Route::apiResource('/mesas', MesaController::class);
Route::apiResource('/mesas/reserva', MesaReservaController::class);
Route::apiResource('/pratos', PratoController::class);
Route::apiResource('/pratos/especiais', PratoEspecialController::class);

Route::get('/horarios/restore/{id}', [HorarioController::class, 'restore']);

Route::delete('/mesas/destroy/{id}', [MesaController::class, 'destroy']);
Route::put('/mesas/atualizar/{id}', [MesaController::class, 'update']);
Route::patch('/mesas/inativar/{id}', [MesaController::class, 'inativar']);
Route::patch('/mesas/reativar/{id}', [MesaController::class, 'reativar']);


Route::get('/mesas/restore/{id}', [MesaController::class, 'restore']);

Route::get('/horarios/{id}/{dia}', [HorarioController::class, 'teste']);
Route::delete('/horarios/forceDelete/{id}', [HorarioController::class, 'forceDelete']);

Route::apiResource('/reservas/rejeitar', ReservasController::class);

Route::get('/slides/{id}', [RestauranteController::class, 'verSlide']);
Route::delete('/slides/{id}', [RestauranteController::class, 'apagarSlide']);
Route::put('/slides/{id}', [RestauranteController::class, 'atualizarSlide']);

Route::get('/reservas/{id}', [ReservasController::class, 'show']);
Route::patch('/reservas/checkin/{id}', [ReservasController::class, 'checkin']);
Route::patch('/reservas/checkout/{id}', [ReservasController::class, 'checkout']);
Route::delete('/reservas/cancelar/{id}', [ReservasController::class, 'destroy']);


Route::get('/premium', [RestauranteController::class, 'premium']);
Route::patch('/restaurantes/premium/{id}', [RestauranteController::class, 'getPremium']);
Route::patch('/restaurantes/premium/cancelar/{id}', [RestauranteController::class, 'cancelPremium']);
Route::get('/restaurantes/restore/{id}', [RestauranteController::class, 'restore']);


Route::patch('/atualizar/telefone/{id}', [ClienteController::class, 'updateFone']);


Route::get('/teste', function(){
    return response()->json(['mensagem' => '4444 gostoso']);
})->middleware('auth:sanctum');


Route::get('/image', [RestauranteController::class, 'getImage']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;
Route::get('/testeLogin', [AuthController::class, 'teste'])->middleware('auth:sanctum');;
Route::get('/getId', [AuthController::class, 'getId'])->middleware('auth:sanctum');








