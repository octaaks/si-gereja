@extends('layouts/frontend_master')
@section('title', 'Bacaan Renungan')
@section('content')

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3 class="list-heading"><span> Bacaan </span> Renungan </h3>
        </div>
        <div class="col-sm-4">
            <div class="input-group">

                <form action="/renungan/search" method="GET">
                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search"
                        aria-label="Search">
                </form>

            </div>
        </div>
    </div>
    <ul class="list-group mt-5">
        @foreach($renungan as $item)
        <div class="card list-item">
            <div class="card-body">

                <table id="example1" class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            <td rowspan="3" style="width:25%">
                                <div class="thumbnail-renungan">
                                    <img src="img/bg.jpg">
                                </div>
                            </td>
                            <td>
                                <a href="/renungan/view/{{$item->id}}" class="list-title">
                                    <h3><b>{{$item->title}}</b></h3>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>{{$item->verse}}</td>
                        </tr>
                        <tr>
                            <td>{{$item->verse}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </ul>
    {{$renungan->links()}}

</div>
@endsection