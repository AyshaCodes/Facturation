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
            "produits"  => "required|array|min:1",
            "produits.*.id"  => "required|exists:produits,id",
            "produits.*.qte" => "required|integer|min:1",
        ]);
//pour eviter de créer une facture fantome
        try {
            // : On commence à écrire la facture, mais de manière "brouillon"
            DB::beginTransaction();

            // 1. Création de l'entête de la facture
            $facture = Facture::create([
                "client_id" => $request->client_id,
                "date"      => $request->date,
            ]);

            foreach ($request->produits as $item) {
                $produit = Produit::find($item['id']);

                $facture->produits()->attach($produit->id, [
                    'qte_facturee'  => $item['qte'],
                    'prix_unitaire' => $produit->prix
                ]);
            }
//  Si tout le code à l'intérieur du try s'exécute parfaitement sans aucune erreur, MySQL valide définitivement l'écriture globale (la facture ET tous ses produits sont enregistrés ensemble)
            DB::commit();
            return redirect()->route("factures.show", $facture->id);

        } catch (\Exception $e) {
            //  Le rollback annule absolument tout ce qui a été tenté depuis le début du bloc en cas d'erreur

            DB::rollback();
            return back()->withErrors("Erreur lors de la création : " . $e->getMessage());
        }
    }

    public function show(Facture $facture)
    {
        $facture->load('produits', 'client');
        return view("factures.show", compact('facture'));
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();
        return redirect()->route("factures.index");
    }
}
