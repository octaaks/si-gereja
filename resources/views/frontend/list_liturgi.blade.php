@extends('layouts/frontend_master')
@section('title', 'Liturgi Ibadah')
@section('content')

<div class="container">
    <h4>Liturgi Ibadah</h4>
    <ul class="list-group mt-3">
        @foreach($liturgi as $item)
        <li class="list-group-item">
            <p>
                <a href="liturgi/view/{{$item->id}}">
                    {{$item->title}}</a>
            </p>
        </li>
        @endforeach
    </ul>
    {{$liturgi->links()}}

</div>
@endsection