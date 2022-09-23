@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Nuevo Movimiento en {{ $cuenta->nombre }}</div>
                <div class="card-body">
                    <form action="{{ route('nuevoMovimiento', ['id' => $cuenta->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <label class="form-label">Tipo de Movimiento</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="tipo-1" value="1">
                                    <label class="form-check-label" for="tipo-1">Entrada</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="tipo-0" value="0" checked>
                                    <label class="form-check-label" for="tipo-0">Salida</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="valor" class="form-label">Valor</label>
                                    <input type="number" class="form-control" name="valor" id="valor">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="categoria_id" class="form-label">Categoría</label>
                                    <select class="form-select" name="categoria_id" id="categoria_id">
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar Movimiento</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
