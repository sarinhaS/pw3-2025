<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotaRequest;
use App\Models\Nota;
use Illuminate\Http\Request;

class KeepinhoController extends Controller
{
    public function index() {
        $notas = Nota::all();
        
        return view('keepinho/index',[
            'notas' => $notas,
        ]);
    }

    public function gravar(NotaRequest $request) {
        /*
        Cria uma nota com todos os valores enviados pelo
        formulário. Porém, a Model vai ficar apenas
        com aqueles listados no $fillable.
        */
        $dados = $request->validated();

        Nota::create($dados);
        return redirect()->route('keep');
    }

    public function editar(Nota $nota, NotaRequest $request) {
        if ($request->isMethod('put')) {
            $nota = Nota::find($request->id);
            $nota->fill($request->all());

            $nota->save();

            return redirect()->route('keep');
        }
        
        return view('keepinho.editar', [
            'nota' => $nota,
        ]);
    }

    public function apagar(Nota $nota) {
        $nota->delete();
        return redirect()->route('keep');
    }

    public function lixeira() {
        // Apenas apagadas
        $notas = Nota::onlyTrashed()->get();
        
        // Todas, junto com as apagadas
        // $notas = Nota::withTrashed()->get();

        return view('keepinho.lixeira', [
            'notas' => $notas,
        ]);
    }

    public function restaurar($nota) {
        $nota = Nota::withTrashed()->find($nota);

        $nota->restore();
        return redirect()->route('keep.lixeira')->with('sucesso', 'Nota restaurada com sucesso!');
    }
}
