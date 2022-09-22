<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Categoria;
use App\Models\Movimiento;

class CuentasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $movimiento->cuenta_id = $cuenta->id;
        $movimiento->created_at = date('Y-m-d H:i:s');
        $movimiento->save();

        $valorMovimiento = $movimiento->tipo ? $movimiento->valor : ($movimiento->valor * -1);
        $cuenta->saldo = $cuenta->saldo + $valorMovimiento;
        $cuenta->save();
        
        return redirect()->route('cuenta', ['id' => $cuenta->id]);
    }
}
