<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurante;

class PremiumController extends Controller
{


    public function index()
    {
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
        return view('dashboards.restaurante.premium', ['rest' => $rest]);
    }

    public function getPremium($id){
        $r = Restaurante::findOrFail($id);

        if($r->level == 1){
            $r->level = 2;
            $r->save();
            return redirect('/restaurantes/premium');
        }else{
            return redirect('/restaurantes/premium');
        }
    }

    public function cancelPremium($id){
        $r = Restaurante::findOrFail($id);

        if($r->level == 2){
            $r->level = 1;
            $r->save();
            return redirect('/restaurantes/premium');
        }else{
            return redirect('/restaurantes/premium');
        }
    }

   
}
