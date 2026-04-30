<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Etudiant extends Model
{

    protected $fillable=["nom","prenom","email","tel","niveau_etude",'date_naissance',"filiere_id"];

    /**
     * Get the filiere that owns the Etudiant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filiere(): BelongsTo
    {
        return $this->belongsTo(Filiere::class);
    }
}
