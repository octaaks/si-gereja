@extends('layouts/frontend_master')
@section('title', 'Liturgi Ibadah')
@section('content')

<h3>Liturgi Ibadah</h3>
<ul class="list-group mt-3">
    @foreach($liturgi as $item)
    <li class="list-group-item">
        <p>
            <a href="liturgi/view/{{$item->id}}">
                {{$item->title}}</a>
        </p>
        tgl
    </li>
    @endforeach
</ul>
{{$liturgi->links()}}

@endsection