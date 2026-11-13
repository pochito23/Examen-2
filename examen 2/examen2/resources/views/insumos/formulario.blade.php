<div class="row g-3">
    <div class="col-md-6">
        <label for="codigo" class="form-label-custom">Código (SKU)</label>
        <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $insumo->codigo ?? '') }}"
               class="form-control-custom @error('codigo') is-invalid is-invalid-custom @enderror">
        @error('codigo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="nombre" class="form-label-custom">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $insumo->nombre ?? '') }}"
               class="form-control-custom @error('nombre') is-invalid is-invalid-custom @enderror">
        @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="categoria" class="form-label-custom">Categoría</label>
        <select name="categoria" id="categoria" class="form-select-custom @error('categoria') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach (\App\Models\Insumo::CATEGORIAS as $op)
                <option value="{{ $op }}" {{ (string) old('categoria', $insumo->categoria ?? '') === (string) $op ? 'selected' : '' }}>{{ $op }}</option>
            @endforeach
        </select>
        @error('categoria')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="fabricante" class="form-label-custom">Fabricante</label>
        <input type="text" name="fabricante" id="fabricante" value="{{ old('fabricante', $insumo->fabricante ?? '') }}"
               class="form-control-custom @error('fabricante') is-invalid is-invalid-custom @enderror">
        @error('fabricante')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="precio" class="form-label-custom">Precio (L.)</label>
        <input type="number" name="precio" id="precio" value="{{ old('precio', $insumo->precio ?? '') }}" step="0.01" min="0"
               class="form-control-custom @error('precio') is-invalid is-invalid-custom @enderror">
        @error('precio')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="costo" class="form-label-custom">Costo (L.)</label>
        <input type="number" name="costo" id="costo" value="{{ old('costo', $insumo->costo ?? '') }}" step="0.01" min="0"
               class="form-control-custom @error('costo') is-invalid is-invalid-custom @enderror">
        @error('costo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inventario" class="form-label-custom">Inventario (unidades)</label>
        <input type="number" name="inventario" id="inventario" value="{{ old('inventario', $insumo->inventario ?? '') }}" min="0"
               class="form-control-custom @error('inventario') is-invalid is-invalid-custom @enderror">
        @error('inventario')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="numero_lote" class="form-label-custom">Número de lote</label>
        <input type="text" name="numero_lote" id="numero_lote" value="{{ old('numero_lote', $insumo->numero_lote ?? '') }}"
               class="form-control-custom @error('numero_lote') is-invalid is-invalid-custom @enderror">
        @error('numero_lote')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="fecha_vencimiento" class="form-label-custom">Fecha de vencimiento</label>
        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" value="{{ old('fecha_vencimiento', isset($insumo) ? optional($insumo->fecha_vencimiento)->format('Y-m-d') : '') }}"
               class="form-control-custom @error('fecha_vencimiento') is-invalid is-invalid-custom @enderror">
        @error('fecha_vencimiento')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="fecha_registro" class="form-label-custom">Fecha de registro</label>
        <input type="date" name="fecha_registro" id="fecha_registro" value="{{ old('fecha_registro', isset($insumo) ? $insumo->fecha_registro->format('Y-m-d') : date('Y-m-d')) }}"
               class="form-control-custom @error('fecha_registro') is-invalid is-invalid-custom @enderror">
        @error('fecha_registro')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label for="imagen" class="form-label-custom">Fotografía del empaque (jpg, png, webp, máx. 5 MB)</label>
        <input type="file" name="imagen" id="imagen" accept=".jpg,.jpeg,.png,.webp"
               class="form-control-custom @error('imagen') is-invalid is-invalid-custom @enderror">
        @error('imagen')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if (isset($insumo) && $insumo->imagen)
            <img src="{{ asset('uploads/insumos/' . $insumo->imagen) }}" alt="{{ $insumo->nombre }}"
                 class="mt-2 rounded" style="height:80px;width:80px;object-fit:cover;">
        @endif
    </div>
</div>
