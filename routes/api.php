<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ListaController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});

//Route::apiResource('categorias', CategoriaController::class);
Route::get('/categorias',[CategoriaController::class,'index']);
Route::post('/categorias',[CategoriaController::class,'store']);
Route::get('/categorias/{id}',[CategoriaController::class,'show']);
Route::put('/categorias/{id}',[CategoriaController::class,'store']);
Route::delete('/categorias/{id}', [CategoriaController::class,'destroy']);

//Route::apiResource('listas', ListaController::class);
Route::get('/listas',[ListaController::class,'index']);
Route::post('/listas',[ListaController::class,'store']);
Route::get('/listas/{id}',[ListaController::class,'show']);
Route::put('/listas/{id}',[ListaController::class,'store']);
Route::delete('/listas/{id}', [ListaController::class,'destroy']);