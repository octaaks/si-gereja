@extends('layouts/frontend_master')
@section('title', 'Liturgi')
@section('content')

<body>
    <div class="container ">
        <div class="container ">
            <iframe
                src="https://drive.google.com/viewerng/viewer?url=https://{{ asset('/') }}{{$liturgi->filename}}?pid=explorer&efh=false&a=v&chrome=false&embedded=true"
                width="100%" height="600" frameborder="0" scrolling="yes" />
        </div>
    </div>
</body>

@endsection
