<div class="row g-3">
    <div class="col-md-6">
        <label for="identidad" class="form-label-custom">Identidad (DNI, 13 dígitos sin guiones)</label>
        <input type="text" name="identidad" id="identidad" value="{{ old('identidad', $empleado->identidad ?? '') }}" maxlength="13" inputmode="numeric"
               class="form-control-custom @error('identidad') is-invalid is-invalid-custom @enderror">
        @error('identidad')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="correo" class="form-label-custom">Correo</label>
        <input type="email" name="correo" id="correo" value="{{ old('correo', $empleado->correo ?? '') }}"
               class="form-control-custom @error('correo') is-invalid is-invalid-custom @enderror">
        @error('correo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="nombre" class="form-label-custom">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $empleado->nombre ?? '') }}"
               class="form-control-custom @error('nombre') is-invalid is-invalid-custom @enderror">
        @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="apellido" class="form-label-custom">Apellido</label>
        <input type="text" name="apellido" id="apellido" value="{{ old('apellido', $empleado->apellido ?? '') }}"
               class="form-control-custom @error('apellido') is-invalid is-invalid-custom @enderror">
        @error('apellido')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="cargo" class="form-label-custom">Cargo</label>
        <select name="cargo" id="cargo" class="form-select-custom @error('cargo') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach (\App\Models\Empleado::CARGOS as $op)
                <option value="{{ $op }}" {{ (string) old('cargo', $empleado->cargo ?? '') === (string) $op ? 'selected' : '' }}>{{ $op }}</option>
            @endforeach
        </select>
        @error('cargo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="salario" class="form-label-custom">Salario base mensual (L.)</label>
        <input type="number" name="salario" id="salario" value="{{ old('salario', $empleado->salario ?? '') }}" step="0.01" min="0"
               class="form-control-custom @error('salario') is-invalid is-invalid-custom @enderror">
        @error('salario')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="fecha_ingreso" class="form-label-custom">Fecha de ingreso</label>
        <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="{{ old('fecha_ingreso', isset($empleado) ? $empleado->fecha_ingreso->format('Y-m-d') : '') }}"
               class="form-control-custom @error('fecha_ingreso') is-invalid is-invalid-custom @enderror">
        @error('fecha_ingreso')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="estado" class="form-label-custom">Estado</label>
        <select name="estado" id="estado" class="form-select-custom @error('estado') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach (['Activo', 'Inactivo'] as $op)
                <option value="{{ $op }}" {{ (string) old('estado', $empleado->estado ?? 'Activo') === (string) $op ? 'selected' : '' }}>{{ $op }}</option>
            @endforeach
        </select>
        @error('estado')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
