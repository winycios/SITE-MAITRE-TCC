<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function store(Request $request){
        $image = $request->file('foto');
        dd($image);
    }
}
