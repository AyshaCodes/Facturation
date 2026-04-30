<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // On autorise Laravel à remplir ces colonnes via un formulaire
    protected $fillable = ['nom', 'email', 'telephone'];
}