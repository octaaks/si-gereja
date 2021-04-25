@extends('layouts/frontend_master')
@section('title', 'Liturgi')
@section('content')

<div class="container">
    <h4>{{$liturgi->title}}</h4>
    <div class="d-flex justify-content-center">

        <iframe src="http://docs.google.com/gview?url={{ asset('/') }}{{$liturgi->filename}}&embedded=true" width="100%"
            height="600" frameborder="0" scrolling="yes"></iframe>

    </div>
    <a class="btn btn-info mt-3" href="{{ asset('/') }}{{$liturgi->filename}}"><i class="fas fa-file-download"></i>
        DOWNLOAD
        LITURGI</a>
</div>
</div>

@endsection