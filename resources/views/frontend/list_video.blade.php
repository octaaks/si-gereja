@extends('layouts/frontend_master')
@section('title', 'Liturgi Ibadah')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Video Gallery</title>
    <!-- <link rel="stylesheet" href="css-video/font.css">
    <link rel="stylesheet" href="css-video/font-awesome.min.css"> -->
    <link rel="stylesheet" href="css-video/style.css">
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
</head>

<div class="container">
    <h3>Video Ibadah</h3>
    <div class="container mt-3">
        <div class="mt-2">
            <div class="youtube_video video-holder" id="video_holder">
                <iframe width="100%" height="100%" id="video_id" src="" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>

        <div class="gallery d-flex align-content-sm-center flex-wrap mt-3">
            @foreach($video as $item)
            <a class="item mt-2" href="#video_holder">
                <img src="https://img.youtube.com/vi/{{$item->url}}/mqdefault.jpg" data-id="{{$item->url}}?rel=0">
                <div class="youtube_icon">
                    <img src="image/youtube.svg">
                </div>
                <div class="video-title">
                    {{$item->title}}
                </div>
                <div class="video-date">
                    {{$item->created_at->diffForHumans()}}
                </div>
            </a>
            @endforeach
        </div>
    </div>

</div>

<script>
$(document).ready(function() {
    $("#video_holder").hide();

    $(".item").click(function() {
        let youtube_id = $(this).children("img").attr("data-id");
        $(this).children(".youtube_icon")
            .addClass("active").parent()
            .siblings()
            .children(".youtube_icon")
            .removeClass("active")

        let newUrl = `https://www.youtube.com/embed/${youtube_id}`;
        $("#video_id").attr("src", newUrl);
        $("#video_holder").show();
    })
})
</script>
@endsection