<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Incident;
use App\Models\Alerte;

class DashboardController extends Controller
{
    public function index()
    {
        // Année en cours
        $currentYear = date('Y');

        // Compteurs pour les cartes
        $totalIncident = Incident::count();
        $totalAlerte = Alerte::count();
        $totalIncidentTraites = Incident::whereNotNull('duree_inci_clos')->count();

        // Données du graphique : incidents de l'année en cours, regroupés par mois
        $incidentData = Incident::select(
                DB::raw("MONTH(date_incident) as month"),
                DB::raw("COUNT(*) as count")
            )
            ->whereYear('date_incident', $currentYear)
            ->whereNotNull('date_incident')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        // Données du graphique : alertes de l'année en cours, regroupées par mois
         $alerteData = Alerte::select(
                DB::raw("MONTH(date_initial) as month"),
                DB::raw("COUNT(*) as count")
            )
            ->whereYear('date_initial', $currentYear)
            ->whereNotNull('date_initial')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Envoi à la vue
        return view('dashboard', compact(
            'totalIncident',
            'totalAlerte',
            'totalIncidentTraites',
            'incidentData',
            'alerteData',
            'currentYear'
        ));
    }
}
