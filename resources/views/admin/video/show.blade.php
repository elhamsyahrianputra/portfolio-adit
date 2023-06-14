@extends('layouts.admin')

@section('style')
<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,900,900i" rel="stylesheet">

<style>
    ul, li, ul li { margin:0; padding: 0; text-indent: 0; list-style: none; }
    .video-player { height: 400px; }
    .video-title { font-family: Poppins,sans-serif; color: #292929; font-size: 19px; font-weight: 500; margin: 0 0 13px; }
    .video-text { margin: 25px 0 30px 0; padding: 0; font-size: 15px; color: #999999; line-height: 28px; }
    .author { display: inline-block; color: #898989; font-size: 12px; margin: 0 8px; }
    .author span { display: inline-block; color: #A2A2A2; margin: 0 0 0 5px; }
    .date { display: inline-block; color: #898989; font-size: 12px; margin: 0 8px; }
    .date span { display: inline-block; color: #A2A2A2; margin: 0 0 0 5px; }
</style>
@endsection

@section('content')
<!-- ======= Blog Single ======= -->
<div class="card" style="font-family: Poppins,sans-serif">
    <div class="card-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="my-5">
                        <div class="position-relative z-3 mb-2">
                            <a href="/admin/videos" class="btn btn-sm btn-success"><i class="bi bi-arrow-left"></i> Back</a>
                            <a href="/admin/videos/{{ $video->id }}/edit" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                        </div>
                        <div class="row justify-content-center">
                            <video class="video-player" autoplay controls>
                                <source src="{{ asset('storage/'.$video->video_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div style="padding: 30px 0px">
                            <div>
                                <h4 class="video-title">{{ $video->title }}</h4>
                            </div>
                            <div class="">
                                <ul class="">
                                    <li class="author">By:<span>{{ $video->author }}</span></li>
                                    <li class="date">Date:<span>{{ $video->created_at }}</span></li>
                                </ul>
                            </div>
                            <p class="video-text">{{ $video->text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection