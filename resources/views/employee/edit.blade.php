@extends('layouts.app')

@section('template_title')
{{ __('Update') }} User
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Update') }} User</span>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('employees.update', $user->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('employee.form', ['roles' => $roles])

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection