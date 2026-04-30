<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    //
    //pour n'envoyer que les données
    protected $fillable=["titre","prix"];
}
