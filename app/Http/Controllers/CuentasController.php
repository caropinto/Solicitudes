<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Categoria;
use App\Models\Movimiento;

class CuentasController extends Controller
{
    public function view($id){
        $cuenta = Cuenta::find($id);
        return view('cuenta', compact('cuenta'));
    }

    public function newMovement($id){
        $cuenta = Cuenta::find($id);
        $categorias = Categoria::all();
        return view('movimiento', compact('cuenta', 'categorias'));
    }

    public function storeMovement(Request $request, $id){
        $cuenta = Cuenta::find($id);
        $movimiento = new Movimiento();
        $movimiento->tipo = $request->tipo;
        $movimiento->valor = $request->valor;
        $movimiento->categoria_id = $request->categoria_id;
        $movimiento->descripcion = $request->descripcion;
        dd($cuenta, $movimiento, $request);
    }
}
