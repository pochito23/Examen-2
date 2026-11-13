<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    public const CATEGORIAS = ['Químicos', 'Semilleros', 'Maquinaria'];
    public const DIAS_CREDITO = [15, 30, 45, 60];

    protected $table = 'proveedores';

    protected $fillable = [
        'rtn', 'empresa', 'contacto', 'telefono', 'categoria',
        'limite_credito', 'dias_credito', 'estado', 'fecha_registro',
    ];

    protected $casts = [
        'fecha_registro' => 'date',
    ];
}

?>
