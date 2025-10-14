<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Role;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::with('roles')->get();
        return view('groupes.index', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('groupes.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $groupe = Groupe::create($validated);

        if (!empty($validated['roles'])) {
            $groupe->roles()->attach($validated['roles']);
        }

        return redirect()->route('groupes.index')
                         ->with('success', 'Groupe créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Groupe $groupe)
    {
        $groupe->load('roles');
        return view('groupes.show', compact('groupe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Groupe $groupe)
    {
        $roles = Role::all();
        $groupe->load('roles');
        return view('groupes.edit', compact('groupe', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Groupe $groupe)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $groupe->update($validated);

        // Synchronise les rôles sélectionnés
        $groupe->roles()->sync($validated['roles'] ?? []);

        return redirect()->route('groupes.index')
                         ->with('success', 'Groupe mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupe $groupe)
    {
         $groupe->roles()->detach();
        $groupe->delete();

        return redirect()->route('groupes.index')
                         ->with('success', 'Groupe supprimé avec succès.');
    }
}
