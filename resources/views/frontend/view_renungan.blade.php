@extends('layouts/frontend_master')
@section('title', 'Renungan')
@section('content')

<div class="container">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">

            <div class="text-center">
                <h3><b>{{$renungan->title}}</b></h3>
                <h6>{{$renungan->verse}}</h6>
            </div>
        </div>

        <div class="card-body text-left" style="white-space: pre-line">
            <div class="renungan-image center">
                <img src="/{{$renungan->image_url}}">
            </div>
            <p>
                {{$renungan->content}}
            </p>
        </div>
        <!-- /.card-body -->
    </div>
</div>

@endsection