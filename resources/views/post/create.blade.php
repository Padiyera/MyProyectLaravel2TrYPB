@extends('layouts.app')

@section('template_title')
{{ __('Create') }} Post
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} Post</span>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"> {{ __('Back') }}</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('post.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection