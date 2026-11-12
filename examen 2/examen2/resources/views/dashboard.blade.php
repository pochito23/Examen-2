@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="page-subtitle">Indicadores generales de AGROVALLE Honduras.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6 col-xl-3">
            <div class="card card-stat">
                <div class="card-header">
                    <span class="stat-label">Total de Insumos en Catálogo</span>
                    <i class="bi bi-box-seam fs-4 text-muted-green"></i>
                </div>
                <div class="stat-value">{{ $totalInsumos }}</div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card card-stat">
                <div class="card-header">
                    <span class="stat-label">Proveedores Activos</span>
                    <i class="bi bi-truck fs-4 text-muted-green"></i>
                </div>
                <div class="stat-value">{{ $proveedoresActivos }}</div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card card-stat">
                <div class="card-header">
                    <span class="stat-label">Empleados en Nómina</span>
                    <i class="bi bi-people fs-4 text-muted-green"></i>
                </div>
                <div class="stat-value">{{ $totalEmpleados }}</div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card card-stat">
                <div class="card-header">
                    <span class="stat-label">Valor Total del Inventario</span>
                    <i class="bi bi-cash-coin fs-4 text-muted-green"></i>
                </div>
                <div class="stat-value">L. {{ number_format($valorInventario, 2) }}</div>
            </div>
        </div>
    </div>
@endsection
