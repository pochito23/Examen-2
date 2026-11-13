@extends('layouts.admin')

@section('title', 'Editar insumo')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Editar insumo</h1>
        </div>
        <a href="{{ route('insumos.index') }}" class="btn-custom btn-custom-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card border-light shadow-sm p-4">
        <form action="{{ route('insumos.update', $insumo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('insumos.formulario')
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn-custom btn-custom-primary"><i class="bi bi-check-lg"></i> Actualizar</button>
                <a href="{{ route('insumos.index') }}" class="btn-custom btn-custom-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
