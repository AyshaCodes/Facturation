<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calcul extends Model
{
    static function somme($x,$y)
    {
        $somme=$x+$y;
    }
}
