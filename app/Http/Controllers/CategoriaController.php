<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias_pais = Categoria::where('pai_id', null)->get();
        $todas_categorias = Categoria::all();

        return view('categoria.index')->with(compact('categorias_pais', 'todas_categorias'));
    }

    public function store(StoreCategoriaRequest $request)
    {
        $dados = $request->validated();
        Categoria::create($dados);
        return redirect()->route('categoria.index')->with('sucesso', 'Registro INSERIDO com sucesso!!!');
    }

}
