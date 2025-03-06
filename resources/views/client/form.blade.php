<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="cif" class="form-label">{{ __('Cif') }}</label>
            <input type="text" name="cif" class="form-control @error('cif') is-invalid @enderror" value="{{ old('cif', $client?->cif) }}" id="cif" placeholder="Cif">
            {!! $errors->first('cif', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $client?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $client?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $client?->correo) }}" id="correo" placeholder="Correo">
            {!! $errors->first('correo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cuenta_corriente" class="form-label">{{ __('Cuenta Corriente') }}</label>
            <input type="text" name="cuenta_corriente" class="form-control @error('cuenta_corriente') is-invalid @enderror" value="{{ old('cuenta_corriente', $client?->cuenta_corriente) }}" id="cuenta_corriente" placeholder="Cuenta Corriente">
            {!! $errors->first('cuenta_corriente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pais" class="form-label">{{ __('Pais') }}</label>
            <select name="pais" id="pais" class="form-control @error('pais') is-invalid @enderror">
                <option value="">{{ __('Seleccione un país') }}</option>
                @foreach ($countries as $country => $currency)
                    <option value="{{ $country }}" {{ old('pais', $client?->pais) == $country ? 'selected' : '' }}>{{ $country }}</option>
                @endforeach
            </select>
            {!! $errors->first('pais', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="importe_cuota_mensual" class="form-label">{{ __('Importe Cuota Mensual') }}</label>
            <input type="text" name="importe_cuota_mensual" class="form-control @error('importe_cuota_mensual') is-invalid @enderror" value="{{ old('importe_cuota_mensual', $client?->importe_cuota_mensual) }}" id="importe_cuota_mensual" placeholder="Importe Cuota Mensual">
            {!! $errors->first('importe_cuota_mensual', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
