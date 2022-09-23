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

    public function store(Request $reques){
        dd($reques);
    }

    public function show($id){
        $cuenta = Cuenta::find($id);
        return view('cuentas.mostrar', compact('cuenta'));
    }

    public function newMovement($id){
        $cuenta = Cuenta::find($id);
        $categorias = Categoria::all();
        return view('cuentas.movimiento', compact('cuenta', 'categorias'));
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
