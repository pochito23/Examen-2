@extends('layouts.admin')

@section('title', 'Insumos')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Insumos agropecuarios</h1>
            <p class="page-subtitle">Catálogo e inventario de insumos.</p>
        </div>
        <a href="{{ route('insumos.create') }}" class="btn-custom btn-custom-primary">
            <i class="bi bi-plus-lg"></i> Nuevo insumo
        </a>
    </div>

    <div class="table-card-custom">
        <div class="table-header-control">
            <form method="GET" action="{{ route('insumos.index') }}" class="d-flex flex-wrap gap-2 align-items-center">
                <div class="table-search-box">
                    <i class="bi bi-search table-search-icon"></i>
                    <input type="text" name="buscar" value="{{ $buscar }}" class="table-search-input" placeholder="Buscar por nombre o SKU...">
                </div>
                <button type="submit" class="btn-table-action"><i class="bi bi-search"></i> Buscar</button>
                @if ($buscar)
                    <a href="{{ route('insumos.index') }}" class="btn-table-action">Limpiar</a>
                @endif
            </form>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Código</th>
                    <th>Insumo</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Vence</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($insumos as $insumo)
                    <tr>
                        <td>
                            @if ($insumo->imagen)
                                <img src="{{ asset('uploads/insumos/' . $insumo->imagen) }}" alt="{{ $insumo->nombre }}"
                                     style="width:44px;height:44px;object-fit:cover;border-radius:8px;">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light text-muted"
                                     style="width:44px;height:44px;border-radius:8px;"><i class="bi bi-image"></i></div>
                            @endif
                        </td>
                        <td class="table-order-id">{{ $insumo->codigo }}</td>
                        <td>
                            <div class="table-user-name">{{ $insumo->nombre }}</div>
                            <div class="table-user-sub">{{ $insumo->fabricante }} • Lote {{ $insumo->numero_lote }}</div>
                        </td>
                        <td>{{ $insumo->categoria }}</td>
                        <td class="table-amount">L. {{ number_format($insumo->precio, 2) }}</td>
                        <td>
                            <div class="mb-1 fw-bold">{{ $insumo->inventario }} uds.</div>
                            @if ($insumo->inventario > 20)
                                <span class="badge-table success">Óptimo</span>
                            @elseif ($insumo->inventario >= 10)
                                <span class="badge-table pending">Moderado</span>
                            @else
                                <span class="badge-table failed">¡Desabastecimiento!</span>
                            @endif
                        </td>
                        <td>{{ $insumo->fecha_vencimiento ? $insumo->fecha_vencimiento->format('d/m/Y') : '—' }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('insumos.edit', $insumo) }}" class="table-btn-action" title="Editar"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este insumo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="table-btn-action delete" title="Eliminar" style="cursor:pointer;"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No hay insumos registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-footer-control">
            {{ $insumos->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
