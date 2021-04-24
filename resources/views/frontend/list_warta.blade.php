@extends('layouts/frontend_master')
@section('title', 'Warta Jemaat')
@section('content')

<div class="container">
    <h4>Warta Jemaat</h4>
    <ul class="list-group mt-3">

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