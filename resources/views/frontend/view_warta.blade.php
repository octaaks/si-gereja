@extends('layouts/frontend_master')
@section('title', 'Warta')
@section('content')

<div class="container">
    <h4>{{$warta->title}}</h4>
    <div class="d-flex justify-content-center">

        <iframe class="mt-3" src="https://docs.google.com/viewer?url={{$warta->filename}}&embedded=true"
            style="width:95%; height:80%;" frameborder="0"></iframe>
    </div>
</div>

@endsection