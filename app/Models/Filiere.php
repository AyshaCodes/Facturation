<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filiere extends Model
{
    //
    protected $fillable=["nom","niveau_min"];
   /**
    * Get all of the etudiants for the Filiere
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function etudiants(): HasMany
   {
       return $this->hasMany(Etudiant::class);
   }
}
