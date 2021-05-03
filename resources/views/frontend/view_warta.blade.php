@extends('layouts/frontend_master')
@section('title', 'Warta')
@section('content')

<div class="container">
    <h4>{{$warta->title}}</h4>
    <div class="d-flex justify-content-center">

        <iframe src="http://docs.google.com/gview?url={{ asset('/') }}{{$warta->filename}}&embedded=true" width="100%"
            height="600" frameborder="0" scrolling="yes"></iframe>

    </div>
    <a class="btn btn-info mt-3" href="{{ asset('/') }}{{$warta->filename}}"><i class="fas fa-file-download"></i>
        DOWNLOAD
        WARTA</a>
</div>
</div>

@endsection