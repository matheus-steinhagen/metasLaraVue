<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //LISTAGEM DAS CATEGORIAS
    public function index()
    {
        $categoria = new Categoria();
        $categorias = $categoria->get();
        return $categorias;
    }

    //INSERÇÃO DE NOVA CATEGORIA
    public function store(Request $request)
    {
        $request->validate([
            'rotuloID' => 'required',
            'rotulo' => 'required',
            'descricao'
        ]);

        return Categoria::create($request->all());
    }

    //EXIBIÇÃO DE INFORMAÇÃO DA CATEGORIA
    public function show(string $rotuloID)
    {
        $categoria = Categoria::where('rotuloID', $rotuloID)->firstOrFail();
        return $categoria;
    }

    //ATUALIZAÇÃO DE CATEGORIA
    public function update(Request $request, Categoria $categoria, int $id)
    {
        $categoria = Categoria::findorfail($id);
        $categoria->update($request->only([
            'rotuloID',
            'rotulo',
            'descricao'
        ]));

        return response()->json(['message' => 'Categoria atualizada com sucesso'],200);
    }

    //EXCLUSÃO DE CATEGORIA
    public function destroy(int $id){
        $categoria = Categoria::findorfail($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoria excluída com sucesso'],200);
    }
}
