@extends('layouts.app')

@section('template_title')
    {{ $task->name ?? __('Show') . " " . __('Task') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Task</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tasks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Client Id:</strong>
                                    {{ $task->client_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Persona Contacto:</strong>
                                    {{ $task->persona_contacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono Contacto:</strong>
                                    {{ $task->telefono_contacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $task->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo Electronico:</strong>
                                    {{ $task->correo_electronico }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $task->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Poblacion:</strong>
                                    {{ $task->poblacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo Postal:</strong>
                                    {{ $task->codigo_postal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Provincia:</strong>
                                    {{ $task->provincia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $task->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Creacion:</strong>
                                    {{ $task->fecha_creacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Operario Encargado:</strong>
                                    {{ $task->operario_encargado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Realizacion:</strong>
                                    {{ $task->fecha_realizacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Anotaciones Anteriores:</strong>
                                    {{ $task->anotaciones_anteriores }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Anotaciones Posteriores:</strong>
                                    {{ $task->anotaciones_posteriores }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fichero Resumen:</strong>
                                    {{ $task->fichero_resumen }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
