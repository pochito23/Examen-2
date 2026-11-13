<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class InsumoController extends Controller
{
    private function reglas($id = null)
    {
        return [
            'codigo' => ['required', 'string', 'max:50', Rule::unique('insumos', 'codigo')->ignore($id)],
            'nombre' => ['required', 'string', 'max:150'],
            'categoria' => ['required', Rule::in(Insumo::CATEGORIAS)],
            'precio' => ['required', 'numeric', 'gt:0'],
            'costo' => ['required', 'numeric', 'min:0'],
            'inventario' => ['required', 'integer', 'min:0'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'fabricante' => ['required', 'string', 'max:150'],
            'fecha_vencimiento' => ['nullable', 'date'],
            'fecha_registro' => ['required', 'date'],
            'numero_lote' => ['required', 'string', 'max:50'],
        ];
    }

    private $mensajes = [
        'required' => 'El campo :attribute es obligatorio.',
        'unique' => 'Este :attribute ya está registrado.',
        'numeric' => 'El campo :attribute debe ser numérico.',
        'integer' => 'El campo :attribute debe ser un número entero.',
        'date' => 'El campo :attribute no es una fecha válida.',
        'in' => 'El valor seleccionado en :attribute no es válido.',
        'gt.numeric' => 'El :attribute debe ser mayor que :value.',
        'min.numeric' => 'El :attribute debe ser mayor o igual a :min.',
        'max.string' => 'El campo :attribute no puede tener más de :max caracteres.',
        'image' => 'El archivo debe ser una imagen.',
        'mimes' => 'La imagen debe ser jpg, png o webp.',
        'max.file' => 'La imagen no puede pesar más de 5 MB.',
    ];

    private $atributos = [
        'codigo' => 'código (SKU)',
        'categoria' => 'categoría',
        'inventario' => 'inventario',
        'fecha_vencimiento' => 'fecha de vencimiento',
        'fecha_registro' => 'fecha de registro',
        'numero_lote' => 'número de lote',
    ];

    private function guardarImagen($archivo)
    {
        $nombre = time() . '_' . uniqid() . '.' . $archivo->extension();
        $archivo->move(public_path('uploads/insumos'), $nombre);

        return $nombre;
    }

    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $insumos = Insumo::when($buscar, function ($query) use ($buscar) {
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                    ->orWhere('codigo', 'like', "%{$buscar}%");
            });
        })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('insumos.indice', compact('insumos', 'buscar'));
    }

    public function create()
    {
        return view('insumos.crear');
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(), $this->mensajes, $this->atributos);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $this->guardarImagen($request->file('imagen'));
        }

        Insumo::create($datos);

        return redirect()->route('insumos.index')->with('success', 'Insumo registrado correctamente.');
    }

    public function edit(Insumo $insumo)
    {
        return view('insumos.editar', compact('insumo'));
    }

    public function update(Request $request, Insumo $insumo)
    {
        $datos = $request->validate($this->reglas($insumo->id), $this->mensajes, $this->atributos);

        if ($request->hasFile('imagen')) {
            if ($insumo->imagen) {
                File::delete(public_path('uploads/insumos/' . $insumo->imagen));
            }
            $datos['imagen'] = $this->guardarImagen($request->file('imagen'));
        }

        $insumo->update($datos);

        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado correctamente.');
    }

    public function destroy(Insumo $insumo)
    {
        if ($insumo->imagen) {
            File::delete(public_path('uploads/insumos/' . $insumo->imagen));
        }

        $insumo->delete();

        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado correctamente.');
    }
}
