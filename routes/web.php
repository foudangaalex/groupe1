<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Auth::routes();  // Cette ligne ajoute toutes les routes d'authentification nécessaires

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();


Route::get('/listDemandes', [DemandeController::class,'listDemandes'])->name('demandes');
Route::get('/addDamande', [DemandeController::class,'demandesform'])->name('addDemande');
Route::Post('/addDamande', [DemandeController::class,'create_demande'])->name('createDemande');
Route::get('/demandes/{id}', [DemandeController::class, 'show'])->name('demande.show');
Route::Post('/updateDemande', [DemandeController::class,'update_demandes'])->name('updateDemande');
Route::post('/deleteDemande', [DemandeController::class, 'delete_demande'])->name('delete.demande');
