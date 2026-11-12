<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Insumo;
use App\Models\Proveedor;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInsumos = Insumo::count();
        $proveedoresActivos = Proveedor::where('estado', 'Activo')->count();
        $totalEmpleados = Empleado::count();
        $valorInventario = Insumo::selectRaw('COALESCE(SUM(inventario * precio), 0) as total')->value('total');

        return view('dashboard', compact('totalInsumos', 'proveedoresActivos', 'totalEmpleados', 'valorInventario'));
    }
}
?>
