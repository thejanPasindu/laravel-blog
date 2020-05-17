@extends('layouts.app')

@section('content')

<style>
    .page-number {
        margin-top: 10px;
    }

    .card {
        margin: 5px;
    }
    .alrt{
        width: 90%;
        margin: auto;
        padding-top: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create Post
                </div>

                <div class="alrt">
                    @include('layouts.msg')
                </div>
                

                <div class="card-body">
                    <div>

                        {!! Form::open(['action'=>'PostController@store', 'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title:')}}
                            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('body', 'Body:')}}
                            {{Form::textarea('body', '', ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Body Text'])}}
                        </div>

                        {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>

                </div>

                <div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection