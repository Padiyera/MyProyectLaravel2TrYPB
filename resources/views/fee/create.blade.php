@extends('layouts.app')

@section('template_title')
{{ __('Create') }} Fee
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} Fee</span>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('fees.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('fees.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('fee.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection