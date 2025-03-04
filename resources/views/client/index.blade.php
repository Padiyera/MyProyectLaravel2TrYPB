@can('contenido')
@extends('layouts.app')

@section('template_title')
Clients
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Clients') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Cif</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Cuenta Corriente</th>
                                    <th>Pais</th>
                                    <th>Moneda</th>
                                    <th>Importe Cuota Mensual</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $client->cif }}</td>
                                    <td>{{ $client->nombre }}</td>
                                    <td>{{ $client->telefono }}</td>
                                    <td>{{ $client->correo }}</td>
                                    <td>{{ $client->cuenta_corriente }}</td>
                                    <td>{{ $client->pais }}</td>
                                    <td>{{ $client->moneda }}</td>
                                    <td>{{ $client->importe_cuota_mensual }}</td>

                                    <td>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('clients.show', $client->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('clients.edit', $client->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $clients->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
@else
<div class="alert alert-danger m-4">
    No tienes los permisos necesarios.
</div>
<a href="{{ url('/') }}" class="btn btn-primary m-4">Volver al inicio</a>
@endcan