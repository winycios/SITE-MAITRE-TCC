<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Cliente;

class AdminController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        $users = DB::table('users')
        ->select(DB::raw('DATE_FORMAT(created_at, "%m") as mes'), DB::raw('COUNT(id) as total'))
        ->whereBetween("created_at", ['1970-01-01',Carbon::now()])
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
        ->get();
        return view('dashboards.admin.index', compact('users'), compact('clientes'));
    }

    public function restDash(){
        return view('dashboards.admin.restaurante');
    }

    public function restDestroy($id){
        return view('dashboards.admin.restaurante');
    }



}
