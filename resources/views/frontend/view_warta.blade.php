@extends('layouts/frontend_master')
@section('title', 'Warta')
@section('content')

<body>
    <div class="container ">
        <div class="container ">
        <iframe src="http://docs.google.com/gview?url={{ asset('/') }}{{$warta->filename}}&embedded=true" width="100%" height="600" frameborder="0" scrolling="yes" ></iframe>
        </div>
    </div>
</body>

@endsection
