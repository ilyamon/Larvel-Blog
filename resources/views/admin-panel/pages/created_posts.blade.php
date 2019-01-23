@extends('admin-panel.admin_template')

@section('title', 'add post')

@section('content')

    <div class="col-md-7">
        {!! Form::open(['route' => 'posts.store']) !!}

        <div class="form-group">
            <div class="col-md-2">
                {{ Form::label('title', 'Title') }}
            </div>

            <div class="col-md-10">
                {{ Form::text('title', null, ['class' => 'form control']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2">
                {{ Form::label('title', 'Slug') }}
            </div>

            <div class="col-md-10">
                {{ Form::text('slug', null, ['class' => 'form control']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2">
                {{ Form::label('title', 'Content') }}
            </div>

            <div class="col-md-10">
                {{ Form::textarea('content', null, ['class' => 'form control']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@endsection