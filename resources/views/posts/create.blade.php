@extends('main')
@section('title','Create New Post')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Create New Post</h2>
            <hr>
            {!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) !!}

            {{ Form::label('title','Title: ') }}
            {{ Form::text('title',null,array('class'=>'form-control','required'=>'', 'maxlength'=>'255')) }}

            {{ Form::label('body','Body Of Post: ') }}
            {{ Form::textarea('body',null,array('class'=>'form-control','required'=>'')) }}

            {{Form::submit('Save Post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px;'))}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection