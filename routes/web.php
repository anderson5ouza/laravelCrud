<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PainelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('registrar', 'registrar')->name('registrar');
    Route::post('registrar', 'criarConta')->name('registrar.action');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'autenticar')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {

    Route::get('painel', [App\Http\Controllers\PainelController::class, 'index'])->name('painel');
 
    Route::controller(CategoriaController::class)->prefix('categorias')->group(function () {
        Route::get('', 'index')->name('categorias');
        Route::get('create', 'create')->name('categorias.create');
        Route::post('store', 'store')->name('categorias.store');
        Route::get('show/{id}', 'show')->name('categorias.show');
        Route::get('edit/{id}', 'edit')->name('categorias.edit');
        Route::put('edit/{id}', 'update')->name('categorias.update');
        Route::delete('destroy/{id}', 'destroy')->name('categorias.destroy');
        Route::get('pdf', 'pdf')->name('categorias.pdf');
    });
    
    Route::controller(ProdutoController::class)->prefix('produtos')->group(function () {
        Route::get('', 'index')->name('produtos');
        Route::get('create', 'create')->name('produtos.create');
        Route::post('store', 'store')->name('produtos.store');
        Route::get('show/{id}', 'show')->name('produtos.show');
        Route::get('edit/{id}', 'edit')->name('produtos.edit');
        Route::put('edit/{id}', 'update')->name('produtos.update');
        Route::delete('destroy/{id}', 'destroy')->name('produtos.destroy');
        Route::get('pdf', 'pdf')->name('produtos.pdf');
    });

    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::put('edit/{id}', 'update')->name('user.update');
    });
 
    Route::get('perfil', [App\Http\Controllers\AuthController::class, 'perfil'])->name('perfil');
    
});