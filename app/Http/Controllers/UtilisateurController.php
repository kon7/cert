<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TwoFactorCodeMail;

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
        $validated['created_by'] = optional(Auth::user())->matricule;


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
        $validated['updated_by'] = optional(Auth::user())->matricule;
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
         $utilisateur->update(['is_active' => false]);

        return redirect()->route('utilisateurs.index')
                     ->with('success', 'Utilisateur désactivé avec succès.');
    }
    public function show2faForm()
{
    return view('auth.verify-2fa');
}

public function verify2fa(Request $request)
{
    $request->validate(['two_factor_code' => 'required|numeric']);

    $userId = $request->session()->get('two_factor_user_id');
    $user = Utilisateur::find($userId);

    if (!$user || $user->two_factor_code !== $request->two_factor_code) {
        return back()->withErrors(['two_factor_code' => 'Code de vérification invalide.']);
    }

    if ($user->two_factor_expires_at->lt(now())) {
        return back()->withErrors(['two_factor_code' => 'Le code a expiré.']);
    }

    // Tout est bon → reset le code et connecte l’utilisateur
    $user->resetTwoFactorCode();
    Auth::login($user);
    $request->session()->forget('two_factor_user_id');

    return redirect()->intended('/dashbord')->with('success', 'Authentification réussie.');
}


            //     public function login(Request $request)
            // {
            //     //  Validation des champs
            //     $credentials = $request->validate([
            //         'email' => ['required', 'email'],
            //         'password' => ['required'],
            //     ]);

            //     //  Vérifie si l'utilisateur existe
            //     $user = \App\Models\Utilisateur::where('email', $credentials['email'])->first();

            //     if (!$user) {
            //         return back()->withErrors([
            //             'email' => 'Aucun utilisateur trouvé avec cet email.',
            //         ])->onlyInput('email');
            //     }

            //     //  Vérifie s'il est actif
            //     if (!$user->is_active) {
            //         return back()->withErrors([
            //             'email' => 'Votre compte est désactivé. Veuillez contacter l’administrateur.',
            //         ])->onlyInput('email');
            //     }

            //     //  Vérifie les identifiants et connecte
            //     if (Auth::attempt($credentials)) {
            //         $request->session()->regenerate();
            //         return redirect()->intended('/dashbord');
            //     }

            //     //  Sinon, mot de passe incorrect
            //     return back()->withErrors([
            //         'email' => 'Les identifiants fournis sont incorrects.',
            //     ])->onlyInput('email');
            // }
                public function login(Request $request)
        {
            // Validation
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            // Vérification utilisateur
            $user = Utilisateur::where('email', $credentials['email'])->first();

            if (!$user) {
                return back()->withErrors(['email' => 'Aucun utilisateur trouvé avec cet email.'])->onlyInput('email');
            }

            if (!$user->is_active) {
                return back()->withErrors(['email' => 'Votre compte est désactivé.'])->onlyInput('email');
            }

            // Vérification du mot de passe
            if (!Auth::attempt($credentials)) {
                return back()->withErrors(['email' => 'Les identifiants fournis sont incorrects.'])->onlyInput('email');
            }

            // Étape 1 réussie → génération du code 2FA
            $user->generateTwoFactorCode();

            // Envoi du code par email
            Mail::to($user->email)->send(new TwoFactorCodeMail($user));

            // Déconnexion temporaire jusqu'à la vérification
            Auth::logout();

            // Stocke l'ID utilisateur dans la session
            $request->session()->put('two_factor_user_id', $user->id);

            return redirect()->route('verify.2fa.form')
                            ->with('success', 'Un code de vérification a été envoyé à votre adresse email.');
        }
                


            public function activate(Utilisateur $utilisateur)
        {
            $utilisateur->update(['is_active' => true]);

            return redirect()->route('utilisateurs.index')
                            ->with('success', 'Utilisateur réactivé avec succès.');
        }
    

      

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
