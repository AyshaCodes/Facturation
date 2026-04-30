<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    // Autorise le remplissage de ces champs [cite: 32]
    protected $fillable = ['nom', 'prenom', 'tel'];

    /**
     * Un client peut avoir plusieurs factures[cite: 22, 34].
     */
    public function factures(): HasMany
    {
        return $this->hasMany(Facture::class);
    }
}
