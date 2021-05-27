@extends('layouts/frontend_master')
@section('title', 'Bacaan Renungan')
@section('content')

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>

<div class="container">
    <div class="row mb-5">
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
    <div class="search-label mb-3">
        @if(empty($key))
        @else
        {{$key}}
        @endif
    </div>
    <ul class="list-group">
        @foreach($renungan as $item)
        <div class="card list-item">
            <div class="card-body">

                <table id="example1" class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            @if(empty($item->image_url))

                            @else
                            <td rowspan="2" style="width:20%">
                                <div class="thumbnail-renungan">
                                    <img src="/{{$item->image_url}}">
                                </div>
                            </td>
                            @endif
                            <td>
                                <a href="/renungan/view/{{$item->id}}" class="list-title">
                                    <h3><b>{{$item->title}}</b></h3>
                                </a>
                                <p class="list-title"><a href="/renungan/" class="list-title mr-2">Renungan</a>/
                                    {{$item->date}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><b>{{$item->verse}}</b> -
                                    {{ \Illuminate\Support\Str::limit($item->content, 50, $end='...') }}
                                    <a href="/renungan/view/{{$item->id}}">
                                        Selengkapnya >>
                                    </a>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </ul>
    <div class="text-left mt-3">
        <div class="page-label mb-2">Jumlah Data : {{ $renungan->total() }} </div><br />
        <div class="text-left">
            {{$renungan->links()}}
        </div>
    </div>

</div>
@endsection