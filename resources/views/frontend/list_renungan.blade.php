@extends('layouts/frontend_master')
@section('title', 'Bacaan Renungan')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h4>Bacaan Renungan</h4>
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
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6">

                    <a href="/renungan/view/{{$item->id}}">
                        <b>{{$item->title}}</b></a>
                </div>
                <div class="col-sm-6 text-right">
                    {{$item->verse}}
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-6">
                    {{$item->date}}
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    {{$renungan->links()}}

</div>
@endsection