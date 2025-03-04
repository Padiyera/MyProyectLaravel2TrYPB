@extends('layouts.app')

@section('template_title')
Tasks
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Tasks') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body bg-white">
                    @if (!Auth::check())
                    <div class="alert alert-warning">
                        Puedes crear tareas como cliente. <a href="{{ route('login') }}" class="text-muted" style="font-size: 0.9em; float: right;">Iniciar Sesión</a>
                    </div>
                    @endif
                    @can('tasks')
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Contacto</th>
                                    <th>Tlf Contacto</th>
                                    <th>Descripcion</th>
                                    <th>Correo Electronico</th>
                                    <th>CP</th>
                                    <th>Estado</th>
                                    <th>Operario</th>
                                    <th>Fecha Realizacion</th>
                                    <th>Anotaciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $task->persona_contacto }}</td>
                                    <td>{{ $task->telefono_contacto }}</td>
                                    <td>{{ $task->descripcion }}</td>
                                    <td>{{ $task->correo_electronico }}</td>
                                    <td>{{ $task->codigo_postal }}</td>
                                    <td>
                                        @if($task->estado == 'P')
                                        Pendiente
                                        @elseif($task->estado == 'R')
                                        Realizada
                                        @elseif($task->estado == 'C')
                                        Cancelada
                                        @endif
                                    </td>
                                    <td>{{ $task->operario_encargado }}</td>
                                    <td>{{ $task->fecha_realizacion }}</td>
                                    <td>{{ $task->anotaciones_anteriores }}</td>
                                    <td>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @can('ver tareas')
                                            <a class="btn btn-sm btn-primary " href="{{ route('tasks.show', $task->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            @endcan
                                            @can('editar tareas')
                                            <a class="btn btn-sm btn-success" href="{{ route('tasks.edit', $task->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @endcan
                                            @can('eliminar tareas')
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            {!! $tasks->withQueryString()->links() !!}
        </div>
        @endcan
    </div>
</div>
@endsection