@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $mensaje . ' ' . $usuario->nombre }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($usuario->cuentas as $cuenta)
            <div class="col col-sm-12 col-md-4 col-lg-3">
                <div class="card mt-3">
                    <a href="{{ route('cuenta', ['id' => $cuenta->id]) }}">
                        <div class="card-body">
                            <h5 class="card-title">$ {{ $cuenta->saldo }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $cuenta->nombre }}</h6>
                        </div>
                    </a>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill {{ $cuenta->activo ? 'bg-success' : 'bg-danger' }}">
                        {{ $cuenta->activo ? 'Activo' : 'Inactivo' }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </div>
            </div>
        @empty
            <p>El usuario no tiene cuentas</p>
        @endforelse
    </div>
</div>
@endsection
