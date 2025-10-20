<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\TypeAlerteController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\FeedSourceController;
use App\Http\Controllers\VulnerabiliteController;


Route::get('/', function () {return view('auth.login');})->name('pagelogin');
Route::post('/login', [UtilisateurController::class, 'login'])->name('login');

    /**site vitrine route alerte */
Route::get('/cert', [AlerteController::class, 'certIndex'])->name('cert.index');
Route::get('/cert/{id}', [AlerteController::class, 'certShow'])->name('cert.show');

    //route formulaire incident 
Route::get('/incidents/create', [IncidentController::class, 'create'])->name('incidents.create');
Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');



// Route::middleware(['auth', 'session.timeout'])->group(function () {


        Route::get('/dashbord', function () { return view('dashboard');})->name('dashboard');

        /*******************************************************************************************************************
     *********************************** ROUTES UTILISATEURS **********************************************************
     *******************************************************************************************************************/
        Route::get('/utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs.index');
        Route::get('/utilisateurs/create', [UtilisateurController::class, 'create'])->name('utilisateurs.create');
        Route::post('/utilisateurs', [UtilisateurController::class, 'store'])->name('utilisateurs.store');
        Route::get('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'show'])->name('utilisateurs.show');
        Route::get('/utilisateurs/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateurs.edit');
        Route::put('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateurs.update');
        Route::delete('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
        Route::get('/profile', [UtilisateurController::class, 'profile'])->name('utilisateur.profile');


        /*******************************************************************************************************************
     *********************************** ROUTES ROLES **********************************************************
     *******************************************************************************************************************/

        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

       /*******************************************************************************************************************
     *********************************** ROUTES GROUPES **********************************************************
     *******************************************************************************************************************/
        Route::get('/groupes', [GroupeController::class, 'index'])->name('groupes.index');
        Route::get('/groupes/create', [GroupeController::class, 'create'])->name('groupes.create');
        Route::post('/groupes', [GroupeController::class, 'store'])->name('groupes.store');
        Route::get('/groupes/{groupe}', [GroupeController::class, 'show'])->name('groupes.show');
        Route::get('/groupes/{groupe}/edit', [GroupeController::class, 'edit'])->name('groupes.edit');
        Route::put('/groupes/{groupe}', [GroupeController::class, 'update'])->name('groupes.update');
        Route::delete('/groupes/{groupe}', [GroupeController::class, 'destroy'])->name('groupes.destroy');

       /*******************************************************************************************************************
     *********************************** ROUTES TYPE ALERTE **********************************************************
     *******************************************************************************************************************/
        Route::get('/type-alertes', [TypeAlerteController::class, 'index'])->name('type_alertes.index');
        Route::get('/type-alertes/create', [TypeAlerteController::class, 'create'])->name('type_alertes.create');
        Route::post('/type-alertes', [TypeAlerteController::class, 'store'])->name('type_alertes.store');
        Route::get('/type-alertes/{typeAlerte}', [TypeAlerteController::class, 'show'])->name('type_alertes.show');
        Route::get('/type-alertes/{typeAlerte}/edit', [TypeAlerteController::class, 'edit'])->name('type_alertes.edit');
        Route::put('/type-alertes/{id}', [TypeAlerteController::class, 'update'])->name('type_alertes.update');
        Route::delete('/type-alertes/{typeAlerte}', [TypeAlerteController::class, 'destroy'])->name('type_alertes.destroy');

        /*******************************************************************************************************************
     *********************************** ROUTES ALERTE **********************************************************
     *******************************************************************************************************************/
        Route::get('/alertes', [AlerteController::class, 'index'])->name('alertes.index');
        Route::get('/alertes/create', [AlerteController::class, 'create'])->name('alertes.create');
        Route::post('/alertes', [AlerteController::class, 'store'])->name('alertes.store');
        Route::get('/alertes/{alerte}', [AlerteController::class, 'show'])->name('alertes.show');
        Route::get('/alertes/{alerte}/edit', [AlerteController::class, 'edit'])->name('alertes.edit');
        Route::put('/alertes/{alerte}', [AlerteController::class, 'update'])->name('alertes.update');
        Route::delete('/alertes/{alerte}', [AlerteController::class, 'destroy'])->name('alertes.destroy');


        /*******************************************************************************************************************
     *********************************** ROUTES INCIDENTS **********************************************************
     *******************************************************************************************************************/
        Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
        Route::get('/incidents/{incident}', [IncidentController::class, 'show'])->name('incidents.show');

     

        Route::post('/logout', [UtilisateurController::class, 'logout'])->name('logout');

        /*******************************************************************************************************************
     *********************************** ROUTES FEEDSOURCES **********************************************************
     *******************************************************************************************************************/
        Route::get('/feedsources', [FeedSourceController::class, 'index'])->name('feedsources.index');
        Route::get('/feedsources/create', [FeedSourceController::class, 'create'])->name('feedsources.create');
        Route::post('/feedsources', [FeedSourceController::class, 'store'])->name('feedsources.store');
        Route::get('/feedsources/{feedSource}', [FeedSourceController::class, 'show'])->name('feedsources.show');
        Route::get('/feedsources/{feedSource}/edit', [FeedSourceController::class, 'edit'])->name('feedsources.edit');
        Route::put('/feedsources/{id}', [FeedSourceController::class, 'update'])->name('feedsources.update');
        Route::delete('/feedsources/{feedSource}', [FeedSourceController::class, 'destroy'])->name('feedsources.destroy');

      /*******************************************************************************************************************
     *********************************** ROUTES VULNERABITE EXTERNE **********************************************************
     *******************************************************************************************************************/
        Route::get('/vulnerabilities', [VulnerabiliteController::class, 'index'])->name('vulnerabilities.index');
        Route::get('/vulnerabilities/{vulnerabilite}', [VulnerabiliteController::class, 'show'])->name('vulnerabilities.show');


// });
  