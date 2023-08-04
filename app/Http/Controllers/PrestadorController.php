<?php

namespace App\Http\Controllers;

use App\Models\Prestador;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $prestadores = Prestador::paginate(10);
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
        return Prestador::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd("teste");
        $prestador = Prestador::find($id);
        dd($prestador);
        if (!$prestador) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        return response()->json(['data' => $prestador]);
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
