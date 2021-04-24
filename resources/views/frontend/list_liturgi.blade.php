@extends('layouts/frontend_master')
@section('title', 'Liturgi Ibadah')
@section('content')

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