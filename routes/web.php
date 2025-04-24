<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function() {
    return view('teste');
});

Route::get('/teste/{valor}', function($valor) {
    return "Você digitou: {$valor}";
});

Route::get('soma/{x}/{y}', function ($x, $y) {
    $soma = $x + $y;
    return 'O total é: ' . $soma;
});

// Cálculos
