@extends('layouts.app')

@section('template_title')
{{ __('Update') }} Task
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Update') }} Task</span>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('tasks.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('task.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection