<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    protected $fillable = ['libelle', 'prix', 'qte'];

    /**
     * Un produit peut apparaître dans plusieurs factures[cite: 22, 37].
     */
    public function factures(): BelongsToMany
    {
        return $this->belongsToMany(Facture::class, 'facture_produit')
            ->withPivot('qte_facturee', 'prix_unitaire') // Accès aux données pivot
            ->withTimestamps();
    }
}
