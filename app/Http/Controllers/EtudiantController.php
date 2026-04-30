<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $etudiants=  Etudiant::all();
      return view("etudiants.index",compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $filieres=  Filiere::all();
        return view("etudiants/create",compact("filieres"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required|string|min:2|unique:etudiants",
            "niveau_min"=>"required|string|min:2",

        ]);
        Etudiant::create($request->all());
        return redirect()->route("etudiants.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return view("etudiants.show",compact("etudiant"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
    return view("etudiants.edit",compact($etudiant));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update($request->all());
          return redirect()->route("etudiants.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
                  return redirect()->route("etudiants.index");

    }
}
