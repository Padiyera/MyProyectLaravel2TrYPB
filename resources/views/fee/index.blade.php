@can('contenido')
@extends('layouts.app')

@section('template_title')
    Fees
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Fees') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('fees.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Concept</th>
                                        <th>Issue Date</th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Payment Date</th>
                                        <th>Notes</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees as $fee)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $fee->client_name }}</td>
                                            <td>{{ $fee->concept }}</td>
                                            <td>{{ $fee->issue_date }}</td>
                                            <td>{{ $fee->amount }}</td>
                                            <td>{{ $fee->paid ? 'Pagado' : 'Pendiente' }}</td>
                                            <td>{{ $fee->payment_date }}</td>
                                            <td>{{ $fee->notes }}</td>
                                            <td>
                                                <form action="{{ route('fees.destroy', $fee->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('fees.show', $fee->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('fees.edit', $fee->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    <a class="btn btn-sm btn-secondary" href="{{ route('fees.print', $fee->id) }}" target="_blank"><i class="fa fa-fw fa-print"></i> {{ __('Print') }}</a>
                                                    @if($fee->paid)
                                                        <a class="btn btn-sm btn-info" href="{{ route('fees.download', $fee->id) }}"><i class="fa fa-fw fa-download"></i> {{ __('Download PDF') }}</a>
                                                    @endif
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
                {!! $fees->withQueryString()->links() !!}
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
