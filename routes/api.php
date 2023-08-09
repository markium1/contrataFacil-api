<?php

use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/teste', function(){
    return "Teste de api nessa porra";
});

//uri, [nomeClasseController:class, 'metodo']
Route::get('/prestador',[PrestadorController::class, 'index']);
Route::get('/prestador/{id}',[PrestadorController::class, 'show']);
Route::post('/prestador',[PrestadorController::class, 'store']);
Route::get('/search', [PrestadorController::class, 'search']);

Route::get('/servico',[ServicoController::class, 'index']);
Route::get('/servico/{id}',[ServicoController::class, 'show']);
Route::post('/servico',[ServicoController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
