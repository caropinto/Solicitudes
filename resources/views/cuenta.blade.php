@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ 'Cuenta: ' . $cuenta->nombre }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ 'Saldo: $' . $cuenta->saldo }}<br>
                    {{ 'Estado: ' . ($cuenta->activo ? 'Activo' : 'Inactivo') }}<br>
                    {{ 'Fecha: ' . date('d/m/Y', strtotime($cuenta->created_at)) }}<br>
                    Movimientos: {{ $cuenta->movimientos->count() }}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
