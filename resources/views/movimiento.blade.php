@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Nuevo Movimiento en {{ $cuenta->nombre }}</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="tipo-1" value="1">
                                    <label class="form-check-label" for="tipo-1">Entrada</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="tipo-0" value="0" checked>
                                    <label class="form-check-label" for="tipo-0">Salida</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
