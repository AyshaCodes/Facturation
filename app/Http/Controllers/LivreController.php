<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     * url:url:/livres,method :get et route :livres.index(nom de la ressource+nom de la function)
     */
    public function index()
    {
        $livres=Livre::all();
        // return view ("livres/index",["livres"=>$livres]);
        return view ("livres/index",compact('livres'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view("livres/create");

    }

    /**
     * Store a newly created resource in storage.
     * post/ products
     * request =tout ce qu'on envoie dans le formulaire
     */
    public function store(Request $request)
    {
 $request->validate([
    'titre' => 'required|unique:livres|max:25',
    'prix' => 'required|numeric',
]);
        //
        Livre::create($request->all());
        return redirect()->route("livres.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
