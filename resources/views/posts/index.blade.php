@extends('layouts.app')

@section('content')

<style>
    .page-number {
        margin-top: 10px;
    }

    .card {
        margin: 5px;
    }

    .alrt {
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
                    <h3> Post</h3>
                </div>


                <div class="alrt">
                    @include('layouts.msg')
                </div>

                <div class="card-body">
                    @foreach($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <img style='width:100%;' src="/storage/cover_img/{{$post->cover_img}}" alt="">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>

                                    <p>{!!substr(($post->body), 0, 1000 )!!}&nbsp;&nbsp; <a href="/posts/{{$post->id}}">Read more...</a></p>
                                    <small>{{$post->created_at}} by {{$post->user->name}}</small>
                                </div>
                            </div>

                        </div>

                    </div>
                    @endforeach

                    <div class="page-number"> {{$posts->links()}} </div>
                </div>

                <div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection