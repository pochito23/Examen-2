<div class="row g-3">
    <div class="col-md-6">
        <label for="rtn" class="form-label-custom">RTN (14 dígitos)</label>
        <input type="text" name="rtn" id="rtn" value="{{ old('rtn', $proveedor->rtn ?? '') }}" maxlength="14" inputmode="numeric"
               class="form-control-custom @error('rtn') is-invalid is-invalid-custom @enderror">
        @error('rtn')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="empresa" class="form-label-custom">Empresa (razón social)</label>
        <input type="text" name="empresa" id="empresa" value="{{ old('empresa', $proveedor->empresa ?? '') }}"
               class="form-control-custom @error('empresa') is-invalid is-invalid-custom @enderror">
        @error('empresa')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="contacto" class="form-label-custom">Contacto (asesor comercial)</label>
        <input type="text" name="contacto" id="contacto" value="{{ old('contacto', $proveedor->contacto ?? '') }}"
               class="form-control-custom @error('contacto') is-invalid is-invalid-custom @enderror">
        @error('contacto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="telefono" class="form-label-custom">Teléfono (8 dígitos)</label>
        <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $proveedor->telefono ?? '') }}" maxlength="8" inputmode="numeric"
               class="form-control-custom @error('telefono') is-invalid is-invalid-custom @enderror">
        @error('telefono')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="categoria" class="form-label-custom">Categoría</label>
        <select name="categoria" id="categoria" class="form-select-custom @error('categoria') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach (\App\Models\Proveedor::CATEGORIAS as $op)
                <option value="{{ $op }}" {{ (string) old('categoria', $proveedor->categoria ?? '') === (string) $op ? 'selected' : '' }}>{{ $op }}</option>
            @endforeach
        </select>
        @error('categoria')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="limite_credito" class="form-label-custom">Límite de crédito (L.)</label>
        <input type="number" name="limite_credito" id="limite_credito" value="{{ old('limite_credito', $proveedor->limite_credito ?? '') }}" step="0.01" min="0"
               class="form-control-custom @error('limite_credito') is-invalid is-invalid-custom @enderror">
        @error('limite_credito')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="dias_credito" class="form-label-custom">Días de crédito</label>
        <select name="dias_credito" id="dias_credito" class="form-select-custom @error('dias_credito') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach (\App\Models\Proveedor::DIAS_CREDITO as $op)
                <option value="{{ $op }}" {{ (string) old('dias_credito', $proveedor->dias_credito ?? '') === (string) $op ? 'selected' : '' }}>{{ $op }} días</option>
            @endforeach
        </select>
        @error('dias_credito')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="estado" class="form-label-custom">Estado</label>
        <select name="estado" id="estado" class="form-select-custom @error('estado') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach (['Activo', 'Inactivo'] as $op)
                <option value="{{ $op }}" {{ (string) old('estado', $proveedor->estado ?? 'Activo') === (string) $op ? 'selected' : '' }}>{{ $op }}</option>
            @endforeach
        </select>
        @error('estado')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="fecha_registro" class="form-label-custom">Fecha de registro</label>
        <input type="date" name="fecha_registro" id="fecha_registro" value="{{ old('fecha_registro', isset($proveedor) ? $proveedor->fecha_registro->format('Y-m-d') : date('Y-m-d')) }}"
               class="form-control-custom @error('fecha_registro') is-invalid is-invalid-custom @enderror">
        @error('fecha_registro')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
