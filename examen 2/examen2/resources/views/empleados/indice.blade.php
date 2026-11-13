@extends('layouts.admin')

@section('title', 'Empleados')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Nómina y personal</h1>
            <p class="page-subtitle">Personal y técnicos agrónomos de AGROVALLE.</p>
        </div>
        <a href="{{ route('empleados.create') }}" class="btn-custom btn-custom-primary">
            <i class="bi bi-plus-lg"></i> Nuevo empleado
        </a>
    </div>

    @php
        $colores = [
          'Ingeniero Agrónomo' => 'bg-success',
          'Asesor Técnico de Campo' => 'bg-primary',
          'Jefe de Bodega Central' => 'bg-warning text-dark',
          'Operador de Maquinaria' => 'bg-info text-dark',
          'Cajero' => 'bg-secondary',
        ];
    @endphp

    <div class="table-card-custom">
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                <tr>
                    <th>Identidad</th>
                    <th>Empleado</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Ingreso</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($empleados as $empleado)
                    <tr>
                        <td class="table-order-id">{{ $empleado->identidad }}</td>
                        <td>
                            <div class="table-user-name">{{ $empleado->nombre }} {{ $empleado->apellido }}</div>
                            <div class="table-user-sub">{{ $empleado->correo }}</div>
                        </td>
                        <td><span class="badge rounded-pill {{ $colores[$empleado->cargo] ?? 'bg-secondary' }}">{{ $empleado->cargo }}</span></td>
                        <td class="table-amount">L. {{ number_format($empleado->salario, 2) }}</td>
                        <td>{{ $empleado->fecha_ingreso->format('d/m/Y') }}</td>
                        <td>
                            @if ($empleado->estado === 'Activo')
                                <span class="badge-table success">Activo</span>
                            @else
                                <span class="badge rounded-pill bg-secondary">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('empleados.edit', $empleado) }}" class="table-btn-action" title="Editar"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar a este empleado?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="table-btn-action delete" title="Eliminar" style="cursor:pointer;"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No hay empleados registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-footer-control">
            {{ $empleados->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
