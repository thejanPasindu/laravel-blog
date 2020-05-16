@extends('layouts.app')

@section('content')

<style>
    .alrt {
        width: 90%;
        margin: auto;
        padding-top: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div class="alrt">
                        @include('layouts.msg')
                    </div>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection