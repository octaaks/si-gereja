@extends('layouts/frontend_master')
@section('title', 'Warta')
@section('content')

<body>
    <div class="container ">
        <div class="container ">
            <iframe src="https://docs.google.com/viewer?url={{$warta->filename}}&embedded=true"
                style="width:70%; height:80%;" frameborder="0"></iframe>
        </div>
    </div>
</body>

@endsection