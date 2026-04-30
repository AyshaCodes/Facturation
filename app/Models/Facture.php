<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Facture extends Model
{
    protected $fillable = ['date', 'client_id'];

    /**
     * Une facture appartient à un seul client[cite: 22, 35].
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Une facture contient plusieurs produits[cite: 22, 36].
     */
    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'facture_produit')
            ->withPivot('qte_facturee', 'prix_unitaire') // Crucial pour les calculs
            ->withTimestamps();
    }

    // --- Méthodes de calcul demandées [cite: 19, 22] ---

    /**
     * Calcule le Total Hors Taxes (HT).
     */
    public function getTotalHT()
    {
        return $this->produits->sum(function ($produit) {
            return $produit->pivot->qte_facturee * $produit->pivot->prix_unitaire;
        });
    }

    /**
     * Calcule le montant de la TVA (basé sur 20%).
     */
    public function getMontantTVA()
    {
        return $this->getTotalHT() * 0.20;
    }

    /**
     * Calcule le Total Toutes Taxes Comprises (TTC).
     */
    public function getTotalTTC()
    {
        return $this->getTotalHT() + $this->getMontantTVA();
    }
}
