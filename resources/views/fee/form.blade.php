<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="concept" class="form-label">{{ __('Concepto') }}</label>
            <input type="text" name="concept" class="form-control @error('concept') is-invalid @enderror" value="{{ old('concept', $fee?->concept) }}" id="concept" placeholder="Concepto">
            {!! $errors->first('concept', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="issue_date" class="form-label">{{ __('Fecha cuota') }}</label>
            <input type="text" name="issue_date" class="form-control @error('issue_date') is-invalid @enderror" value="{{ old('issue_date', $fee?->issue_date ?? now()->format('Y-m-d')) }}" id="issue_date" placeholder="Fecha cuota" readonly>
            {!! $errors->first('issue_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="amount" class="form-label">{{ __('Importe') }}</label>
            <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $fee?->amount) }}" id="amount" placeholder="Importe">
            {!! $errors->first('amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="paid" class="form-label">{{ __('Estado pago') }}</label>
            <select name="paid" class="form-control @error('paid') is-invalid @enderror" id="paid">
                <option value="0" {{ old('paid', $fee?->paid) == 0 ? 'selected' : '' }}>Pendiente</option>
                <option value="1" {{ old('paid', $fee?->paid) == 1 ? 'selected' : '' }}>Pagado</option>
            </select>
            {!! $errors->first('paid', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="payment_date" class="form-label">{{ __('Fecha de pago') }}</label>
            <input type="text" name="payment_date" class="form-control @error('payment_date') is-invalid @enderror" value="{{ old('payment_date', $fee?->payment_date ? $fee->payment_date->format('d/m/Y') : '') }}" id="payment_date" placeholder="Fecha de pago">
            {!! $errors->first('payment_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="notes" class="form-label">{{ __('Notas') }}</label>
            <input type="text" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{ old('notes', $fee?->notes) }}" id="notes" placeholder="Notas">
            {!! $errors->first('notes', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#payment_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            language: 'es',
            startDate: new Date()
        });
    });
</script>