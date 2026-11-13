@extends('layouts.admin')

@section('title', 'Editar proveedor')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Editar proveedor</h1>
        </div>
        <a href="{{ route('proveedores.index') }}" class="btn-custom btn-custom-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card border-light shadow-sm p-4">
        <form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
            @csrf
            @method('PUT')
            @include('proveedores.formulario')
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn-custom btn-custom-primary"><i class="bi bi-check-lg"></i> Actualizar</button>
                <a href="{{ route('proveedores.index') }}" class="btn-custom btn-custom-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
