@extends('layouts/frontend_master')
@section('title', 'Warta Jemaat')
@section('content')

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css-home/style-main.css') }}">
</head>

<div class="container">
    <div class="row mb-5">
        <div class="col-lg-8">
            <h3 class="list-heading"><span> Warta </span> Jemaat </h3>
        </div>
        <div class="col-lg-4">
            <div class="input-group">

                <form action="/warta/search" method="GET">
                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search"
                        aria-label="Search">
                </form>

            </div>
        </div>
    </div>
    <div class="search-label mb-3">
        @if(empty($key))
        @else
        {{$key}}
        @endif
    </div>
    <ul class="list-group">

        @foreach($warta as $item)

        <div class="card list-item">
            <div class="card-body">
                <p>
                    <a href="warta/view/{{$item->id}}" class="list-title">
                        <h3><b>{{$item->title}}</b></h3>
                    </a>
                </p>
                <p>
                    Diupload pada: {{$item->date}}
                </p>
            </div>
        </div>
        @endforeach
    </ul>
    {{$warta->links()}}
</div>
@endsection