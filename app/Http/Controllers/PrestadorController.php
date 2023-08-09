<?php

namespace App\Http\Controllers;

use App\Models\Prestador;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $prestadores = Prestador::paginate(10);

        $searchTerm = $request->input('term');
        if($searchTerm){
            $results = Prestador::where('nome', 'LIKE',"%$searchTerm%")->orWhere('telefone', 'LIKE', "%$searchTerm%")->get();

            return response()->json(['data' => $results]);
        }

        return response()->json([
            'data' => $prestadores->items(),
            'current_page' => $prestadores->currentPage(),
            'per_page' => $prestadores->perPage(),
            'total' => $prestadores->total(),
            'last_page' => $prestadores->lastPage(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->store('photos', 'public');
            $request["foto"] = $filePath;
            // Aqui você pode adicionar lógica adicional, como salvar o nome do arquivo no banco de dados
        }
        $prestador = Prestador::create($request->all());

        if($prestador){
            return response()->json(['resultado' => "Cadastrado com Sucesso"]);
        }

        return response()->json(['resultado' => "Erro ao Efetuar o cadastro"], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestador = Prestador::find($id);
        if (!$prestador) {
            return response()->json(['message' => 'Prestador não encontrado'], 404);
        }
        $response = [
            'prestador' => $prestador,
            'servicos' =>$prestador->servicos
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

    }
}
