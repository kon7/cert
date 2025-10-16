<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\TypeAlerteController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\IncidentController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {return view('auth.login');})->name('pagelogin');
Route::post('/login', [UtilisateurController::class, 'login'])->name('login');

    /**site vitrine route alerte */
Route::get('/cert', [AlerteController::class, 'certIndex'])->name('cert.index');
Route::get('/cert/{id}', [AlerteController::class, 'certShow'])->name('cert.show');

    //route formulaire incident 
Route::get('/incidents/create', [IncidentController::class, 'create'])->name('incidents.create');



Route::middleware(['auth', 'session.timeout'])->group(function () {


        Route::get('/dashbord', function () { return view('dashboard');})->name('dashboard');

        /** Utilisateur */
        Route::get('/utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs.index');
        Route::get('/utilisateurs/create', [UtilisateurController::class, 'create'])->name('utilisateurs.create');
        Route::post('/utilisateurs', [UtilisateurController::class, 'store'])->name('utilisateurs.store');
        Route::get('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'show'])->name('utilisateurs.show');
        Route::get('/utilisateurs/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateurs.edit');
        Route::put('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateurs.update');
        Route::delete('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
        Route::get('/profile', [UtilisateurController::class, 'profile'])->name('utilisateur.profile');



        /* ******  Role    */

        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

        /******Groupe */
        Route::get('/groupes', [GroupeController::class, 'index'])->name('groupes.index');
        Route::get('/groupes/create', [GroupeController::class, 'create'])->name('groupes.create');
        Route::post('/groupes', [GroupeController::class, 'store'])->name('groupes.store');
        Route::get('/groupes/{groupe}', [GroupeController::class, 'show'])->name('groupes.show');
        Route::get('/groupes/{groupe}/edit', [GroupeController::class, 'edit'])->name('groupes.edit');
        Route::put('/groupes/{groupe}', [GroupeController::class, 'update'])->name('groupes.update');
        Route::delete('/groupes/{groupe}', [GroupeController::class, 'destroy'])->name('groupes.destroy');

        /***Type alerte */
        Route::get('/type-alertes', [TypeAlerteController::class, 'index'])->name('type_alertes.index');
        Route::get('/type-alertes/create', [TypeAlerteController::class, 'create'])->name('type_alertes.create');
        Route::post('/type-alertes', [TypeAlerteController::class, 'store'])->name('type_alertes.store');
        Route::get('/type-alertes/{typeAlerte}', [TypeAlerteController::class, 'show'])->name('type_alertes.show');
        Route::get('/type-alertes/{typeAlerte}/edit', [TypeAlerteController::class, 'edit'])->name('type_alertes.edit');
        Route::put('/type-alertes/{id}', [TypeAlerteController::class, 'update'])->name('type_alertes.update');
        Route::delete('/type-alertes/{typeAlerte}', [TypeAlerteController::class, 'destroy'])->name('type_alertes.destroy');

        /*** Alerte */
        Route::get('/alertes', [AlerteController::class, 'index'])->name('alertes.index');
        Route::get('/alertes/create', [AlerteController::class, 'create'])->name('alertes.create');
        Route::post('/alertes', [AlerteController::class, 'store'])->name('alertes.store');
        Route::get('/alertes/{alerte}', [AlerteController::class, 'show'])->name('alertes.show');
        Route::get('/alertes/{alerte}/edit', [AlerteController::class, 'edit'])->name('alertes.edit');
        Route::put('/alertes/{alerte}', [AlerteController::class, 'update'])->name('alertes.update');
        Route::delete('/alertes/{alerte}', [AlerteController::class, 'destroy'])->name('alertes.destroy');


        /**incident */
        Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
        Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
        Route::get('/incidents/{incident}', [IncidentController::class, 'show'])->name('incidents.show');

        Route::post('/logout', [UtilisateurController::class, 'logout'])->name('logout');

// });
});