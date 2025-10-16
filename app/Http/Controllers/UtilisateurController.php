<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = Utilisateur::with('groupes')->get();
        $groupes = Groupe::all();

        return view('utilisateurs.index', compact('utilisateurs', 'groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupes = Groupe::all();
        return view('utilisateurs.create',compact('groupes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matricule' => 'required|string|max:50|unique:utilisateurs',
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs',
            'password' => 'required|string|min:6|confirmed',
            'groupe_id.*' => 'exists:groupes,id',
        ]);

        $validated['password'] = Hash::make($validated['password']);

       $utilisateur = Utilisateur::create($validated);
        if (!empty($validated['groupe_id'])) {
            $utilisateur->groupes()->attach($validated['groupe_id']);
        }

        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        $groupes = Groupe::all();
        return view('utilisateurs.edit', compact('groupes', 'utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
         $validated = $request->validate([
            'matricule' => 'required|string|max:50|unique:utilisateurs,matricule,' . $utilisateur->id,
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'password' => 'nullable|string|min:6|confirmed',
            'groupe_id.*' => 'exists:groupes,id',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $utilisateur->update($validated);
        $utilisateur->groupes()->sync($validated['groupe_id'] ?? []);


        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function login(Request $request){
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashbord');
            }

            return back()->withErrors([
                'email' => 'Les identifiants fournis sont incorrects.',
            ])->onlyInput('email');
    }
    

        // public function login(Request $request)
        // {
           
        //     $credentials = $request->validate([
        //         'email' => 'required|email',
        //         'password' => 'required|string',
        //         'remember' => 'nullable|boolean', 
        //     ]);

        //     $utilisateur = Utilisateur::where('email', $credentials['email'])->first();

        //     if ($utilisateur && Hash::check($credentials['password'], $utilisateur->password)) {
                
        //         $remember = $request->has('remember') && $request->remember;

               
        //         Auth::login($utilisateur, $remember);

        //         return redirect()->route('dashboard')->with('success', 'Connexion réussie !');
        //     }

        //     return back()->withErrors([
        //         'email' => 'Identifiants invalides.',
        //     ])->onlyInput('email');
        // }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('pagelogin')->with('success', 'Déconnexion réussie.');
    }

    public function profile()
    {
    // Récupérer l'utilisateur connecté
    $utilisateur = Auth::user();

    // Retourner la vue avec les données de l'utilisateur
    return view('utilisateurs.profile', compact('utilisateur'));
    }
}
