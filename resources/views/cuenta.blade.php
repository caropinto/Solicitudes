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
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cuenta->movimientos as $movimiento)
                            <tr>
                                <td>{{ date('d/m/Y', strtotime($movimiento->created_at)) }}</td>
                                <th><span class="{{ $movimiento->tipo ? 'text-success' : '' }}">{{ ($movimiento->tipo ? '+' : '-') . ' $' . number_format($movimiento->valor, 0, ',', '.') }}</span></th>
                                <td>{{ $movimiento->descripcion }}</td>
                                <td>{{ $movimiento->categoria->nombre }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No hay movimientos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
