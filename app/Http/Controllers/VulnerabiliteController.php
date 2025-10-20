<?php

namespace App\Http\Controllers;

use App\Models\Vulnerabilite;
use App\Models\FeedSource;
use Illuminate\Http\Request;


class VulnerabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          $query = Vulnerabilite::with('feedSource')->orderByDesc('published_at');

        // Optionnel : filtre par source
        if ($request->filled('source_id')) {
            $query->where('feed_source_id', $request->source_id);
        }

        // Optionnel : recherche par mot-clé
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $vulnerabilities = $query->paginate(15);
        $sources = FeedSource::orderBy('name')->get();

        return view('Vulnerabilite.index', compact('vulnerabilities', 'sources'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vulnerabilite $vulnerabilite)
    {
        $vulnerabilite->load('feedSource');
        return view('Vulnerabilite.show', compact('vulnerability'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vulnerabilite $vulnerabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vulnerabilite $vulnerabilite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vulnerabilite $vulnerabilite)
    {
        //
    }
}
