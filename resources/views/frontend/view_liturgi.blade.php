@extends('layouts/frontend_master')
@section('title', 'Liturgi')
@section('content')

<div class="container">
    <h4>{{$warta->title}}</h4>
    <div class="d-flex justify-content-center">

        <iframe src="https://docs.google.com/viewer?url={{$liturgi->filename}}&embedded=true"
            style="width:90%; height:80%;" frameborder="0"></iframe>
    </div>
</div>

@endsection