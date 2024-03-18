<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AuxClassificacao;

class AuxClassificacaoController extends Controller
{
    public function count($categoriaID)
    {
        $request = DB::table('metas')
                    ->join('aux_metas_categoria', 'metas.rotuloID', '=', 'aux_metas_categoria.meta_id')
                    ->join('categorias', 'aux_metas_categoria.categoria_id', '=', 'categorias.rotuloID')
                    ->where('categorias.rotuloID', $categoriaID)
                    ->select('metas.*')
                    ->count();

        return $request;
    }

    public function index(Request $request, $categoriaID)
    {
        $query = DB::table('metas')
            ->join('aux_metas_categoria', 'metas.rotuloID', '=', 'aux_metas_categoria.meta_id')
            ->join('categorias', 'aux_metas_categoria.categoria_id', '=', 'categorias.rotuloID')
            ->where('categorias.rotuloID', $categoriaID)
            ->select('metas.*')
            ->orderBy('id', 'DESC');
    
        if ($request->status !== null) {
            $query->where('metas.status', $request->status);
        }
    
        $result = $query->get();
    
        return $result;
    }

    //INSERÇÃO DE NOVA CLASSIFICAÇÃO
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'meta_id' => 'required'
        ]);

        return AuxClassificacao::create($request->all());
    }

    //ATUALIZAÇÃO DE CATEGORIA
    public function update(Request $request, int $id)
    {
        $AuxClassificacao = AuxClassificacao::findorfail($id);
        $AuxClassificacao->update($request->only([
            'categoria_id',
            'meta_id'
        ]));

        return response()->json(['message' => 'Classificação atualizada com sucesso'],200);
    }

    //EXCLUSÃO DE CATEGORIA
    public function destroy(int $id){
        $AuxClassificacao = AuxClassificacao::findorfail($id);
        $AuxClassificacao->delete();
        return response()->json(['message' => 'Classificação excluída com sucesso'],200);
    }
}
