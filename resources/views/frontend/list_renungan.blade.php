@extends('layouts/frontend_master')
@section('title', 'Bacaan Renungan')
@section('content')

<div class="container">
    <h4>Bacaan Renungan</h4>
    <ul class="list-group mt-3">
        @foreach($renungan as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-6">

                    <a href="renungan/view/{{$item->id}}">
                        <b>{{$item->title}}</b></a>
                </div>
                <div class="col-lg-6 text-right">
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