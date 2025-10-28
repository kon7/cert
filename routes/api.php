<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlerteController;
use App\Http\Controllers\Api\TypeAlerteController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::prefix('alertes')->group(function () {
    Route::get('/', [AlerteController::class, 'index']);         
    Route::get('/last-five', [AlerteController::class, 'cinqAlerte']); 
    Route::get('/{id}', [AlerteController::class, 'show']);    
    Route::get('/{id}/imprimer', [AlerteController::class, 'imprimer']);  
});