<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public const CARGOS = ['Ingeniero Agrónomo', 'Asesor Técnico de Campo', 'Jefe de Bodega Central', 'Operador de Maquinaria', 'Cajero'];

    protected $fillable = [
        'identidad', 'nombre', 'apellido', 'correo', 'cargo',
        'salario', 'fecha_ingreso', 'estado',
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
    ];
}

?>
