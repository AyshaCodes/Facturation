<?php

use App\Http\Controllers\CalculController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\ProduitController;
use App\Models\Livre;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// route pour les contacts
// Route::get('/contacts', function () {
//     return view('contacts');
// });
// Route::get('/contacts', [ContactController::class, 'contact']);

// Route::get('/delete_contact', [ContactController::class, 'delete_contact']);
// Route::get('/store_contact', [ContactController::class, 'add_contact']);
// Route::get('/somme', [CalculController::class, 'afficher_form']);
// Route::post('/calcul/somme', [CalculController::class, 'somme']);

// 1. Afficher la liste des contacts (GET)
Route::get('/', function () {
    return view('welcome');

    });
    //  Route::get('/', [ContactController::class, 'index'])->name('contacts.index');

// 2. Ajouter un contact (POST)
// Route::post('/ajouter', [ContactController::class, 'store'])->name('contacts.store');

// 3. Supprimer un contact (DELETE ou POST)
// Note : Pour débuter, on utilise souvent un ID pour savoir quel contact supprimer
// Route::delete('/supprimer/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

//      Route::get('livres/index', [LivreController::class,'index'])->name('livres.index');
//     Route::get('livres/create', [LivreController::class, 'create'])->name('livres.create');
// Route::post('livres/store', [LivreController::class, 'store'])->name('livres.store');
// Route::resources(['livres' => LivreController::class]);
Route::resources(['etudiants' => EtudiantController::class]);
Route::resources(['filieres' => FiliereController::class]);
Route::resources(['clients' => ClientController::class]);
Route::resources(['factures' => FactureController::class]);
Route::resources(['produits' => ProduitController::class]);



