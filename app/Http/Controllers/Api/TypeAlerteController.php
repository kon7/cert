<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type_Alerte;

class TypeAlerteController extends Controller
{
    /**
     *  Afficher toutes les TypeAlertes
     */
    public function index()
    {
        $typeAlertes = Type_Alerte::all();

        return response()->json($typeAlertes);
    }

    /**
     * Afficher une TypeAlerte spécifique par ID
     */
    public function show($id)
    {
        $typeAlerte = Type_Alerte::find($id);

        if (! $typeAlerte) {
            return response()->json(['message' => 'TypeAlerte non trouvée'], 404);
        }

        return response()->json($typeAlerte);
    }
}
