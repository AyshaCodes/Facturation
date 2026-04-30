<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // IMPORTANT : On importe le modèle ici

class ContactController extends Controller
{
    // 1. Afficher la liste (index)
  // 1. Afficher la liste
public function index()
{
    // Récupère TOUS les contacts de la table 'contacts'
    $contacts = Contact::all(); 
    return view('contacts', compact('contacts'));
}

// 2. Ajouter un contact
public function store(Request $request)
{
    // 1. LA VALIDATION
    $request->validate([
        'nom' => 'required|min:3|max:50', // Obligatoire, min 3 caractères
        'email' => 'required|email|unique:contacts,email', // Format email + unique en base
'telephone' => 'required|numeric|digits:10'    ]);

    // 2. L'ENREGISTREMENT (si la validation passe)
    Contact::create([
        'nom' => $request->nom,
        'email' => $request->email,
        'telephone' => $request->telephone,
    ]);

    // 3. REDIRECTION avec un message de succès
    return redirect()->route('contacts.index')->with('success', 'Contact ajouté avec succès !');
}
// 3. Supprimer un contact
public function destroy($id)
{
    // Supprime la ligne qui possède cet ID
    Contact::destroy($id);

    return redirect()->route('contacts.index');
}
}