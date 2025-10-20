<?php

namespace App\Http\Controllers;

use App\Models\FeedSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feeds = FeedSource::orderBy('name')->paginate(10);
        return view('feedsources.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedsources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'type' => 'required|in:rss,api',
           
        ]);

         $validated['active'] = $request->has('active') ? 1 : 0;

        FeedSource::create($validated);
        cache()->flush();

      return redirect()
        ->route('feedsources.index')
        ->with('success', 'Source mise à jour avec succès.')
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(FeedSource $feedSource)
    {
        return view('feedsources.show', compact('feedSource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeedSource $feedSource)
    {
        return view('feedsources.edit', compact('feedSource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'type' => 'required|in:rss,api',
        ]);
         $validated['active'] = $request->has('active') ? 1 : 0;
        $feedSource = FeedSource::findOrFail($id);
       
        $feedSource->update($validated);

        return redirect()
            ->route('feedsources.index')
            ->with('success', 'Source mise à jour avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeedSource $feedSource)
    {
        $feedSource->delete();

        return redirect()
            ->route('feedsources.index')
            ->with('success', 'Source supprimée avec succès.');
    }
}
