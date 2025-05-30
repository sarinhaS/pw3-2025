<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticarRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AutenticaController extends Controller
{
    public function index(){
        return view('autentica.index');
    }

    public function gravar(AutenticarRequest $req){
        User::create($req->all());
        return redirect()->route('autentica');
    }
}
