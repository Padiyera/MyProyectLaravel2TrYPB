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
                <option value="02" {{ old('provincia', $task?->provincia) == '02' ? 'selected' : '' }}>Albacete</option>
                <option value="03" {{ old('provincia', $task?->provincia) == '03' ? 'selected' : '' }}>Alicante</option>
                <option value="04" {{ old('provincia', $task?->provincia) == '04' ? 'selected' : '' }}>Almería</option>
                <option value="05" {{ old('provincia', $task?->provincia) == '05' ? 'selected' : '' }}>Ávila</option>
                <option value="06" {{ old('provincia', $task?->provincia) == '06' ? 'selected' : '' }}>Badajoz</option>
                <option value="07" {{ old('provincia', $task?->provincia) == '07' ? 'selected' : '' }}>Islas Baleares</option>
                <option value="08" {{ old('provincia', $task?->provincia) == '08' ? 'selected' : '' }}>Barcelona</option>
                <option value="09" {{ old('provincia', $task?->provincia) == '09' ? 'selected' : '' }}>Burgos</option>
                <option value="10" {{ old('provincia', $task?->provincia) == '10' ? 'selected' : '' }}>Cáceres</option>
                <option value="11" {{ old('provincia', $task?->provincia) == '11' ? 'selected' : '' }}>Cádiz</option>
                <option value="12" {{ old('provincia', $task?->provincia) == '12' ? 'selected' : '' }}>Castellón</option>
                <option value="13" {{ old('provincia', $task?->provincia) == '13' ? 'selected' : '' }}>Ciudad Real</option>
                <option value="14" {{ old('provincia', $task?->provincia) == '14' ? 'selected' : '' }}>Córdoba</option>
                <option value="15" {{ old('provincia', $task?->provincia) == '15' ? 'selected' : '' }}>A Coruña</option>
                <option value="16" {{ old('provincia', $task?->provincia) == '16' ? 'selected' : '' }}>Cuenca</option>
                <option value="17" {{ old('provincia', $task?->provincia) == '17' ? 'selected' : '' }}>Girona</option>
                <option value="18" {{ old('provincia', $task?->provincia) == '18' ? 'selected' : '' }}>Granada</option>
                <option value="19" {{ old('provincia', $task?->provincia) == '19' ? 'selected' : '' }}>Guadalajara</option>
                <option value="20" {{ old('provincia', $task?->provincia) == '20' ? 'selected' : '' }}>Guipúzcoa</option>
                <option value="21" {{ old('provincia', $task?->provincia) == '21' ? 'selected' : '' }}>Huelva</option>
                <option value="22" {{ old('provincia', $task?->provincia) == '22' ? 'selected' : '' }}>Huesca</option>
                <option value="23" {{ old('provincia', $task?->provincia) == '23' ? 'selected' : '' }}>Jaén</option>
                <option value="24" {{ old('provincia', $task?->provincia) == '24' ? 'selected' : '' }}>León</option>
                <option value="25" {{ old('provincia', $task?->provincia) == '25' ? 'selected' : '' }}>Lleida</option>
                <option value="26" {{ old('provincia', $task?->provincia) == '26' ? 'selected' : '' }}>La Rioja</option>
                <option value="27" {{ old('provincia', $task?->provincia) == '27' ? 'selected' : '' }}>Lugo</option>
                <option value="28" {{ old('provincia', $task?->provincia) == '28' ? 'selected' : '' }}>Madrid</option>
                <option value="29" {{ old('provincia', $task?->provincia) == '29' ? 'selected' : '' }}>Málaga</option>
                <option value="30" {{ old('provincia', $task?->provincia) == '30' ? 'selected' : '' }}>Murcia</option>
                <option value="31" {{ old('provincia', $task?->provincia) == '31' ? 'selected' : '' }}>Navarra</option>
                <option value="32" {{ old('provincia', $task?->provincia) == '32' ? 'selected' : '' }}>Ourense</option>
                <option value="33" {{ old('provincia', $task?->provincia) == '33' ? 'selected' : '' }}>Asturias</option>
                <option value="34" {{ old('provincia', $task?->provincia) == '34' ? 'selected' : '' }}>Palencia</option>
                <option value="35" {{ old('provincia', $task?->provincia) == '35' ? 'selected' : '' }}>Las Palmas</option>
                <option value="36" {{ old('provincia', $task?->provincia) == '36' ? 'selected' : '' }}>Pontevedra</option>
                <option value="37" {{ old('provincia', $task?->provincia) == '37' ? 'selected' : '' }}>Salamanca</option>
                <option value="38" {{ old('provincia', $task?->provincia) == '38' ? 'selected' : '' }}>Santa Cruz de Tenerife</option>
                <option value="39" {{ old('provincia', $task?->provincia) == '39' ? 'selected' : '' }}>Cantabria</option>
                <option value="40" {{ old('provincia', $task?->provincia) == '40' ? 'selected' : '' }}>Segovia</option>
                <option value="41" {{ old('provincia', $task?->provincia) == '41' ? 'selected' : '' }}>Sevilla</option>
                <option value="42" {{ old('provincia', $task?->provincia) == '42' ? 'selected' : '' }}>Soria</option>
                <option value="43" {{ old('provincia', $task?->provincia) == '43' ? 'selected' : '' }}>Tarragona</option>
                <option value="44" {{ old('provincia', $task?->provincia) == '44' ? 'selected' : '' }}>Teruel</option>
                <option value="45" {{ old('provincia', $task?->provincia) == '45' ? 'selected' : '' }}>Toledo</option>
                <option value="46" {{ old('provincia', $task?->provincia) == '46' ? 'selected' : '' }}>Valencia</option>
                <option value="47" {{ old('provincia', $task?->provincia) == '47' ? 'selected' : '' }}>Valladolid</option>
                <option value="48" {{ old('provincia', $task?->provincia) == '48' ? 'selected' : '' }}>Vizcaya</option>
                <option value="49" {{ old('provincia', $task?->provincia) == '49' ? 'selected' : '' }}>Zamora</option>
                <option value="50" {{ old('provincia', $task?->provincia) == '50' ? 'selected' : '' }}>Zaragoza</option>
                <option value="51" {{ old('provincia', $task?->provincia) == '51' ? 'selected' : '' }}>Ceuta</option>
                <option value="52" {{ old('provincia', $task?->provincia) == '52' ? 'selected' : '' }}>Melilla</option>
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
            <input type="text" name="fecha_realizacion" class="form-control @error('fecha_realizacion') is-invalid @enderror" value="{{ old('fecha_realizacion', $task?->fecha_realizacion) }}" id="fecha_realizacion" placeholder="Fecha Realizacion">
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