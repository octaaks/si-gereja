@extends('layouts/frontend_master')
@section('title', 'Warta Jemaat')
@section('content')

<h3>Warta Jemaat</h3>
<ul class="list-group mt-3">
    @foreach($warta as $item)
    <li class="list-group-item">
        <p>
            <a href="warta/view/{{$item->id}}">
                {{$item->title}}</a>
        </p>
    </li>
    @endforeach
</ul>
{{$warta->links()}}

@endsection