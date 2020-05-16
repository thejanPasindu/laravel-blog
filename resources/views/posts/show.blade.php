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

    .btn-my {
        background: transparent;
        font-size: 25px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        padding: 0;
    }

    .my-row a {
        text-decoration: none;
    }

    .my-row {
        display: flex;
        align-items: center;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="my-row">
                        <div>
                            <a href="/posts" class="btn-my" role="button" aria-pressed="true"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                        <div style="margin-left: 5px; font-size: 20px">
                            {{ $post->title }}
                        </div>

                    </div>

                </div>


                <div class="alrt">
                    @include('layouts.msg')
                </div>


                <div class="card-body">
                    <div>
                        {!! $post->body !!}
                    </div>

                    <div>
                        <hr>

                        <div class="row">
                            <small class="col">{{ $post->created_at }}</small>
                            <div class="col">
                                <div class="float-right pull-right">
                                    <a href="/posts/{{$post->id}}/edit"><i class="fas fa-edit"></i></a>
                                    <a href="/posts/delete/{{$post->id}}"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection