@extends('layouts.app')

@section('content')

<style>
    .alrt {
        width: 90%;
        margin: auto;
        padding-top: 5px;
    }
    .btn{
        margin-bottom: 5px
    }
    .card{
        margin: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div class="alrt">
                        @include('layouts.msg')
                    </div>

                    <div>
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    </div>

                    @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                            <small>{{$post->created_at}} by {{$post->user->name}}</small>
                            <div class="float-right pull-right">
                                <a href="/posts/{{$post->id}}/edit"><i class="fas fa-edit"></i></a>
                                <a href="/posts/delete/{{$post->id}}"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection