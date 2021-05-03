@extends('layouts/frontend_master')
@section('title', 'Liturgi Ibadah')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-8">
            <h4>Liturgi Ibadah</h4>
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
    <ul class="list-group mt-5">

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