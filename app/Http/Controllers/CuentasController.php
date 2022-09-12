<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentasController extends Controller
{
    public function index($id){
        $cuenta = Cuenta::find($id);
        //dd($cuenta);
        return view('cuenta', compact('cuenta'));
    }
}
