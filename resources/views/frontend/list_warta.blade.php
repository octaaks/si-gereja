@extends('layouts/frontend_master')
@section('title', 'Warta Jemaat')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h4>Warta Jemaat</h4>
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
    <ul class="list-group mt-5">

        @foreach($warta as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-6">

                    <a href="warta/view/{{$item->id}}">
                        <b>{{$item->title}}</b></a>
                </div>
                <div class="col-lg-6 text-right date-text">
                    Diupload pada: {{$item->date}}
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    {{$warta->links()}}
</div>
@endsection