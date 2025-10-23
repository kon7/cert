<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alerte;

class AlerteController extends Controller
{
     /**
     * Afficher les 5 dernières alertes
     */
    public function cinqAlerte()
    {
        $alertes = Alerte::with('typeAlerte')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return response()->json($alertes);
    }
    /**
     *  Afficher toutes les alertes
     */
    public function index()
    {
        $alertes = Alerte::with('typeAlerte')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($alertes);
    }

     /**
     * Afficher une alerte spécifique par ID
     */
    public function show($id)
    {
        $alerte = Alerte::with('typeAlerte')->find($id);

        if (!$alerte) {
            return response()->json(['message' => 'Alerte non trouvée'], 404);
        }

        return response()->json($alerte);
    }
}
