@extends('layouts/frontend_master')
@section('title', 'Liturgi Ibadah')
@section('content')

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>

<div class="container">

    <div class="row mb-5">
        <div class="col-lg-8">
            <h3 class="list-heading"><span> Liturgi </span> Ibadah </h3>
        </div>
        <div class="col-lg-4">
            <div class="input-group">
                <form action="/liturgi/search" method="GET">
                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search"
                        aria-label="Search">
                </form>
            </div>
        </div>
    </div>

    <!-- <ul class="list-group mt-5"> -->

    <div class="search-label mb-3">
        @if(empty($key))
        @else
        {{$key}}
        @endif
    </div>
    @foreach($liturgi as $item)
    <div class="card list-item">
        <div class="card-body">
            <p>
                <a href="liturgi/view/{{$item->id}}" class="list-title">
                    <h3><b>{{$item->title}}</b></h3>
                </a>
            </p>
            <p>
                Diupload pada: {{$item->date}}
            </p>
        </div>
    </div>
    @endforeach

    <!-- </ul> -->
    <div class="text-left mt-3">
        <div class="page-label mb-2">Jumlah Data : {{ $liturgi->total() }} </div><br />
        <div class="text-left">
            {{$liturgi->links()}}
        </div>
    </div>
</div>

@endsection