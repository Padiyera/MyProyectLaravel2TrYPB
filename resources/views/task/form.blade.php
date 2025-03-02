<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="client_id" class="form-label">{{ __('Client Id') }}</label>
            <input type="text" name="client_id" class="form-control @error('client_id') is-invalid @enderror" value="{{ old('client_id', $task?->client_id) }}" id="client_id" placeholder="Client Id">
            {!! $errors->first('client_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="persona_contacto" class="form-label">{{ __('Persona Contacto') }}</label>
            <input type="text" name="persona_contacto" class="form-control @error('persona_contacto') is-invalid @enderror" value="{{ old('persona_contacto', $task?->persona_contacto) }}" id="persona_contacto" placeholder="Persona Contacto">
            {!! $errors->first('persona_contacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono_contacto" class="form-label">{{ __('Telefono Contacto') }}</label>
            <input type="text" name="telefono_contacto" class="form-control @error('telefono_contacto') is-invalid @enderror" value="{{ old('telefono_contacto', $task?->telefono_contacto) }}" id="telefono_contacto" placeholder="Telefono Contacto">
            {!! $errors->first('telefono_contacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $task?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo_electronico" class="form-label">{{ __('Correo Electronico') }}</label>
            <input type="text" name="correo_electronico" class="form-control @error('correo_electronico') is-invalid @enderror" value="{{ old('correo_electronico', $task?->correo_electronico) }}" id="correo_electronico" placeholder="Correo Electronico">
            {!! $errors->first('correo_electronico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $task?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="poblacion" class="form-label">{{ __('Poblacion') }}</label>
            <input type="text" name="poblacion" class="form-control @error('poblacion') is-invalid @enderror" value="{{ old('poblacion', $task?->poblacion) }}" id="poblacion" placeholder="Poblacion">
            {!! $errors->first('poblacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_postal" class="form-label">{{ __('Codigo Postal') }}</label>
            <input type="text" name="codigo_postal" class="form-control @error('codigo_postal') is-invalid @enderror" value="{{ old('codigo_postal', $task?->codigo_postal) }}" id="codigo_postal" placeholder="Codigo Postal">
            {!! $errors->first('codigo_postal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="provincia" class="form-label">{{ __('Provincia') }}</label>
            <select name="provincia" class="form-control @error('provincia') is-invalid @enderror" id="provincia">
                <option value="">Seleccione una provincia</option>
                <option value="01" {{ old('provincia', $task?->provincia) == '01' ? 'selected' : '' }}>Álava</option>
              
            </select>
            {!! $errors->first('provincia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" class="form-control @error('estado') is-invalid @enderror" id="estado">
                <option value="P" {{ old('estado', $task?->estado) == 'P' ? 'selected' : '' }}>Pendiente</option>
                <option value="R" {{ old('estado', $task?->estado) == 'R' ? 'selected' : '' }}>Realizada</option>
                <option value="C" {{ old('estado', $task?->estado) == 'C' ? 'selected' : '' }}>Cancelada</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="operario_encargado" class="form-label">{{ __('Operario Encargado') }}</label>
            <input type="text" name="operario_encargado" class="form-control @error('operario_encargado') is-invalid @enderror" value="{{ old('operario_encargado', $task?->operario_encargado) }}" id="operario_encargado" placeholder="Operario Encargado">
            {!! $errors->first('operario_encargado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_realizacion" class="form-label">{{ __('Fecha Realizacion') }}</label>
            <input type="text" name="fecha_realizacion" class="form-control @error('fecha_realizacion') is-invalid @enderror" value="{{ old('fecha_realizacion', $task?->fecha_realizacion ? \Carbon\Carbon::parse($task->fecha_realizacion)->format('d/m/Y') : '') }}" id="fecha_realizacion" placeholder="Fecha Realizacion">
            {!! $errors->first('fecha_realizacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="anotaciones_anteriores" class="form-label">{{ __('Anotaciones Anteriores') }}</label>
            <input type="text" name="anotaciones_anteriores" class="form-control @error('anotaciones_anteriores') is-invalid @enderror" value="{{ old('anotaciones_anteriores', $task?->anotaciones_anteriores) }}" id="anotaciones_anteriores" placeholder="Anotaciones Anteriores">
            {!! $errors->first('anotaciones_anteriores', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="anotaciones_posteriores" class="form-label">{{ __('Anotaciones Posteriores') }}</label>
            <input type="text" name="anotaciones_posteriores" class="form-control @error('anotaciones_posteriores') is-invalid @enderror" value="{{ old('anotaciones_posteriores', $task?->anotaciones_posteriores) }}" id="anotaciones_posteriores" placeholder="Anotaciones Posteriores">
            {!! $errors->first('anotaciones_posteriores', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fichero_resumen" class="form-label">{{ __('Fichero Resumen') }}</label>
            <input type="text" name="fichero_resumen" class="form-control @error('fichero_resumen') is-invalid @enderror" value="{{ old('fichero_resumen', $task?->fichero_resumen) }}" id="fichero_resumen" placeholder="Fichero Resumen">
            {!! $errors->first('fichero_resumen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#fecha_realizacion').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            language: 'es',
            startDate: new Date()
        });
    });
</script>