@extends('layouts.app')

@section('template_title')
{{ __('Create') }} User
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} User</span>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('employees.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('employee.form', ['roles' => $roles])

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection