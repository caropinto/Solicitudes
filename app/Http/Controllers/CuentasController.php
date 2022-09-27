<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Cuenta;
use App\Models\Movimiento;

class CuentasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mensaje = 'Hola';
        $usuario = Auth::user();
        return view('cuentas.index', compact('mensaje', 'usuario'));
    }

    public function create(){
        return view('cuentas.crear');
    }

    public function store(Request $request){
        $cuenta = new Cuenta();
        $cuenta->saldo = $request->saldo;
        $cuenta->nombre = $request->nombre;
        $cuenta->user_id = Auth::id();
        $cuenta->created_at = date('Y-m-d H:i:s');
        $cuenta->save();

        if ($cuenta->saldo > 0){
            $movimiento = new Movimiento();
            $movimiento->tipo = 1;
            $movimiento->valor = $cuenta->saldo;
            $movimiento->categoria_id = 4;
            $movimiento->descripcion = "Ingreso a la cuenta";
            $movimiento->cuenta_id = $cuenta->id;
            $movimiento->created_at = date('Y-m-d H:i:s');
            $movimiento->save();
        }
        
        return redirect()->route('cuenta', ['id' => $cuenta->id]);
    }

    public function show($id){
        $cuenta = Cuenta::find($id);
        if ($cuenta->user_id == Auth::id()) {
            return view('cuentas.mostrar', compact('cuenta'));
        } else {
            return abort(404);
        }
    }

    public function newMovement($id){
        $cuenta = Cuenta::find($id);
        if ($cuenta->user_id == Auth::id()) {
            $categorias = Categoria::all();
            return view('cuentas.movimiento', compact('cuenta', 'categorias'));
        } else {
            return abort(404);
        }
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
