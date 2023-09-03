<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoritos=[];
        if(Auth::user()){
            $favoritos = Favorite::where('user_id', '=', Auth::user()->id)->get(['recipe_id']);
            $favoritos = $favoritos->pluck('recipe_id');
            $favoritos = $favoritos->toArray();
        }

        $meals=[];

        for ($i=0; $i < sizeof($favoritos); $i++) { 
            $response = Http::get('https://www.themealdb.com/api/json/v1/1/lookup.php?i='.$favoritos[$i]);
            $favoritosArray = $response->json();

            array_push($meals, $favoritosArray['meals'][0]);
        }

        //dd($meals);
        return view('favorite.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Aquí debes colocar la lógica para guardar el favorito en la base de datos o realizar cualquier otra acción necesaria.
            
            // Por ejemplo, si estás guardando un favorito en la base de datos:
            $favorito = new Favorite();
            $favorito->recipe_id = $request->input('recipe_id');
            $favorito->user_id = Auth::user()->id;
            $favorito->save();
    
            // Si la operación se realiza con éxito, puedes devolver una respuesta JSON
            $id = $request->input('recipe_id');
            return response()->json(['message' => 'Guardado con éxito'], 200);
    
        } catch (\Exception $e) {
            // En caso de error, puedes devolver una respuesta de error
            return response()->json(['error' => 'Hubo un problema al guardar el favorito'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $idRecipe, Favorite $favorite)
    {
        try {
            // Aquí debes colocar la lógica para guardar el favorito en la base de datos o realizar cualquier otra acción necesaria.
            
            // Por ejemplo, si estás guardando un favorito en la base de datos:

            $favorito = Favorite::where([
                ['user_id', '=', Auth::user()->id],
                ['recipe_id', '=', $idRecipe],
            ])->first();
            $favorito->delete();
    
            // Si la operación se realiza con éxito, puedes devolver una respuesta JSON
            // $id = $request->input('recipe_id');
            return response()->json(['message' => 'Eliminado con éxito'], 200);
    
        } catch (\Exception $e) {
            // En caso de error, puedes devolver una respuesta de error
            return response()->json(['error' => 'Hubo un problema al guardar el favorito'], 500);
        }
    }
}
