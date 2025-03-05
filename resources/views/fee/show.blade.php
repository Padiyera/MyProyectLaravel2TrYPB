@extends('layouts.app')

@section('template_title')
{{ $fee->name ?? __('Show') . " " . __('Fee') }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Fee</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('fees.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="form-group mb-2 mb20">
                        <strong>Client Name:</strong>
                        {{ $fee->client_name }} 
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Concept:</strong>
                        {{ $fee->concept }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Issue Date:</strong>
                        {{ $fee->issue_date }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Amount:</strong>
                        {{ $fee->amount }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Paid:</strong>
                        {{ $fee->paid }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Payment Date:</strong>
                        {{ $fee->payment_date }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Notes:</strong>
                        {{ $fee->notes }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection