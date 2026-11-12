<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller{
    private function reglas($id = null)
{
    return [
        'rtn' => ['required', 'digits:14', Rule::unique('proveedores', 'rtn')->ignore($id)],
        'empresa' => ['required', 'string', 'max:150'],
        'contacto' => ['required', 'string', 'max:100'],
        'telefono' => ['required', 'regex:/^[2389][0-9]{7}$/'],
        'categoria' => ['required', Rule::in(Proveedor::CATEGORIAS)],
        'limite_credito' => ['required', 'numeric', 'min:0'],
        'dias_credito' => ['required', Rule::in(Proveedor::DIAS_CREDITO)],
        'estado' => ['required', Rule::in(['Activo', 'Inactivo'])],
        'fecha_registro' => ['required', 'date'],
    ];
}

    private $mensajes = [
    'required' => 'El campo :attribute es obligatorio.',
    'unique' => 'Este :attribute ya está registrado.',
    'digits' => 'El :attribute debe tener exactamente :digits dígitos numéricos.',
    'telefono.regex' => 'El teléfono debe tener 8 dígitos e iniciar en 2, 3, 8 o 9.',
    'numeric' => 'El campo :attribute debe ser numérico.',
    'min.numeric' => 'El :attribute debe ser mayor o igual a :min.',
    'in' => 'El valor seleccionado en :attribute no es válido.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'max.string' => 'El campo :attribute no puede tener más de :max caracteres.',
];

    private $atributos = [
    'rtn' => 'RTN',
    'telefono' => 'teléfono',
    'categoria' => 'categoría',
    'limite_credito' => 'límite de crédito',
    'dias_credito' => 'días de crédito',
    'fecha_registro' => 'fecha de registro',
];

    public function index()
{
    $proveedores = Proveedor::orderBy('id', 'desc')->paginate(10);

    return view('proveedores.index', compact('proveedores'));
}

    public function create()
{
    return view('proveedores.create');
}

    public function store(Request $request)
{
    $datos = $request->validate($this->reglas(), $this->mensajes, $this->atributos);

    Proveedor::create($datos);

    return redirect()->route('proveedores.index')->with('success', 'Proveedor registrado correctamente.');
}

    public function edit(Proveedor $proveedor)
{
    return view('proveedores.edit', compact('proveedor'));
}

    public function update(Request $request, Proveedor $proveedor)
{
    $datos = $request->validate($this->reglas($proveedor->id), $this->mensajes, $this->atributos);

    $proveedor->update($datos);

    return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
}

    public function destroy(Proveedor $proveedor)
{
    $proveedor->delete();

    return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
}
}
