<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meta;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $meta = new Meta();

        if($request->status==null) $metas = $meta->orderBy('id', 'DESC')->get();
        else $metas = $meta->where('status',$request->status)->orderBy('id', 'DESC')->get();

        return $metas;
    }

    public function store(Request $request)
    {
        $request->validate([
            'rotuloID' => 'required',
            'rotulo' => 'required',
            'descricao',
            'autor' => 'required',
            'flag',
            'anexo',
            'prioridade' => 'required',
            'prazo',
            'status' => 'required'
        ]);

        return Meta::create($request->all());
    }

    public function show(int $id)
    {
        $insert = Meta::findorfail($id);
        return $insert;
    }

    public function update(Request $request, Meta $meta, int $id)
    {
        $insert = Meta::findorfail($id);
        $insert->update($request->only([
            'rotuloID',
            'rotulo',
            'descricao',
            'autor',
            'flag',
            'anexo',
            'prioridade',
            'prazo',
            'status'
        ]));

        // Retornar a resposta desejada
        return response()->json(['message' => 'Registro atualizado com sucesso'], 200);
    }

    public function destroy(int $id)
    {
        $insert = Meta::findorfail($id);
        $insert->delete();

        // Retornar a resposta desejada
        return response()->json(['message' => 'Registro deletado com sucesso'], 200);
    }
}
