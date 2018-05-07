@extends('main')
@section('title','Edit Post')
@section('content')
    <div class="row">
        {!! Form::model($post,['route'=>['posts.update',$post->id],'data-parsley-validate'=>'', 'method'=>'PUT']) !!}
        <div class="col-md-8">
            {{Form::label('title','Post Title: ')}}
            {{Form::text('title',null,["class"=>'form-control input-lg','required'=>'', 'maxlength'=>'255'])}}
            {{Form::label('body','Post Description: ',['class'=>'form-spacing-top'])}}
            {{Form::textarea('body',null,["class"=>'form-control','required'=>''])}}
            {{--<p class="lead">{{$post->body}}</p>--}}
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At: </dt>
                    <dd>{{date('M d, Y h:ia',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Modified At: </dt>
                    <dd>{{date('M d, Y h:ia',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                        {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}} {{-- the above line works same as this line --}}
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Update',['class'=>'btn btn-success btn-block'])}}
                        {{--this is submit button--}}
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}

    </div>
@stop