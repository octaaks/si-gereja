@extends('layouts/frontend_master')
@section('title', 'Liturgi')
@section('content')

<div class="container">
    <h4>{{$warta->title}}</h4>
    <div class="d-flex justify-content-center">
        
        <iframe src="http://docs.google.com/gview?url={{ asset('/') }}{{$liturgi->filename}}&embedded=true" width="100%" height="600" frameborder="0" scrolling="yes" ></iframe>

        <div>
            <a href="{{ asset('/') }}{{$liturgi->filename}}">DOWNLOAD LITURGI</a>
        </div>
    </div>
</div>

@endsection
