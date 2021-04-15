@extends('layouts/frontend_master')
@section('title', 'Warta')
@section('content')

<body>
    <div class="container ">
        <div class="container ">
            <!-- <iframe src="https://docs.google.com/viewer?url={{$warta->filename}}&embedded=true"
                style="width:70%; height:80%;" frameborder="0"></iframe> -->
                <iframe
                src="https://drive.google.com/viewerng/viewer?url=https://{{ asset('/') }}{{$warta->filename}}?pid=explorer&efh=false&a=v&chrome=false&embedded=true"
                width="100%" height="600" frameborder="0" scrolling="yes" />
        </div>
    </div>
</body>

@endsection