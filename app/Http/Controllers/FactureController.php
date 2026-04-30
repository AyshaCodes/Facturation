<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    public function index()
    {
        // On charge le client pour éviter les requêtes inutiles (Eager Loading)
        $factures = Facture::with('client')->get();
        return view("factures.index", compact('factures'));
    }

    public function create()
    {
        $clients = Client::all();
        $produits = Produit::all();
        return view("factures.create", compact('clients', 'produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "client_id" => "required|exists:clients,id",
            "date"      => "required|date",
            "produits"  => "required|array|min:1", // Au moins un produit [cite: 63]
            "produits.*.id"  => "required|exists:produits,id",
            "produits.*.qte" => "required|integer|min:1",
        ]);

        try {
            DB::beginTransaction();

            // 1. Création de l'entête de la facture
            $facture = Facture::create([
                "client_id" => $request->client_id,
                "date"      => $request->date,
            ]);

            // 2. Ajout des produits dans la table pivot [cite: 11, 22, 38]
            foreach ($request->produits as $item) {
                $produit = Produit::find($item['id']);

                $facture->produits()->attach($produit->id, [
                    'qte_facturee'  => $item['qte'],
                    'prix_unitaire' => $produit->prix // On fige le prix actuel [cite: 22]
                ]);
            }

            DB::commit();
            return redirect()->route("factures.show", $facture->id);

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors("Erreur lors de la création : " . $e->getMessage());
        }
    }

    public function show(Facture $facture)
    {
        // Charge les produits et leurs données pivot pour l'affichage final [cite: 45]
        $facture->load('produits', 'client');
        return view("factures.show", compact('facture'));
    }

    public function destroy(Facture $facture)
    {
        $facture->delete(); // Supprime aussi les lignes pivot grâce au cascade [cite: 31]
        return redirect()->route("factures.index");
    }
}
