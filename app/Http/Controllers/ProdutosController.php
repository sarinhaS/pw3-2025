<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        $products = Produto::with('category')->get(); // Eager loading

        
        return view('produtos.index',[
            'produtos' => $produtos,
        ]);
    }

    public function porCategoria($id)
    {
        $categories = Categoria::all();
        $category = Categoria::with('products')->findOrFail($id);
        $products = $category->products;

        return view('produtos.index', compact('categories', 'products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutosRequest $request)
    {
        $dados = $request->validated();
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('produtos', 'public');
            $dados['imagem'] = $caminhoImagem;
        }

        Produto::create($dados);
        return redirect()->route('produtos.index');
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
    public function destroy(string $id)
    {
        //
    }
}
