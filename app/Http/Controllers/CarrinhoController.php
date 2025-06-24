<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $carrinho = session()->get('carrinho', []);

        $carrinho[$id] = [
            'nome' => $produto->nome,
            'preco' => $produto->preco,
            'descricao' => $produto->descricao,
            'imagem' => $produto->imagem
        ];

        session()->put('carrinho', $carrinho);
        return view('carrinho.index', compact('carrinho'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $carrinho = session()->get('carrinho', []);
        
        unset($carrinho[$id]);

        session()->put('carrinho', $carrinho);

        return view('carrinho.index', compact('carrinho'));
    }
}
