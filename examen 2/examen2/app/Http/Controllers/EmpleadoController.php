<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    private function reglas($id = null)
    {
        return [
            'identidad' => ['required', 'digits:13', Rule::unique('empleados', 'identidad')->ignore($id)],
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:150'],
            'cargo' => ['required', Rule::in(Empleado::CARGOS)],
            'salario' => ['required', 'numeric', 'gt:0'],
            'fecha_ingreso' => ['required', 'date'],
            'estado' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    private $mensajes = [
        'required' => 'El campo :attribute es obligatorio.',
        'unique' => 'Esta :attribute ya está registrada.',
        'digits' => 'La :attribute debe tener exactamente :digits dígitos numéricos, sin guiones.',
        'email' => 'Ingresa un correo válido.',
        'numeric' => 'El campo :attribute debe ser numérico.',
        'gt.numeric' => 'El :attribute debe ser mayor que :value.',
        'in' => 'El valor seleccionado en :attribute no es válido.',
        'date' => 'El campo :attribute no es una fecha válida.',
        'max.string' => 'El campo :attribute no puede tener más de :max caracteres.',
    ];

    private $atributos = [
        'identidad' => 'identidad',
        'fecha_ingreso' => 'fecha de ingreso',
    ];

    public function index()
    {
        $empleados = Empleado::orderBy('id', 'desc')->paginate(10);

        return view('empleados.indice', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.crear');
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(), $this->mensajes, $this->atributos);

        Empleado::create($datos);

        return redirect()->route('empleados.index')->with('success', 'Empleado registrado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.editar', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $datos = $request->validate($this->reglas($empleado->id), $this->mensajes, $this->atributos);

        $empleado->update($datos);

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
