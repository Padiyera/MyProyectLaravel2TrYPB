@extends('layouts.app')

@section('template_title')
    {{ $client->name ?? __('Show') . " " . __('Client') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Client</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clients.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cif:</strong>
                                    {{ $client->cif }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $client->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $client->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $client->correo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cuenta Corriente:</strong>
                                    {{ $client->cuenta_corriente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pais:</strong>
                                    {{ $client->pais }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Moneda:</strong>
                                    {{ $client->moneda }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Importe Cuota Mensual:</strong>
                                    {{ $client->importe_cuota_mensual }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
