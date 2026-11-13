@extends('layouts.admin')

@section('title', 'Nuevo insumo')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Nuevo insumo</h1>
        </div>
        <a href="{{ route('insumos.index') }}" class="btn-custom btn-custom-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card border-light shadow-sm p-4">
        <form action="{{ route('insumos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('insumos.formulario')
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn-custom btn-custom-primary"><i class="bi bi-check-lg"></i> Guardar</button>
                <a href="{{ route('insumos.index') }}" class="btn-custom btn-custom-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
