@extends('layouts.admin')

@section('title', 'Proveedores')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Fabricantes y proveedores</h1>
            <p class="page-subtitle">Red de fabricantes y proveedores agrícolas.</p>
        </div>
        <a href="{{ route('proveedores.create') }}" class="btn-custom btn-custom-primary">
            <i class="bi bi-plus-lg"></i> Nuevo proveedor
        </a>
    </div>

    <div class="table-card-custom">
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                <tr>
                    <th>RTN</th>
                    <th>Empresa</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    <th>Categoría</th>
                    <th>Límite de crédito</th>
                    <th>Plazo</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($proveedores as $proveedor)
                    <tr>
                        <td class="table-order-id">{{ $proveedor->rtn }}</td>
                        <td class="table-product-name">{{ $proveedor->empresa }}</td>
                        <td>{{ $proveedor->contacto }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->categoria }}</td>
                        <td class="table-amount">L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                        <td><span class="badge rounded-pill bg-info-subtle text-info-emphasis">{{ $proveedor->dias_credito }} días</span></td>
                        <td>
                            @if ($proveedor->estado === 'Activo')
                                <span class="badge-table success">Activo</span>
                            @else
                                <span class="badge rounded-pill bg-secondary">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('proveedores.edit', $proveedor) }}" class="table-btn-action" title="Editar"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este proveedor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="table-btn-action delete" title="Eliminar" style="cursor:pointer;"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4 text-muted">No hay proveedores registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-footer-control">
            {{ $proveedores->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
