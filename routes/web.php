<?php

use App\Http\Controllers\AutenticaController;
use App\Http\Controllers\CalculosController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\KeepinhoController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('teste');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/teste/{valor}', function ($valor) {
    return "Você digitou: {$valor}";
});

// Cálculos
Route::get('/calc/somar/{x}/{y}', [CalculosController::class, 'somar']);

Route::get('/calc/subtrair/{x}/{y}', [CalculosController::class, 'subtrair']);

Route::get('/calc/quadrado/{x}', [CalculosController::class, 'quadrado']);

// Keepinho
Route::prefix('/keep')->group(function () {
    Route::get('/', [KeepinhoController::class, 'index'])->name('keep');

    Route::post('/gravar', [KeepinhoController::class, 'gravar'])->name('keep.gravar');

    Route::get('/editar/{nota}', [KeepinhoController::class, 'editar'])->name('keep.editar'); // Formulário

    Route::put('/editar', [KeepinhoController::class, 'editar'])->name('keep.editarGravar'); // Ação

    Route::delete('/apagar/{nota}', [KeepinhoController::class, 'apagar'])->name('keep.apagar');

    Route::get('/lixeira', [KeepinhoController::class, 'lixeira'])->name('keep.lixeira');

    Route::get('/restaurar/{nota}', [KeepinhoController::class, 'restaurar'])->name('keep.restaurar');
});

Route::get('/autenticar', [AutenticaController::class,'index'])->name('autentica');
Route::post('/autenticar/gravar', [AutenticaController::class,'gravar'])->name('autentica.gravar');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('produtos', ProdutosController::class);

Route::prefix('/carrinho')->group(function(){
    Route::get('/', [CarrinhoController::class, 'index'])->name('carrinho');
    Route::get('/store/{id}', [CarrinhoController::class, 'store'])->name('carrinho.store');
    Route::get('/delete/{id}', [CarrinhoController::class, 'delete'])->name('carrinho.delete');
});
require __DIR__ . '/auth.php';
