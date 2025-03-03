<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
        </div>
        <div class="form-group mb-2 mb20">
            <label for="role" class="form-label">{{ __('Role') }}</label>
            <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ old('role', optional($user?->roles->first())->name) == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('role', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>