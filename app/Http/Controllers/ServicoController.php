<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $servicos = Servico::with('prestador')->paginate(10);
        $searchTerm = $request->input('term');

        if($searchTerm){
            $results = Servico::with('prestador')->where('nome', 'LIKE',"%$searchTerm%")->orWhere('descricao', 'LIKE', "%$searchTerm%")->get();

            return response()->json(['data' => $results]);
        }

        //dd($servicos->items());
        return response()->json([
            'data' => $servicos->items(),
            'current_page' => $servicos->currentPage(),
            'per_page' => $servicos->perPage(),
            'total' => $servicos->total(),
            'last_page' => $servicos->lastPage(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $servico = Servico::create($request->all());
        if($servico){
            return response()->json(['resultado' => "Cadastrado com Sucesso"]);
        }
        return response()->json(['resultado' => "Erro ao Efetuar o cadastro"], 400);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $servico = Servico::find($id);
        if (!$servico) {
            return response()->json(['message' => 'Serviço não encontrado'], 404);
        }

        $response = [
            'servico'=> $servico,
            'prestador' => $servico->prestador

        ];
        return response()->json(['data' => $response]);
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

    public function search(Request $request){
        $searchTerm = $request->input('term');

        $results = Servico::where('nome', 'LIKE',"%$searchTerm%")->orWhere('descricao', 'LIKE', "%$searchTerm%")->get();

        return response()->json(['results' => $results]);
    }
}
