@extends('layouts/frontend_master')
@section('title', 'Liturgi Ibadah')
@section('content')

<h3>Liturgi Ibadah</h3>
    @foreach($video as $item)
    
    <iframe width="320" height="180" src="https://www.youtube.com/embed/{{$item->url}}" title="{{$item->title}}"
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>

    <!-- <li class="list-group-item">
        <p>
            <a href="liturgi/view/{{$item->id}}">
                {{$item->title}}</a>
        </p>
        tgl
    </li> -->

    @endforeach
{{$video->links()}}

@endsection