@extends('layouts/frontend_master')
@section('title', 'Liturgi Ibadah')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Video Gallery</title>
    <!-- <link rel="stylesheet" href="css-video/font.css">
    <link rel="stylesheet" href="css-video/font-awesome.min.css"> -->
    <link rel="stylesheet" href="css-video/style.css">
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
</head>
<div class="container">
    <h4>Liturgi Ibadah</h4>
    <ul class="list-group mt-3">

        @foreach($liturgi as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-6">

                    <a href="liturgi/view/{{$item->id}}">
                        <b>{{$item->title}}</b></a>
                </div>
                <div class="col-lg-6 text-right date-text">
                    Diupload pada: {{$item->date}}
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    {{$liturgi->links()}}

</div>
@endsection