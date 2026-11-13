@extends('layouts.admin')

@section('title', 'Nuevo proveedor')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Nuevo proveedor</h1>
        </div>
        <a href="{{ route('proveedores.index') }}" class="btn-custom btn-custom-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card border-light shadow-sm p-4">
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            @include('proveedores.formulario')
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn-custom btn-custom-primary"><i class="bi bi-check-lg"></i> Guardar</button>
                <a href="{{ route('proveedores.index') }}" class="btn-custom btn-custom-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
