<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calcul;
use Illuminate\Http\Request;

class CalculController extends Controller
{
       function afficher_form(){
        return view('create');

    }
        function somme(request $request){
            $nombre1=$request->a;
            $nombre2=$request->b;
               $res = Calcul::somme($request->a, $request->b);
    
         return view('create', ['resultat' => $res]);

    }
}
